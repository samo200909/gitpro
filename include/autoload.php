<?php defined('ACCES') or die('Access error');

@session_start();
error_reporting(0);

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


$FunctionPaths = ['include/functions/'];
foreach ( $FunctionPaths as $path ){
	foreach ( glob( ROOT . "$path/*.php" ) as $filename ){
		include_once $filename;
	}
}