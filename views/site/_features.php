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
<div class="atropos best body-content py-5">
    <div class="atropos-scale row align-items-center py-5">
        <div class="atropos-rotate col-md-6 text-center position-relative">
            <div class="playlist mb-5 mb-md-0 px-3 d-block d-md-none">
                <img src="/data/image/playlists.png" alt="Playlist" class="w-75 position-relative z-2" />
            </div>
            <div class="atropos-inner d-none d-md-block">
                <div class="playlist mb-5 mb-md-0" style="height: 452px">
                    <img 
                        src="/data/image/2.jpg" 
                        alt="Playlist" 
                        class="position-absolute" 
                        style="aspect-ratio: 1 / 1;width: 37%;z-index: 20;bottom: 0;left: 92px"
                        data-atropos-offset="-10"
                    />
                    <img 
                        src="/data/image/3.jpg" 
                        alt="Playlist" 
                        class="position-absolute" 
                        style="aspect-ratio: 1 / 1;width: 37%;z-index: 15;bottom: 79px;left: 250px"
                        data-atropos-offset="12"
                    />
                    <img 
                        src="/data/image/1.jpg" 
                        alt="Playlist" 
                        class="position-absolute" 
                        style="aspect-ratio: 1 / 1;width: 37%;z-index: 10;bottom: 159px;left: 158px"
                        data-atropos-offset="-13"
                    >
                    <img 
                        src="/data/image/4.jpg" 
                        alt="Playlist" 
                        class="position-absolute" 
                        style="aspect-ratio: 1 / 1;width: 37%;z-index: 5;bottom: 221px;left: 322px"
                        data-atropos-offset="34"
                    />
                </div>                
            </div>

        </div>
        <div class="col-md-6 d-grid gap-5">
            <h3 class="display-6 fw-medium m-0 text-center text-md-start">
                <?=Yii::t(
                    'vii', 'Best Melody', 
                    [
                        'planet' => '<br />'.Html::tag(
                            'u', 
                            Yii::t('vii', 'planet'), 
                            ['class' => 'fw-bold display-2 akcent d-block d-md-inline']
                        )
                    ]
                );?>
            </h3>
            <div class="text-center text-md-start">
				<?php foreach($tags as $item) { ?>
					<?=Html::tag('span', $item, ['class' => 'badge text-bg-dark fw-normal']);?>
				<?php } ?>
            </div>
            <?=$this->render('_flags');?>
        </div>
    </div>
</div>