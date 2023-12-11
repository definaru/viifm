<?php
	use yii\helpers\Html;
	$tags = [
		'#Enigma', '#Era', '#Enya', '#Gregorian', '#Achiella', '#Conjure One',
		'#Delerium', '#Adiemus', '#Amethystium', '#Magna Canta', '#Lesiem',
		'#ATB', '#Schiller', '#TAAW', '#Oliver Shanti', '#Karunesh',
		'#Kitaro', '#Deep Brasil', '#Deep India', '#B-Tribe',
		'#Sacred Spirit', '#GENE', '#Eivissa Immaculada'
	];
?>
<div class="body-content py-5">
    <div class="row align-items-center py-5">
        <div class="col-md-6 text-center position-relative">
            <div class="playlist mb-5 mb-md-0">
                <img src="/data/image/playlists.png" alt="Playlist" class="w-75 position-relative z-2" />
            </div>
        </div>
        <div class="col-md-6 d-grid gap-5">
            <h2 class="display-5 fw-medium m-0 text-center text-md-start">
                Лучшие мелодии и голоса
                <u class="fw-bold display-2 akcent d-block d-md-inline">Со всей планеты!</u>
            </h2>
            <div class="text-center text-md-start">
				<?php foreach($tags as $item) { ?>
					<?=Html::tag('span', $item, ['class' => 'badge text-bg-dark fw-normal']);?>
				<?php } ?>
            </div>
        </div>
    </div>
</div>