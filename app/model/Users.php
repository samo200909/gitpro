<?php defined('ACCES') or die('Access error');

class Users
{
    /**
     * @param $param
     * @return mixed
     */
    public static function getUser($param){
        if(Session::exists()){
            $user = db("SELECT email FROM users1 WHERE `key`=? LIMIT 1", [Session::get()]);
            return $user[0][$param];
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
                $user = db("SELECT `key`, pass FROM users1 WHERE `email`=? LIMIT 1", [$_POST['email']]);
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

                $user = db("SELECT id FROM users1 WHERE `email`=? LIMIT 1", [$_POST['email']]);
                if(count($user) > 0){
                    return "user_exist";
                }

                db("INSERT INTO users1 SET email=?, pass=?", [$_POST['email'], crypt($_POST['pass2'])]);
                $ins = crypt(Db::ins());
                db("UPDATE users1 SET `key`='".$ins."' WHERE id = ".Db::ins());
                Session::put('key', $ins);
                location(SITE);
            }else{
                return false;
            }

        }

    }

}