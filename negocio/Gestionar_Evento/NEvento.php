<?php


require_once '../dato/DEvento.php';
require_once '../negocio/Gestionar_Evento/IEvento.php';

class NEvento implements IEvento{


    protected DEvento $Devento;

    public function __construct() {

        $this->Devento = new DEvento();
    }

    public function obtenerEventoDisponible(){
        return $this->Devento->obtenerEventoDisponible();
    }

    public function cerrar($id_evento){
        return $this->Devento->cerrar($id_evento);
    }
    public function obtenerUltimoEvento(){
        return $this->Devento->ObtenerUltimoEvento();
    }

    public function registrar($nombre, $fecha, $ubicacion, $estado, $descripcion){
        $registrar = $this->Devento->registrar($nombre, $fecha, $ubicacion, $estado, $descripcion);
        return $registrar;
    }

    public function editar($id_evento, $nombre, $fecha, $ubicacion, $estado, $descripcion){
        return $this->Devento->editar($id_evento, $nombre, $fecha, $ubicacion, $estado, $descripcion);
    }

    public function listar(){
        return $this->Devento->listar();
    }

    public function eliminar($id_evento) {
        return $this->Devento->eliminar($id_evento);
    }

    public function get_Costo(){
         return 1000;
    }

    public function get_DescripcionEvento() {
        $costo = $this->get_Costo(); // Llamada a la función get_Costo()
        return "SALON DE EVENTO BASICO:"."<br>"."Costo: " . $costo."<br>"; // Ajuste para el salto de línea
    }
    

}
?>
