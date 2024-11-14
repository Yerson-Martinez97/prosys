<?php
class Connection
{
    private $connection;
    public function __construct()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";" . DB_CHARSET;   // Data Source Name
        try {
            $this->connection = new PDO($dsn, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la Conexión" . $e->getMessage();
        }
    }
    public function getConnection()
    {
        return $this->connection;
    }
}
