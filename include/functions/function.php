<?php defined('ACCES') or die('Access error');

//Db quick connect
function db($query, $par = []){
	return DB::con()->query($query, $par);
}

//render view
function render($tpl_name, $data = []){
    $file = ROOT."app/view/{$tpl_name}.php";
    if(file_exists($file) && is_file($file)){
        extract($data);
        include ROOT."app/view/static/header.php";
        include $file;
        include ROOT."app/view/static/footer.php";
    }
}

//form isset
function is_form($param){
    if(isset($param)){
        return $param;
    }
}

//header location
function location($path){
    @header("Location: ".$path);
    exit;
}

//Log
function getLog(){
    echo "<pre>";
        print_r(DB::log());
    echo "</pre>";
}

//register_shutdown_function('getLog');