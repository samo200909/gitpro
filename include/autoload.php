<?php defined('ACCES') or die('Access error');

@session_start();
//error_reporting(0);

//Base url
function url(){
    return sprintf(
        "%s://%s/",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME']
    );
}
define( 'SITE', url() );

//Load all functions
$FunctionPaths = ['include/functions/'];
foreach ( $FunctionPaths as $path ){
    foreach ( glob( ROOT . "$path/*.php" ) as $filename ){
        include_once $filename;
    }
}

//Load all class
spl_autoload_register(function($ClassName){
	
	 $ClassPaths = ['include/classes/','app/model/','app/controller/'];
	 
	 foreach ( $ClassPaths as $path ){
		$Class = ROOT .$path. $ClassName . '.php';
		if ( is_file($Class) ){
			include_once $Class;
			continue;
		}
	 }
	
}, true);

Rout::add("", "Page::home");
Rout::add("login", "Page::login");
Rout::add("register", "Page::register");
Rout::add("news", "Page::news");
Rout::add("news/add", "Page::addNews");
Rout::add("news/([0-9]++)", "Page::news");
Rout::add("news/([0-9]++)/edit", "Page::editNews");
Rout::add("news/([0-9]++)/delete", "Page::deleteNews");
Rout::add("logout", "Page::logout");

Rout::run(function (){
    render("error");
    exit;
});
