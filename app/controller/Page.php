<?php defined('ACCES') or die('Access error');

class Page
{

    public static function home()
    {
        render("home", ['title' => 'home', 'allNews' => News::limit()]);
    }

    public static function login()
    {
        $login = Users::login();
        if(!Session::exists()) {
            render("login",['title'=>'login','login'=>$login]);
        }else{
           location(SITE);
        }
    }

    public static function register()
    {
        $reg = Users::register();
        if(!Session::exists()) {
            render("register", ['title' => 'Регистрация','reg' => $reg]);
        }else{
            location(SITE);
        }
    }

    /**
     * @param null $id
     * @return bool
     */
    public static function news($id = null)
    {
        if($id === null){
            render("news/list",['title' => 'Новости', 'allNews' => News::getAll()]);
        }else{
            $n = News::getOne($id);
            if(isset($n['id'])){
                render("news/item", $n);
            }else{
                return false;
            }
        }

    }

    /**
     * @param null $id
     * @return bool
     */
    public static function editNews($id = null)
    {
        if(!Session::exists()){
           return false;
        }
        $_POST['id'] = $id;
        if(News::edit() === true){
            location(SITE.'news');
        }

        $n = News::getOne($id);
        if(isset($n['id'])){
            render("news/edit", $n);
        }else{
            return false;
        }
    }

    public static function addNews()
    {
        if(!Session::exists()){
            return false;
        }
        $n = News::add();
        if($n !== false){
            location(SITE."news");
        }
        render("news/edit", ["title" => "Добавить новость", "name" => "", "text" => ""]);

    }

    /**
     * @param null $id
     * @return bool
     */
    public static function deleteNews($id = null)
    {
        if(!Session::exists()){
            return false;
        }

        $n = News::delete($id);
        if($n){
            location(SITE.'news');
        }else{
            return false;
        }
    }

    public static function logout()
    {
        Session::delete();
        location(SITE);
    }

}