<?php

require_once '../negocio/Gestionar_Evento/EventoDecorator.php';


 class Tecnologia  extends EventoDecorator{

    
    public function __construct(IEvento $evento) {

        parent::__construct($evento);

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
    

    public function get_DescripcionEvento() {
        $descripcionOriginal = $this->evento->get_DescripcionEvento();
        $costo=$this->get_Costo();
        $descripcionExtra =  "<br>"."Pantallas y proyectores:". "<br>"."Esenciales para presentaciones en conferencias y seminarios."."<br>"."Costo Total:  ".$costo."<br>"; // Descripción adicional que queremos añadir
        return $descripcionOriginal . $descripcionExtra;
    }

    public function get_Costo()
    {
        $costoinicial = $this->evento->get_Costo();
        $CostoExtra = $this->getCostoTecnologia() + $costoinicial;
        return $CostoExtra;
    }

     // costo de entretenimiento
     public static function getCostoTecnologia(){
        return 2500;
    }


 }



?>