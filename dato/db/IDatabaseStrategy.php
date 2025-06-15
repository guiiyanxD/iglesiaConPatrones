<?php

//require_once './db/MySQLStrategy.php';

interface IDatabaseStrategy
{
    public function connect();
    public function consultarBD($sql, $params = []);
    public function close();
}

?>
