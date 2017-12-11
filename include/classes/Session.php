<?php defined('ACCES') or die('Access error');

class Session {

    private static $def_key = "key";

    public static function exists($name = null) {
        $name = ($name===null) ? self::$def_key : $name;
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function put($name, $value) {
        return $_SESSION[$name] = $value;
    }

    public static function get($name = null) {
        $name = ($name===null) ? self::$def_key : $name;
        return $_SESSION[$name];
    }

    public static function delete($name = null) {
        $name = ($name===null) ? self::$def_key : $name;
        if(self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function flash ($name, $string = 'null') {
        if(self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
                return $session;
        } else {
            self::put($name, $string);
        }
    }
}