import re
import app.keyboards as kb
import app.database as db
import random

from datetime import datetime
from aiogram import Router, F
from aiogram.types import Message, CallbackQuery, ChatPermissions, ChatJoinRequest
from app.bot_file import bot
from config import *



hour = datetime.now().hour
router = Router()


def currenTime():
    if hour >= 0 and hour < 5: 
        time = "Доброй ночи"
    elif hour >= 10 and hour < 18: 
        time = "Добрый день"
    elif hour >= 18 and hour < 24:
        time = "Добрый вечер"
    else: 
        time = "Доброе утро"
    return time


async def mat_del(message, galoba=False):  # мут за мат
    if galoba:
        user = await db.get_user(message.reply_to_message.from_user.id)
    else:
        user = await db.get_user(message.from_user.id)
    chat = await db.get_chat(message.chat.id)

    warning_count = await db.get_user_chat_association(user_id=user['id'], chat_id=chat['id'])
    warning_count = int(warning_count['mat']) + 1
    await db.add_waring(
            user_id=user['id'], 
            chat_id=chat['id'], 
            waring=warning_count, 
            type='mat'
        )

    mat_topic = await db.get_topic_by_text(text='mat')
    answer_list = [answer['text'] for answer in 
        await db.get_BotAnswer_by_topic_id(topic_id=mat_topic['id'])]
    messtr = random.choice(answer_list).format(user['name'])

    if warning_count >= mut_limit:
        await bot.restrict_chat_member(
                chat_id=message.chat.id, 
                user_id=user['tg_id'],
                permissions=ChatPermissions(can_send_messages=False),
                until_date=datetime.now() + mat_mut
            )
        await db.add_waring(user_id=user['id'], chat_id=chat['id'], waring=0, type='mat')
        await message.reply(text=f"Выговор:\n{user['name']}, бан за мат")
    else:
        await message.reply(text=messtr)
    await message.delete()


async def AnswerToUser(message, is_admin, is_chat):  # ответы на сообщения людей
    user = await db.get_user(message.from_user.id)
    message_text = re.sub(r'[^a-zа-яё0-9\s]', '', message.text.lower())
    topics = await db.get_topics()

    if message_text == 'ви жалоба' and message.reply_to_message:
        await mat_del(message, galoba=True)
    elif topics:
        for topic in topics:  # Если плохо работает, то поставьте hello_list в конец бд
            topic_array = any(word['text'] in message_text for word in await db.get_UserSay_by_topic_id(topic_id=topic['id']))
            if (topic['text'] == 'mat') and (not is_admin) and is_chat and topic_array:
                await mat_del(message)
                break
            elif (topic['text'] != 'mat') and topic_array:
                answer_list = [answer['text'] for answer in await db.get_BotAnswer_by_topic_id(topic_id=topic['id'])]
                await message.reply(
                    text=random.choice(answer_list).format(user['name'])
                )
                break


@router.message(F.text == '/start')
async def send_welcome(message: Message):
    hello = currenTime()
    username = message.from_user.username
    text = "\nМеня зовут Ви.\nЯ могу помочь с поиском музыки, или принять вашу заявку."
    hello_text = "<b>{0}, {1}!</b>{2}".format(hello, username, text)

    await message.reply(hello_text)


@router.message(F.animation | F.sticker)  # Замечания за спам гифками и стикерами
async def flood_handler(message: Message):
    chat_admins = await message.chat.get_administrators()
    admin_ids = [admin.user.id for admin in chat_admins]
    text_from_bot = f"Пользователю @{message.from_user.username}, бан за флуд."

    if (message.chat.type in ["group", "supergroup"]) and (not (message.from_user.id in admin_ids)):
        user = await db.get_user(message.from_user.id)
        chat = await db.get_chat(message.chat.id)
        flood_count = await db.flood_time_mes(user_id=user['id'], chat_id=chat['id'])
        if flood_count >= animation_flood_limit:
            await bot.restrict_chat_member(
                    chat_id=message.chat.id, 
                    user_id=message.from_user.id,
                    permissions=ChatPermissions(can_send_messages=False),
                    until_date=datetime.now() + animation_mut
                )
            await message.answer(text_from_bot)


