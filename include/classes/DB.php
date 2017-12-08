<?php

defined('ACCES') or die('Access error');

class DB
{
    protected $pdo;
    protected static $lastInsertId;
    protected static $instance;
    protected static $log = [];

    /**
     * db constructor.
     */
    protected function __construct()
    {

        $db = [
            'engine'   => 'mysql',
            'host'     => 'localhost',
            'user'     => 'root',
            'pass'     => '',
            'database' => 'test',
            'charset'  => 'utf8',
            'options'  => [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ],
        ];

        $this->pdo = new PDO( "$db[engine]:host=$db[host];dbname=$db[database];charset=$db[charset]", $db['user'], $db['pass'], $db['options']);
    }

    /**
     * @return db
     */
    public static function con()
    {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return array|mixed
     */
    public function query($sql, $params = [])
    {
        $db = $this->pdo->prepare($sql);
        $bool = $db->execute($params);

        $this->setLog($sql, $params);

        $this->setInsertId($this->pdo->lastInsertId());
        if($bool !== false){
            $data = ($db->rowCount() > 0) ? $db->fetchAll() : [];
        }else{
            $data = [];
        }
        return $data;
    }

    /**
     * @param string $sql
     * @param array $data
     */
    private function setLog($sql, $data)
    {
        $query = str_replace('?', '%s', $sql);
        self::$log[] = call_user_func('vsprintf', $query, $data);
    }

    /**
     * @return array
     */
    public static function log()
    {
        return self::$log;
    }

    /**
     * @param bool|int $id
     */
    private static function setInsertId($id = false){
        if($id !== false && $id > 0){
            self::$lastInsertId = $id;
        }else{
            self::$lastInsertId = false;
        }
    }

    /**
     * @return mixed
     */
    public static function ins()
    {
        return self::$lastInsertId;
    }

}