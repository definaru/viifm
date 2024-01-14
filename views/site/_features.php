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
                Лучшие мелодии и голоса<br />
                <u class="fw-bold display-2 akcent d-block d-md-inline">Со всей планеты!</u>
            </h2>
            <div class="text-center text-md-start">
				<?php foreach($tags as $item) { ?>
					<?=Html::tag('span', $item, ['class' => 'badge text-bg-dark fw-normal']);?>
				<?php } ?>
            </div>

            <div class="d-flex flex-column">
                <div class="d-flex justify-content-center justify-content-md-start">
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/ee.svg" style="width: 28px;border-radius: 3px" alt="Estonia" /> 
                        <span class="d-none d-md-block">Estonia</span> 
                    </span> 
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/sy.svg" style="width: 28px;border-radius: 3px" alt="Syria" /> 
                        <span class="d-none d-md-block">Syria</span>
                    </span>
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/se.svg" style="width: 28px;border-radius: 3px" alt="Sweden" /> 
                        <span class="d-none d-md-block">Sweden</span>
                    </span>
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/es.svg" style="width: 28px;border-radius: 3px" alt="Spain" /> 
                        <span class="d-none d-md-block">Spain</span>
                    </span>
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/ru.svg" style="width: 28px;border-radius: 3px" alt="Russia" /> 
                        <span class="d-none d-md-block">Russia</span>
                    </span>
                </div>

                <div class="d-flex justify-content-center justify-content-md-start mt-2">
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/pl.svg" style="width: 28px;border-radius: 3px" alt="Poland" /> 
                        <span class="d-none d-md-block">Poland</span> 
                    </span>                    
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/ph.svg" style="width: 28px;border-radius: 3px" alt="Philippines" /> 
                        <span class="d-none d-md-block">Philippines</span> 
                    </span>                    
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/lt.svg" style="width: 28px;border-radius: 3px" alt="Lithuania" /> 
                        <span class="d-none d-md-block">Lithuania</span> 
                    </span>
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/kz.svg" style="width: 28px;border-radius: 3px" alt="Kazakhstan" /> 
                        <span class="d-none d-md-block">Kazakhstan</span> 
                    </span>
                </div>

                <div class="d-flex justify-content-center justify-content-md-start mt-2">
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/il.svg" style="width: 28px;border-radius: 3px" alt="Israel" /> 
                        <span class="d-none d-md-block">Israel</span> 
                    </span>
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/in.svg" style="width: 28px;border-radius: 3px" alt="India" /> 
                        <span class="d-none d-md-block">India</span> 
                    </span>                    
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/ir.svg" style="width: 28px;border-radius: 3px" alt="Iran" /> 
                        <span class="d-none d-md-block">Iran</span> 
                    </span>
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/ie.svg" style="width: 28px;border-radius: 3px" alt="Ireland" /> 
                        <span class="d-none d-md-block">Ireland</span> 
                    </span>
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/cn.svg" style="width: 28px;border-radius: 3px" alt="China" /> 
                        <span class="d-none d-md-block">China</span> 
                    </span>
                </div>

                <div class="d-flex justify-content-center justify-content-md-start mt-2">
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/gr.svg" style="width: 28px;border-radius: 3px" alt="Greece" /> 
                        <span class="d-none d-md-block">Greece</span> 
                    </span>
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/de.svg" style="width: 28px;border-radius: 3px" alt="Germany" /> 
                        <span class="d-none d-md-block">Germany</span> 
                    </span>
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/fi.svg" style="width: 28px;border-radius: 3px" alt="Finland" /> 
                        <span class="d-none d-md-block">Finland</span> 
                    </span>
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/fr.svg" style="width: 28px;border-radius: 3px" alt="France" /> 
                        <span class="d-none d-md-block">France</span> 
                    </span>                    
                </div>

                <div class="d-flex justify-content-center justify-content-md-start mt-2">
                    <span class="badge d-flex align-items-center gap-2">
                        <img src="https://flagicons.lipis.dev/flags/4x3/ge.svg" style="width: 28px;border-radius: 3px" alt="Georgia" /> 
                        <span class="d-none d-md-block">Georgia</span> 
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>