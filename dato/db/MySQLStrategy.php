<?php


require_once '../dato/db/IDatabaseStrategy.php';

class MySQLStrategy implements IDatabaseStrategy
{
    private $connection;

    public function __construct()
    {
        $this->connection = null;
    }

    public function connect()
    {
        $dsn = "mysql:host=localhost;dbname=proyectoiglesiadb;charset=utf8mb4";
        try {
            $this->connection = new \PDO($dsn, 'root', '');
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $_SESSION['mysql'] = "Conectado a MYSQL"; // Store connection in session
            return $this->connection;
        } catch (\PDOException $e) {
            throw new \PDOException("Connection failed: " . $e->getMessage());
        }
    }

    public function consultarBD($sql, $params = [])
    {
        if (!$this->connection) {
            $this->connect();
        }

        if ($this->connection) {
            $statement = $this->connection->prepare($sql);

            try {
                if (empty($params)) {
                    $statement->execute();
                } else {
                    $statement->execute($params);
                }
                return $statement;
            } catch (\PDOException $e) {
                throw new \PDOException("Query execution failed: " . $e->getMessage());
            }
        } else {
            throw new \Exception("No se pudo establecer conexión con MySQL.");
        }
    }

    public function close()
    {
        if ($this->connection != null) {
            $this->connection = null;
        }
        return true;
    }
}
?>


