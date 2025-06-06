<?php
    use yii\bootstrap5\Html;
    use frontend\components\icons\Icons;

    $this->title = 'Contacts';
    //$this->params['breadcrumbs'][] = ['label' => 'Подкатегория', 'url' => '/category'];
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = $this->title;

    $contacts = [
        [
            'name' => 'Раймонд Турчин',
            'position' => 'Основатель канала',
            'avatar' => '/admin/dist/img/users/snapedit_1706737250764.png',
            'about' => 'Творческий человек. Создаёт контент для телеграм канала Vii FM, разрабатывает обложки.',
            'location' => 'Планета Земля, Эстония',
            'phone' => '+7 999 849 2927',
            'chat' => 'https://t.me/it_solution666',
            'account' => 'it_solution666'
        ],
        [
            'name' => 'Таяна Фибоначи',
            'position' => 'Администратор канала',
            'avatar' => '/admin/dist/img/users/photo_2024-08-03_23-19-48.jpg',
            'about' => 'Замечательный человек',
            'location' => 'Россия, Тюмень',
            'phone' => '+7 963 060 4000',
            'chat' => 'https://t.me/Tayana5vsu',
            'account' => 'Tayana5vsu'
        ],
        [
            'name' => 'Кристина Житнёва',
            'position' => 'Маркетолог',
            'avatar' => '/admin/dist/img/users/photo_2023-03-06_23-10-08.jpg',
            'about' => 'Специалист по продвижению в Телеграм. Нужно больше клиентов? Пишите!',
            'location' => 'Россия, Челябинск',
            'phone' => '+7 951 783 2283',
            'chat' => 'https://t.me/kristina_zhitneva',
            'account' => 'kristina_zhitneva'
        ],
        [
            'name' => 'Кристина Девятко',
            'position' => 'Модератор чата',
            'avatar' => '/admin/dist/img/users/photo_2024-06-13_00-24-39.jpg',
            'about' => 'Замечательный человек',
            'location' => 'Казахстан, Алматы',
            'phone' => '+7 747 146 99 57',
            'chat' => 'https://t.me/devytko12061997',
            'account' => 'devytko12061997'
        ],
        [
            'name' => 'Kathryn Brook',
            'position' => 'Консультант',
            'avatar' => '/admin/dist/img/users/photo_2024-02-13_00-22-30.jpg',
            'about' => 'Во вопросам размещения рекламы на Vii FM',
            'location' => 'Китай, Сингапур',
            'phone' => '+7 927 301 0653',
            'chat' => 'https://t.me/jupejinc2007',
            'account' => 'jupejinc2007'
        ],
        [
            'name' => 'Vii',
            'position' => 'Бот',
            'avatar' => '/admin/dist/img/users/photo_2024-12-10_22-35-50.jpg',
            'about' => 'Принимаю ваши музыкальные заявки, ищу музыку по описанию, общаюсь и отвечаю на вопросы. 🥰',
            'location' => 'Интернет, Telegram',
            'phone' => 'x-xxx',
            'chat' => 'https://t.me/viifm_bot',
            'account' => 'viifm_bot'
        ],
    ];
?>
<div class="row">
    <?php foreach($contacts as $item) { ?>
    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
        <div class="card d-flex flex-fill">
            <?=Html::tag('div', $item['position'], ['class' => 'card-header text-muted border-bottom-0']);?>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <?=Html::tag('h2', $item['name'], ['class' => 'lead font-weight-bold'])?>
                        <p class="text-muted text-sm text-truncate"><b>About:</b> <?=$item['about'];?></p>
                        <ul class="ml-0 mb-0 pl-0 text-muted" style="list-style-type:none">
                            <li class="small">
                                <?=Icons::Location(18, 'text-dark');?> <?=$item['location']?>
                            </li>
                            <li class="small mt-2">
                                <?=Icons::Phone(18, 'text-dark');?> <?=$item['phone']?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <img 
                            src="<?=$item['avatar']?>" 
                            alt="<?=$item['name']?>" 
                            class="img-circle img-fluid" 
                        />
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <a href="<?=$item['chat']?>" target="_blank" class="btn btn-sm bg-teal">
                        <?=Icons::Chats(17);?>
                    </a>
                    <a href="/panel/profile/<?=$item['account']?>" class="btn btn-sm bg-purple">
                        <?=Icons::Person(18);?> View Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>