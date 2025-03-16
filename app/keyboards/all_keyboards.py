from config import *
from aiogram.types import (InlineKeyboardMarkup, InlineKeyboardButton)


async def confirm_rules_keyboard(user_id):
    text_url = 'Правила Vii-чата'
    text_checked = '✅ Я принимаю правила'
    callback = f"confirm_rules_{user_id}"
    confirm_button = InlineKeyboardMarkup(inline_keyboard=[
        [InlineKeyboardButton(text=text_url, url=rules_url)],
        [InlineKeyboardButton(text=text_checked, callback_data=callback)]])
    
    return confirm_button