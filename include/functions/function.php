<?php

defined('ACCES') or die('Access error');

function db($query, $par = []){
	return DB::con()->query($query, $par);
}
