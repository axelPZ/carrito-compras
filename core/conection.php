<?php
abstract class Connection
{
    private $driver = "mysql";
    private $host = "";
    private $dbName = "practica1";
    private $user ="";
    private $pass = "";
    private $charset ="utf8mb4";

    protected function conexion()
    {
        try
        {
            $pdo = new PDO("{$this->driver}: host={$this->host}; dbname={$this->dbName}; charset={$this->charset}",$this->user,$this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $pdo;

        }catch(PDOException $e)
        {
            echo "error de coneccion<br>";
            echo $e->getMessage();
        }
    }
}

?>