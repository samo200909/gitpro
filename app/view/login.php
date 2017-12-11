<?php defined('ACCES') or die('Access error'); ?>
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-xs-12">
                <div class="card border-none">
                    <div class="card-block">

                        <p class="mt-4 lead text-center">
                           Вход в аккаунт
                        </p>
                        <div class="mt-4">
                            <form method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" value="<?=is_form($_POST['email'])?>" placeholder="Эл. почта">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password" value="" placeholder="Пароль">
                                </div>

                                <?php if($login===false){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Ошибка!</strong> Не правильно логин или пароль
                                    </div>
                                <? } ?>
                                <input type="hidden" name="token" value="<?=Token::generate()?>">
                                <button type="submit" name="login" class="btn btn-primary float-right">Вход</button>
                            </form>
                            <div class="clearfix"></div>

                        </div>

                        <p class="text-center">
                            Вы еще не зарегистророваны? <a href="<?=SITE?>register">Регистрация</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>