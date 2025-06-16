<?php


// Requerimos los archivos necesarios
require_once '../negocio/Gestionar_Evento/IEvento.php';
require_once '../negocio/Gestionar_Evento/NEvento.php';
require_once '../negocio/Gestionar_Evento/decoradores/Decoracion_Tematica.php';
require_once '../negocio/Gestionar_Evento/decoradores/Tecnologia.php';
require_once '../negocio/Gestionar_Evento/decoradores/Textiles.php';

class PEvento
{
    private NEvento $evento;
    private Decoracion_Tematica $decoracion;
    private Tecnologia $tecnologia;
    private Textiles $textiles;


    public function __construct()
    {
        $this->evento = new NEvento();
        $this->decoracion = new Decoracion_Tematica(new NEvento);
        $this->tecnologia = new Tecnologia(new NEvento);
        $this->textiles = new Textiles(new NEvento);
        
    }

    public function verPagina()
    {
        $conexiones = $_SESSION['mysql'] || $_SESSION['psql'] ?? null;
        $PobtenerEvento = $this->evento->obtenerEventoDisponible();
        $PlistarEventos = $this->evento->listar();
        $costoDecoracion = $this->decoracion->getCostoDecoracion();
        $costoTecnologia = $this->tecnologia->getCostoTecnologia();
        $costoTextiles = $this->textiles->getCostoTextiles();

        require './presentacion/evento.html';
    }

    public function guardar(array $request)
    {
        // var_dump("REQUEST REG",$request);
        // Validar los datos recibidos del formulario
        $nombre = $request['nombre'];
        $fecha = $request['fecha'];
        $ubicacion = $request['ubicacion'];
        $estado = "Disponible"; // Puedes definir el estado por defecto aquí
        //  $descripcion = $request['descripcion'];
        // Crear un evento básico
        $evento = new NEvento();


        // Decorar el evento con las opciones seleccionadas
        if (!empty($request['descripcion'])) {
            foreach ($request['descripcion'] as $opcion) {
                switch ($opcion) {
                    case 'Decoracion':
                        $evento = new Decoracion_Tematica($evento);
                        break;
                    case 'Tecnologia':
                        $evento = new Tecnologia($evento);
                        break;
                    case 'Textiles':
                        $evento = new Textiles($evento);
                        break;
                        // Agregar más casos según sea necesario para otras opciones
                }
            }
        }
        $descripcion = $evento->get_DescripcionEvento();
        // var_dump("REQUEST evento",$descripcion);
        $this->evento->registrar($nombre, $fecha, $ubicacion, $estado, $descripcion);

        header("Location:  /arquitectura/evento.php");
    }

    public function editar(array $request)
    {
        $this->evento->editar(
            $request['id_evento'],
            $request['nombre'],
            $request['fecha'],
            $request['ubicacion'],
            $request['estado'],
            $request['descripcion'],
        );
        header("Location: /arquitectura/evento.php");
    }

    public function cerrar($id)
    {
        $this->evento->cerrar($id);
        header("Location:  /arquitectura/evento.php");
    }

    public function eliminar($id)
    {
        $this->evento->eliminar($id);
        header("Location:  /arquitectura/evento.php");
    }
}
