<?php

require_once '../negocio/Gestionar_Evento/IEvento.php';

abstract class EventoDecorator implements IEvento {

    protected IEvento $evento;

    public function __construct(IEvento $evento) {

        $this->evento = $evento;
    }

    public function registrar($nombre, $fecha, $ubicacion, $estado, $descripcion){

        $this->evento->registrar($nombre, $fecha, $ubicacion, $estado, $descripcion);

    }
    public function editar($id, $nombre, $fecha, $ubicacion, $estado, $descripcion){

        $this->evento->editar($id, $nombre, $fecha, $ubicacion, $estado, $descripcion);

    }

    public function listar(){

        return $this->evento->listar();

    }

    public function eliminar($id_evento){

        $this->evento->eliminar($id_evento);

    }
    

    public function get_Costo(){

        return $this->evento->get_Costo();

    }

    public function get_DescripcionEvento(){

        return $this->evento->get_DescripcionEvento();

    }

   

}
?>