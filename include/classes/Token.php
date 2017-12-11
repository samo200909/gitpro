<?php defined('ACCES') or die('Access error');

class Token {
    public static function generate() {
        return Session::put("tok", md5(uniqid()));
    }

    public static function check($token) {
        $tokenName = "tok";

        if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }

        return false;
    }
}