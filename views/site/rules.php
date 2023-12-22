<?php
    use yii\helpers\Html;
    $this->title = 'Правила канала';
    $this->params['breadcrumbs'][] = $this->title;
    
    $url = 'https://viifm.art';
    $description = 'Перечень правил, которые рекомендуется соблюдать на нашем канале.';
    $intellektualnaa = 'https://www.eesti.ee/ru/predprinimatel/intellektualnaa-sobstvennost/zasita-intellektualnoj-sobstvennosti#лицензии-и-тарифы-для-публичного-показа-защищенных-авторским-правом-музыкальных-произведений';
    $author_rules = 'https://www.consultant.ru/document/cons_doc_LAW_10699/b683408102681707f2702cff05f0a3025daab7ab/';
    $koap = 'https://www.consultant.ru/document/cons_doc_LAW_34661/d40cbd099d17057d9697b15ee8368e49953416ae/';

    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'правила, канал, music, vii, enigma, achiella']);
    $this->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
    
    $this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
    $this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
    $this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
    //$this->registerMetaTag(['property' => 'og:image', 'content' => $url.'/data/image/4418680adaabd3b1f5.jpg']);
    $this->registerMetaTag(['property' => 'og:description', 'content' => $description]);    
?>
<div class="row">
    <div class="col-md-8 offset-md-2 my-5 pb-5">
        <?=Html::tag('h2', $this->title, ['class' => 'display-5 text-center mb-5']);?>
        <ol class="d-grid gap-5">
            <li>
                В нашем чате вообще не принято использовать матерные слова <i class="text-body-tertiary">(ненормативную лексику)</i>, 
                не приемлемо по многим причинам 
                <i class="text-body-tertiary">(могут быть несовершеннолетние дети, в чате есть девушки, и в целом приличная и образованная аудитория)</i>
            </li>
            <li>
                Мы вообще и <u>никогда не говорим о</u>: политике, религии, короновирусе, войне 
                <i class="text-body-tertiary">(вне зависимости от того где это происходит)</i> <br />
                <strong>Причин много:</strong> мы не занимаемся подобными вопросами,
                есть тематические каналы где это можно решить или обсудить, если вас не устраивает это правило, 
                пожалуйста отпишитесь, или есть риск что <code>Vii</code> может вас отправить в бан <i class="text-body-tertiary">(оттуда мы уже не возвращаем)</i>.
            </li>
            <li>
                Реклама чего либо на канале без ведома администрации <b><u>запрещена</u></b>! Вы рискуете попаст в бан, и получить жалобу от пользователей в Telegram. Все вопросы по рекламе согласовывайте с 
                <a href="https://t.me/ray_turchin" target="_blank" class="nav-link d-inline"><u>Раймондом</u></a>
            </li>
            <li>
                Музыка на нашем канале защищена <a href="<?=$author_rules;?>" target="_blank" rel="noopener noreferrer" class="nav-link d-inline"><u>авторскими и смежными правами</u></a>, 
                нарушение этих правил карается законом <b>УК РФ Статья 146</b> <i class="text-body-tertiary">(В России)</i>, и 
                <a href="http://armatv.ee/zakon-ob-avtorskom-prave" target="_blank" rel="noopener noreferrer" class="nav-link d-inline"><u>Статья 33</u></a>, 
                <a href="<?=$intellektualnaa;?>" target="_blank" rel="noopener noreferrer" class="nav-link d-inline"><u>ЗЭР «Об авторском праве»</u></a> 
                <i class="text-body-tertiary">(В Эстонии)</i>. Контент на нашем канале опубликован исключительно в ознакомительных целях 
                <i class="text-body-tertiary">(копирование, сдача в прокат, продажа - разрешена только с письменного разрешения правообладателяи автора данного\данных произведений [мелодий, песен])</i>
            </li>
            <li>
                По-скольку контент на нашем канале согласно <code>п.4</code> не предназначен для продажи, мы оставляем за собой
                право публиковать музыку не в совсем в высоком качестве, можем накладывать на запись посторонние звуки и сообщения, 
                обрезать аудио дорожку в начале, конце или в середине. Жалобы по данному вопросу не обсуждаются и не подлежат обжалованию.
            </li>
            <li>
                Категорически запрешено оскорблять, унижать, дискиминировать участников нашего канала. 
                Это карается <a href="<?=$koap;?>" target="_blank" rel="noopener noreferrer" class="nav-link d-inline"><u>КоАП РФ Статья 5.61</u></a> 
                <i class="text-body-tertiary">(жалоба может быть направлена на вас лично со стороны пострадавших)</i>, со стороны канала будет стоять задача минимизировать конфликт 
                и отправить в бан всех нарушителей правила. Мы не занимаемся передачей персональных данных в прокуратуру, но это могут сделать наши 
                подписчики. Будьте вежливы и уважительно относитесь друг к другу.
            </li>
            <li>
                Запрещено использование любых данных <i class="text-body-tertiary">(картинки, названия, ссылки, описания)</i> вне канала, 
                с целью клонирования и фишинга, и прочих мошеннических действий. По факту нарушения данного правила будут предусмотренны меры, 
                согласно законодательству Эстонии и РФ.
            </li>
        </ol>
    </div>
</div>