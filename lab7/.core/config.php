<?php

class Config {
    private $host = 'localhost'; // Адрес сервера
    private $db_name = 'electronics'; // Имя базы данных
    private $username = 'root'; // Имя пользователя (по умолчанию 'root' в XAMPP)
    private $password = ''; // Пароль (по умолчанию пусто)
    private $chrs = "utf8mb4";
    private $attr;

    private $opps = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    public $conn = null;
    protected function __construct()
    {
        $this->attr = "mysql:host=$this->host;dbname=$this->db_name;charset=$this->chrs";
        try {
            $this->conn = new PDO($this->attr, $this->username, $this->password, $this->opps);
        }
        catch (PDOException $err){
            throw new PDOException($err->getMessage(), (int)$err->getCode());
        }
    }

    protected function __clone(){
        throw new \BadMethodCallException('Unable to clone database connection');
    }

    public function __wakeup(){
        throw new \BadMethodCallException('Unable to deserialize database connection');
    }

    private static $instance = null;
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public static function getConnection() : \PDO{
        return static::getInstance()->conn;
    }

    public static function prepare($statement) : \PDOStatement{
        return static::getConnection()->prepare($statement);
    }

    public static function lastInsertId() : int{
        return intval(static::getConnection()->lastInsertId());
    }
}

?>