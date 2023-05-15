<?php
declare(strict_types=1);

class Connection
{
    public $conn;
    public function connect():void
    {
        $config = json_decode(file_get_contents(__DIR__ . "/../../config/dba.json"), true);
        //var_dump($config);
        try {
            $this->conn = new PDO(
                "mysql:host=" . $config["host"] . ";dbname=" . $config["dbname"] . ";port=" . $config["port"], $config["user"], $config["password"]
            );
        } catch (PDOException $exception) {
            echo "ha fallado la conexión. Error: ". $exception->getMessage();
        }
    }
    public function disconnect()
    {
        $this->conn = null;
    }
    public function __destruct()
    {
        $this->disconnect();
    }
}