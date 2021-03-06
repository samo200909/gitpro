<?php defined('ACCES') or die('Access error'); ?>

<div class="container">

    <div class="row">
        <?php foreach($allNews as $item): ?>
        <div class="col-lg-4">
            <h2><?=mb_substr($item['name'],0,50)?></h2>
            <p><?=mb_substr($item['text'],0,300)?></p>
            <p>
                <a class="btn btn-secondary" href="<?=SITE?>news/<?=$item['id']?>" role="button">Читать »</a>
                <?php if(Session::exists()): ?>
                    <a class="btn btn-success" href="<?=SITE?>news/<?=$item['id']?>/edit" role="button">Редатктировать</a>
                    <a class="btn btn-danger" href="<?=SITE?>news/<?=$item['id']?>/delete" role="button">Удалить</a>
                <?php endif; ?>
            </p>
        </div>
        <?php endforeach; ?>
    </div>

    <hr class="featurette-divider">

</div>
