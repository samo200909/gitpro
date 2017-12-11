<?php defined('ACCES') or die('Access error'); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="<?=SITE?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=SITE?>public/css/app.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">

    <div class="container cont">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?=SITE?>">Тест сайт</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?=SITE?>news">Новости</a>
                </li>

            </ul>
           <form class="form-inline mt-2 mt-md-0">
               <ul class="navbar-nav mr-auto">
                   <?php if(Session::exists()){ ?>
                   <li class="nav-item">
                       <a class="nav-link" href="<?=SITE?>"><?=Users::getUser("email")?></a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="<?=SITE?>logout">Выход</a>
                   </li>
                   <?php }else{ ?>
                   <li class="nav-item">
                       <a class="nav-link" href="<?=SITE?>login">Вход</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="<?=SITE?>register">Регистрация</a>
                   </li>
                   <?php } ?>
               </ul>
            </form>
        </div>

    </div>

</nav>