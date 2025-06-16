
<?php

require_once '../dato/db/IDatabaseStrategy.php';

class PostgreSQLStrategy implements IDatabaseStrategy
{
    private $connection;
    private $statement;

    private const HOST = "127.0.0.1";
    private const PORT = "5432"; 
    private const DATABASE = "proyectoiglesiadb";
    private const USER = "postgres";
    private const PASS = "12345678";

    public function __construct()
    {
        $this->connection = null;
    }

    public function connect()
    {
        $dsn = "pgsql:host=" . self::HOST . ";port=" . self::PORT . ";dbname=" . self::DATABASE;
        try {
            $this->connection = new \PDO($dsn, self::USER, self::PASS);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $_SESSION['psql'] = "Conectado a PSQL"; // Store connection in session
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
                $_SESSION['statement'] = $statement; // Guardar la última consulta en la sesión
                return $statement;
            } catch (\PDOException $e) {
                throw new \PDOException("Query execution failed: " . $e->getMessage());
            }
        } else {
            // Manejar el caso cuando no hay conexión establecida
            throw new \Exception("No se pudo establecer conexión con PostgreSQL.");
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
