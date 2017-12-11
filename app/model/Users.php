<?php defined('ACCES') or die('Access error');

class Users
{
    protected static $table = "users";
    /**
     * @param $param
     * @return mixed
     */
    public static function getUser($param){
        if(Session::exists()){
            if(Session::exists("email")){
                return Session::get("email");
            }else {
                $user = db("SELECT email FROM ".self::$table." WHERE `key`=? LIMIT 1", [Session::get()]);
                Session::put("email", $user[0][$param]);
                return $user[0][$param];
            }
        }
    }
    
    public function logout() {
        Session::delete();
        location(SITE);
    }

    /**
     * @return bool
     */
    public static function login(){

        if(isset($_POST['login']) && Token::check($_POST['token'])){

            if($_POST['email'] != "" && $_POST['password'] != ""){
                $user = db("SELECT `key`, pass FROM ".self::$table." WHERE `email`=? LIMIT 1", [$_POST['email']]);
                if (crypt($_POST['password'], $user[0]["pass"]) === $user[0]["pass"]) {
                    Session::put('key', $user[0]["key"]);
                    location(SITE);
                }else{
                    return false;
                }

            }else{
                return false;
            }
        }

    }

    /**
     * @return bool|string
     */
    public static function register(){

        if(isset($_POST['reg']) && !Session::exists() && Token::check($_POST['token'])){

            if(isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['pass1']) && $_POST['pass1'] != "" && $_POST['pass2'] == $_POST['pass1']){

                $user = db("SELECT id FROM ".self::$table." WHERE `email`=? LIMIT 1", [$_POST['email']]);
                if(count($user) > 0){
                    return "user_exist";
                }

                db("INSERT INTO ".self::$table." SET email=?, pass=?", [$_POST['email'], crypt($_POST['pass2'])]);
                $ins = crypt(Db::ins());
                db("UPDATE ".self::$table." SET `key`='".$ins."' WHERE id = ".Db::ins());
                Session::put('key', $ins);
                location(SITE);
            }else{
                return false;
            }

        }

    }

}