<?php defined('ACCES') or die('Access error');

class News{

    /**
     * @param int $num
     * @return array|mixed
     */
    public static function limit($num = 6){
        $new = db("SELECT * FROM news ORDER BY id DESC LIMIT {$num}");
        return $new;
    }

    /**
     * @return bool|mixed
     */
    public static function add(){
        if(isset($_POST['name'], $_POST['text']) && Token::check($_POST['token']) && ($name = $_POST['name']) != "" && ($text = $_POST['text']) != "") {
            db("INSERT INTO news SET name=?, text=?", [$name, $text]);
            return DB::ins();
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function edit(){
        if(isset($_POST['name'], $_POST['text'], $_POST['id']) && Token::check($_POST['token']) && ($name = $_POST['name']) != "" && ($text = $_POST['text']) != "") {
            if(is_numeric($id = $_POST['id'])) {
                db("UPDATE news SET name=?, text=? WHERE id=? LIMIT 1", [$name, $text, $id]);
                return true;
            }
        }
        return false;
    }

    /**
     * @param null $id
     * @return bool
     */
    public static function delete($id = null){
        if($id !== null && $id > 0){
            db("DELETE FROM news WHERE id=? LIMIT 1", [$id]);
            return true;
        }
        return false;
    }

    /**
     * @return array|mixed
     */
    public static function getAll(){
        $news = db("SELECT * FROM news ORDER BY id DESC");
        return $news;
    }

    /**
     * @param null $id
     * @return array|mixed
     */
    public static function getOne($id = null){
        $new = db("SELECT * FROM news WHERE id=? LIMIT 1", [$id]);
        if(count($new) > 0){
            $new = $new[0];
            $new["title"] = $new['name'];
        }
        return $new;
    }

}