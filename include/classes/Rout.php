<?php defined('ACCES') or die('Access error');

class Rout
{
    protected static $allRouts = [];
    protected static $url = "/";

    /**
     * @param string $rout
     * @param $function
     */
    public static function add($rout, $function)
    {
        self::$allRouts[] = [
            'rout' => self::$url.$rout,
            'function' => $function,
        ];
    }

    public static function setUrl($url)
    {
        self::$url = $url;
    }

    public static function getUri($autoRedirect = false)
    {
        $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if((strlen($uri) > 1) && ($uri[strlen($uri) - 1] == "/")){
            $uri = substr($uri, 0, strlen($uri) - 1);
            if($autoRedirect === true){
                @header("Location: {$uri}", TRUE, 301);
                die();
            }
        }
        return $uri;
    }

    public static function run($function)
    {
        $uri = self::getUri(true);
        foreach (self::$allRouts as $rout){
             $r = $rout['rout'];
            if(count(explode("/", $r)) === count(explode("/", $uri))){
                $arg = [];
                if (preg_match_all("^$r$^u", $uri, $matches)) {
                    foreach ($matches as $k => $item) {
                        if($k > 0){
                           $arg[] = $item[0];
                        }
                    }
                }

                if($r === $uri || count($arg) > 0){
                    if(call_user_func_array($rout['function'], $arg) !== false){
                        return true;
                    }
                }

            }

        }
        call_user_func($function);
        return false;
    }
}