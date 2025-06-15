<?php

require_once '../negocio/Gestionar_Evento/EventoDecorator.php';


 class Textiles extends EventoDecorator{

    
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
        $costo= $this->get_Costo();
        $descripcionExtra =  "<br>"."Mantelería:". "<br>"." Añade elegancia a cenas formales y bodas."."<br>"."Costo Total  :  ".$costo."<br>"; 
        return $descripcionOriginal . $descripcionExtra;
    }

    
    public function get_Costo()
    {
        $costoinicial = $this->evento->get_Costo();
        $CostoExtra = $this->getCostoTextiles() + $costoinicial;
        return $CostoExtra;
    }
     // costo de entretenimiento
     public static function getCostoTextiles(){
        return 3500;
    }

 }

?>