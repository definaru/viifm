<?php
    use yii\helpers\Html;
    //use yii\bootstrap5\Modal;
    /* @var $this yii\web\View */
    /* @var $id string */
?>
<?=Html::tag('div', '', ['id' => 'calendar']);?>

<div id="modal" class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <!-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modalContent" class="modal-body">
      </div>
    </div>
  </div>
</div>