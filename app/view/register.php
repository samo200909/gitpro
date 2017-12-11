<?php defined('ACCES') or die('Access error'); ?>
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-xs-12">
                <div class="card border-none">
                    <div class="card-block">

                        <p class="mt-4 lead text-center">
                            Регистрация
                        </p>
                        <div class="mt-4">
                            <form method="post">
                                <div class="form-group">
                                    <input type="email" required name="email" class="form-control" id="email" value="<?=is_form($_POST['email'])?>" placeholder="Эл. почта">
                                </div>
                                <div class="form-group">
                                    <input type="password" required name="pass1" class="form-control" id="password" value="" placeholder="Пароль">
                                </div>

                                <div class="form-group">
                                    <input type="password" required name="pass2" class="form-control" id="password" value="" placeholder="Повторите пароль">
                                </div>
                                <?php if($reg===false){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Ошибка!</strong> Заполните правильно поля
                                    </div>
                                <? }elseif($reg==="user_exist"){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Ошибка!</strong> Эл. почта занят
                                    </div>
                                <? } ?>
                                <input type="hidden" name="token" value="<?=Token::generate()?>">
                                <button type="submit" name="reg" class="btn btn-primary float-right">Регистрация</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>