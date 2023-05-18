<?php

class Connection
{
    protected PDO $conn;
    protected function connect()
    //Para comprobar que la que hemos enlazado bien la base de datos lo que hacemos es quitar la clase y dejar solo el codigo de enlace a la base de datos
    {   //json_decode se encarga de leer lo que hay en un archivo json en este caso en concreto está leyedo parametros para configurar la base de datos
        $config = json_decode(file_get_contents(__DIR__ . "/../../config/dba.json"), true);
        try {
            $this->conn = new PDO(
                "mysql:host=" . $config["host"] . ";dbname=" . $config["dbname"] . ";port=" . $config["port"],
                $config["user"],
                $config["password"]
            );
            //echo "La conexión se ha establecido correctamente";
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
