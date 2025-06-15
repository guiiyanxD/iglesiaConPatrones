<?php



require_once '../dato/db/MySQLStrategy.php';
require_once '../dato/db/PostgreSQLStrategy.php';

// Conexion.php
class Conexion {

    private static $instancia;
    private $estrategia;
    

    private function __construct($estrategia) {

        $this->estrategia = $estrategia;

    }

    public static function SetDatabaseStrategy($estrategia = null) {

        if (!isset(self::$instancia)) {

            if ($estrategia === null) {

                $estrategia = new PostgreSQLStrategy(); // Estrategia por defecto

            }

            self::$instancia = new Conexion($estrategia);

        }

        return self::$instancia;
    }

    public function changeEstrategia($estrategia) {
        $this->estrategia = $estrategia;
    }

    public function connect() {

        return $this->estrategia->connect();

    }

    public function consultarBD($sql, $params = []) {

        return $this->estrategia->consultarBD($sql, $params);

    }

    public function close() {

        return $this->estrategia->close();

    }
}
?>