@router.message(F.text)  # основной хендлер
async def text_handler(message: Message):
    user = await db.get_user(message.from_user.id)
    chat = await db.get_chat(message.chat.id)

    is_chat = message.chat.type in ["group", "supergroup"]
    print(message.chat.type)
    print(is_chat)
    if is_chat:
        chat_admins = await message.chat.get_administrators()
        admin_ids = [admin.user.id for admin in chat_admins]
        is_admin = message.from_user.id in admin_ids
    else:
        is_admin = True

    if is_chat and (not is_admin):
        # Проверка на ссылки
        block_list = ['http://', 'https://', '@', 't.me', 'T.me', 'заработок']
        text_from_bot = f"Выговор\n{user['name']}, бан за рекламу"

        if any(site in message.text.lower() for site in block_list):
            await message.delete()
            warning_count = await db.get_user_chat_association(
                user_id=user['id'], 
                chat_id=chat['id']
            )
            warning_count = int(warning_count['links']) + 1
            await db.add_waring(
                    user_id=user['id'], 
                    chat_id=chat['id'], 
                    waring=warning_count, 
                    type='links'
                )
            if warning_count >= site_limit:
                await bot.restrict_chat_member(
                        chat_id=message.chat.id, 
                        user_id=user['tg_id'],
                        permissions=ChatPermissions(can_send_messages=False),
                        until_date=datetime.now() + site_mut
                    )
                await db.add_waring(
                        user_id=user['id'], 
                        chat_id=chat['id'], 
                        waring=0, 
                        type='links'
                    )
                await message.answer(text=text_from_bot)
            return

    await AnswerToUser(
            message=message, 
            is_admin=is_admin, 
            is_chat=is_chat
        )


@router.message(F.new_chat_members)  # встреча новичков, удаление ботов, открытый чат
async def new_member_handler(message: Message):
    for new_member in message.new_chat_members:
        if new_member.is_bot or str(new_member.id).startswith('-100'):
            await bot.ban_chat_member(message.chat.id, new_member.id)
        else:
            await bot.restrict_chat_member(
                    message.chat.id, 
                    new_member.id,
                    permissions=ChatPermissions(can_send_messages=False)
                )
            
            user = await db.get_user(tg_id=new_member.id)
            hello = currenTime()
            reply_markup_keyboard = await kb.confirm_rules_keyboard(new_member.id)
            message_from_bot = "\nОзнакомьтесь с правилами чата и нажмите кнопку ниже."
            hello_username = "{0}, {1}. {2}".format(hello, user['name'], message_from_bot)

            await message.reply(
                    text=hello_username,
                    reply_markup=reply_markup_keyboard
                )


@router.chat_join_request()  # закрытый чат
async def handle_chat_join_request(request: ChatJoinRequest):
    user = request.from_user
    chat = request.chat
    if user.is_bot or str(user.id).startswith('-100'):
        await bot.decline_chat_join_request(chat_id=chat.id, user_id=user.id)
    else:
        await bot.approve_chat_join_request(chat_id=chat.id, user_id=user.id)
        user = await db.get_user(tg_id=user.id)
        hello = currenTime()
        reply_markup_keyboard = await kb.confirm_rules_keyboard(user['id'])
        message_from_bot = "\nОзнакомьтесь с правилами чата и нажмите кнопку ниже."
        hello_username = "{0}, {1}. {2}".format(hello, user['name'], message_from_bot)

        await request.answer(
                text=hello_username,
                reply_markup=reply_markup_keyboard
            )


@router.callback_query(F.data.startswith("confirm_rules"))  # кнопка прочтения правил
async def rules_agree(callback: CallbackQuery):
    user_id = callback.data.split('_')[2]
    await callback.answer("Добро пожаловать в чат")

    if str(callback.from_user.id) == user_id:
        await bot.restrict_chat_member(
                chat_id=callback.message.chat.id, 
                user_id=callback.from_user.id,
                permissions=ChatPermissions(can_send_messages=True)
            )