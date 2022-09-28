<?php
    class ConnectDb {
    private static $instance;
    private $conn;

    private $host = '10.97.13.160';
    private $user = 'root';
    private $pass = 'Vnpt@123';
    private $name = 'servicequantrac';

    private function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};
        dbname={$this->name}", $this->user,$this->pass,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public static function getInstance()
    {
        self::$instance = new self();
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    private function __clone() {}
    public function __wakeup() {}
    }
?>