<?php
    use frontend\components\widget\Links;

    $this->title = 'Полезные ссылки';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = $this->title;
?>
<div class="row">
    <?=Links::Widget();?>
</div>

<?php /*
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const links = document.querySelectorAll('.copy-link');
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const url = link.href;
                const tempInput = document.createElement('input');
                tempInput.value = url;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                toastr.success(
                    'Ссылка скопирована в буфер обмена!', '', 
                    {
                        positionClass: 'toast-bottom-right',
                        timeOut: 5000
                    }
                );
            });
        });
    });
</script>
*/ ?>
