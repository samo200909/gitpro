<?php defined('ACCES') or die('Access error'); ?>
<div class="col-12 col-md-9 container">

    <div class="row">
        <form class="col-12" method="post">

            <div class="form-group">
                <label>Имя</label>
                <input type="text" name="name" class="form-control" value="<?=$name?>">

            </div>
            <div class="form-group">
                <label>Текст</label>
                <textarea name="text" rows="10" class="form-control"><?=$text?></textarea>

            </div>
            <input type="hidden" name="token" value="<?=Token::generate()?>">
            <button type="submit" class="btn btn-primary">Сохронить</button>

        </form>

    </div>
</div>

<hr class="featurette-divider">
