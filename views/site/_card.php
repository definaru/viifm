<?php
    $star = '
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
    </svg>
    ';
    $starfill = '
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
    </svg>
    ';
?>
<li class="card image-flame my-md-5 my-2">
    <div class="card-body flex-column flex-md-row position-relative z-3 d-flex justify-content-between align-items-center">
        <strong class="d-flex align-items-center gap-2">
            <span class="fs-3"><?=$followers;?></span> подписчиков
            <span 
                data-bs-toggle="tooltip" 
                data-bs-title="Всего мест осталось"
                class="badge rounded-pill text-bg-danger" 
                role="button"
            >
                <?=$places;?>
            </span>
        </strong>
        <div class="d-flex gap-2 gap-md-4 align-items-center flex-column flex-md-row">
            <hr />
            <span class="fs-4"><?=$season === 12 ? '1 год' : $season.' мес.';?></span> 
            <span class="badge text-bg-primary fw-light">premium</span> 
            <div>
                <span class="text-warning">
                    <?php for ($i = 1; $i <= $season; $i++) { ?>
                        <?=$starfill;?>
                    <?php } ?>
                </span>   
                <span class="text-muted">
                    <?php for ($i = 1; $i <= 12-$season; $i++) { ?>
                        <?=$star;?>
                    <?php } ?>                            
                </span>                         
            </div>
        </div>
    </div>
</li>