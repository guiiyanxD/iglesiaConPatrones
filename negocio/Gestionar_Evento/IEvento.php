<?php

require_once '../dato/db/MySQLStrategy.php';

interface IEvento
{
   
    public function registrar($nombre, $fecha, $ubicacion, $estado, $descripcion);

    public function editar($id, $nombre, $fecha, $ubicacion, $estado, $descripcion);

    public function listar();

    public function eliminar($id_evento);

    public function get_Costo();

    public function get_DescripcionEvento();
}

?>