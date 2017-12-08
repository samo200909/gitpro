<?php
define( 'ACCES', true );
define( 'ROOT', $_SERVER['DOCUMENT_ROOT'] . '/' );

//Load all logic
include "include/autoload.php";


$user = db("SELECT * FROM text ");
print_r($user[0]['id']);	
?>