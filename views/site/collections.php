<?php
    use yii\helpers\Html;
    $this->title = 'Сборники';
    $this->params['breadcrumbs'][] = $this->title;
    $collections = [
        [
            'id' => 22,
            'image' => 'https://viifm.art/data/image/353425643654364456___.jpg',
            'tags' => ['#newage', '#trip', '#ambient'],
            'name' => 'The Moonlight Forest Trail',
            'url' => ''
        ],
        [
            'id' => 1,
            'image' => 'https://avatars.mds.yandex.net/get-altay/11381866/2a0000018c2a762164466dcd133cf65ac0a4/XXXL',
            'tags' => ['#newage', '#celtic', '#instrumental', '#ethnic', '#spacesynth', '#world', '#voices', '#vocal'],
            'name' => 'The Moonlight Forest Trail',
            'url' => ''
        ],
        [
            'id' => 2,
            'image' => '/data/image/aEZUvHU2-OA.jpg',
            'tags' => ['#enigmanic', '#newage', '#goosebumps'],
            'name' => 'Voice From The Past',
            'url' => 'https://t.me/viifm_lux/464'
        ],
        [
            'id' => 3,
            'image' => 'https://avatars.mds.yandex.net/get-altay/11368589/2a0000018c10a4222f92dced5c636c3d6de8/XXXL',
            'tags' => [],
            'name' => 'Straight To The Heart',
            'url' => ''
        ],
        [
            'id' => 4,
            'image' => '/data/image/46457567567.jpg',
            'tags' => ['#newage', '#ethnic', '#ambient', '#fly', '#freedom'],
            'name' => 'Harmony',
            'url' => 'https://t.me/viifm_lux/438'
        ],

        [
            'id' => 5,
            'image' => 'https://avatars.mds.yandex.net/get-altay/9837233/2a0000018a84c56c7f64ee0604490b772254/XXXL',
            'tags' => [],
            'name' => '',
            'url' => ''
        ],
        [
            'id' => 6,
            'image' => 'https://avatars.mds.yandex.net/get-altay/9770129/2a0000018b13d186697b8e4814e6d5ef7d15/XXXL',
            'tags' => [],
            'name' => 'Freshness Street',
            'url' => ''
        ],
        [
            'id' => 7,
            'image' => 'https://avatars.mds.yandex.net/get-altay/10147638/2a0000018bb5c80a5e61252ab13cd093e361/XXXL',
            'tags' => [],
            'name' => 'All Saints` Day',
            'url' => ''
        ],
        [
            'id' => 8,
            'image' => 'https://avatars.mds.yandex.net/get-altay/9284964/2a0000018ab9a28929bfd7f4117522c2eb65/XXXL',
            'tags' => [],
            'name' => 'A Passionate Night',
            'url' => ''
        ],
        [
            'id' => 9,
            'image' => 'https://avatars.mds.yandex.net/get-altay/9728306/2a0000018a84c820ddcdde03dbc6050241cf/XXXL',
            'tags' => [],
            'name' => 'Bright Light',
            'url' => ''
        ],
        [
            'id' => 10,
            'image' => 'https://avatars.mds.yandex.net/get-altay/1077949/2a0000018bb5d4237e276e769bd72933308a/XXXL',
            'tags' => [],
            'name' => 'Cry From The Heart',
            'url' => ''
        ],
        [
            'id' => 11,
            'image' => 'https://avatars.mds.yandex.net/get-altay/10156117/2a0000018ad8ce5687a402a0bd82a15fc06b/XXXL',
            'tags' => [],
            'name' => 'Complete Immersion',
            'url' => ''
        ],
        [
            'id' => 12,
            'image' => 'https://avatars.mds.yandex.net/get-altay/9770129/2a0000018b5779659acca467278169689aae/XXXL',
            'tags' => [],
            'name' => 'Second Wind',
            'url' => ''
        ],
        [
            'id' => 13,
            'image' => 'https://avatars.mds.yandex.net/get-altay/10705374/2a0000018a84c5a83954d68f8e7b20991f07/XXXL',
            'tags' => [],
            'name' => 'Fresh Breeze',
            'url' => ''
        ],
        [
            'id' => 14,
            'image' => 'https://avatars.mds.yandex.net/get-altay/10829645/2a0000018a84c5d8e09df8b99d9c251583f9/XXXL',
            'tags' => [],
            'name' => 'Love Me In French',
            'url' => ''
        ],
        [
            'id' => 15,
            'image' => 'https://avatars.mds.yandex.net/get-altay/11048854/2a0000018a84c61ed56b5c983548ecc82489/XXXL',
            'tags' => [],
            'name' => 'Ethnic Music',
            'url' => ''
        ],
        [
            'id' => 16,
            'image' => 'https://avatars.mds.yandex.net/get-altay/9720991/2a0000018a84c7d8e3158858d34d0d3f38cc/XXXL',
            'tags' => [],
            'name' => '',
            'url' => ''
        ],
        [
            'id' => 17,
            'image' => 'https://avatars.mds.yandex.net/get-altay/9709783/2a0000018a84c7fddb3d7dfe3f87067f121a/XXXL',
            'tags' => [],
            'name' => '',
            'url' => ''
        ],
        [
            'id' => 18,
            'image' => 'https://cdn4.cdn-telegram.org/file/R-VOEFgClyNl_KSXSQkIUKZlawmwrb6EULpk10LvWRev9f5h62XHyv908hkPttDOrCWZ1GD00oHszpq4EvedELSXSA7gRcJi_ln4aEY2UcoBcPEoJ9Yy1N7BrYLWZT0dJ2R3zthvt9CXjNrQfolQ6bNxCwCBFKvyUXbxBKA66oa9bP4ChSYPDCWY81pq8MfEoW4SB7f_ViNpak6dQtjpiv4dGzMTL_51c6SDxIfh6YurbyPXA_Uy2tiWCxvy0SfxzHRJXOr_5Mi4RKxIWceuWeqGbvgvDSZASGsxtv7eeFRKHgaT77QvtxitcPcYOVXdS23y5Nhl4_vF8Hv-C8Ptzw.jpg',
            'tags' => ['#newage', '#music', '#immersion', '#love'],
            'name' => 'Full Immersion',
            'url' => 'https://t.me/viifm_lux/62'
        ],
        [
            'id' => 19,
            'image' => 'https://cdn4.cdn-telegram.org/file/gFfTKvDuR1csvVkX62rMg39mqPw9q8BWIRXoCksWJEpGo4windho3ZlV-4KMMplMFcFmKQSAqJT1WRJC7lrYmIQbamSSbqWrbHnIEZDYigPngnYRJ1rEjr9mwL2s1WhVq4db9SKltyX2eHfQ3hlbguVWSKg7W5NVLOZXsNDxdok_jg8vxXRUqCphK2O34StDz1gf34a8C850AzLyUl2jSJFr_Ba878Q3jEAV2JFwnQkDcCYcxnUi27QQlIsg5s-Joh3ifuxH93HjOAI0kHFVNuA8MXyJmamNrSibRloGQiuke0pfIG_hWUz_vgW3pnEPesOK12M-vcnm6ZauP5CHtw.jpg',
            'tags' => ['#newage', '#music', '#pleasure'],
            'name' => 'Make Your Choice',
            'url' => 'https://t.me/viifm_lux/80'
        ],
        [
            'id' => 20,
            'image' => 'https://cdn4.cdn-telegram.org/file/BkFceNRYAq7LTKvW8wP_IOSLGxCPWPyUNUh54eWnOCDCILEvwG5v0JEMivltKYTjFiOLmrk-BdxzRQuT6xhtTGITuGXRxEk1DKjqSfvw-rmLwSwBjodj_HRdrRT_jtaDoQZt_OPMYckYp2iAKEDTFLt_W4aYGHi8RxXrFpkowCGyMIxCdJrNIMLZ8Phhr-_jGWf9LXp6AYmlcVUfGVkVXP6d8COcJ__zIfWszuVNJgQbtIhfqFw3SxSXtaH_Qe1Mga59byq4fjCL73BFrVfGjYGIUnD_mRm_fbEMVWrCT8caXoDPVQc6OxFfZCv25iqDi2-sK_FpB5luEuHdOjU53g.jpg',
            'tags' => ['#newage', '#music', '#passion', '#love'],
            'name' => 'Ghostly Shadows',
            'url' => 'https://t.me/viifm_lux/94'
        ],
        [
            'id' => 21,
            'image' => 'https://cdn4.cdn-telegram.org/file/m6aWPMw3k3Et_Xl79en_nIvEa36fmSjPLN8593pWyTt5QShrKo0b5UfWOB2Zp-lwoOBagc-kRcnXWoAIufZ_qy47snrb0asEtyKMWmAYbBGKNjipO9gJRy5rBob5Wup4K25AK1gJOV3lclRaT3UKGXJ6DvBo1noPSOT_a9hCw-y9NcrzT3f27_qSvWH2kJTSAmoPN4XycVanpJQk9GSeLkhXXDpBWCSFtJS_eEhG9Om9A8bZbpRtU2j2ObqYuxXJQUbmcv1Cq9f8WqsvbxooZ4HinHscjLyIdxfCuJvS6DBu5Dy7kpB5T8rkQLnh4kY1yaSIRWF-0EmbzZ8n37I2EA.jpg',
            'tags' => ['#newage', '#relax', '#ambient', '#fly', '#dreams', '#love'],
            'name' => 'Road To Sunset',
            'url' => 'https://t.me/viifm_lux/110'
        ]
    ];
?>
<div class="row">
    <div class="col-md-8 offset-md-2 my-3">
        <?=Html::tag('h2', $this->title, ['class' => 'display-5 text-center mb-5']);?>
    </div>
</div>
<div class="row g-3 mb-5 pb-5">
    <?php foreach($collections as $item) { ?>
    <div class="col-12 col-md-4">
        <?=Html::img($item['image'], ['class' => 'w-100 rounded', 'loading'=> "lazy", 'alt' => $item['name']]);?>     
    </div>
    <?php } ?>
</div>