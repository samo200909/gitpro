<?php defined('ACCES') or die('Access error'); ?>
<div class="col-12 col-md-9 container">
    <div class="jumbotron">
        <h1>Новости</h1>
        <?php if(Session::exists()): ?>
        <a class="btn btn-primary float-right" href="<?=SITE?>news/add" role="button">Добавить</a>
        <?php endif; ?>
    </div>

    <div class="row">

        <?php foreach($allNews as $item): ?>
        <div class="col-2 "></div>
        <div class="col-8 " style="margin-top: 20px">
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
            <div class="col-2 "></div>
        <?php endforeach; ?>

    </div>
</div>

<hr class="featurette-divider">