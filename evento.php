<?php

require_once './presentacion/PEvento.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Evento = new PEvento();
 
    switch ($_POST["accion"]) {
        case "registrarEvento":
           
            // Lógica para el formulario de registro
          $nombre = $_POST["nombre"];
            $fecha = $_POST["fecha"];
            $ubicacion = $_POST["ubicacion"];
            $descripcion = $_POST["descripcion"];
            $estado = "Disponible";

            $Evento->guardar([
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'fecha' => $fecha,
                'estado' => $estado,
                'ubicacion' => $ubicacion
            ]); 
    
            exit; // Importante: detener la ejecución del script después de la redirección
            break;
        case "editarEvento":
            // Lógica para el formulario de registro

            $id_evento = $_POST["id_evento"];
            $nombre = $_POST["nombre"];
            $fecha = $_POST["fecha"];
            $ubicacion = $_POST["ubicacion"];
            $descripcion = $_POST["descripcion"];
            $estado = "Disponible";

            $Evento->editar([
                'id_evento' => $id_evento,
                'nombre' => $nombre,
                'fecha' => $fecha,
                'ubicacion' => $ubicacion,
                'estado' => $estado,
                'descripcion' => $descripcion
            ]);
            // Redirigir al usuario después de procesar el formulario
            exit; // Importante: detener la ejecución del script después de la redirección
            break;
        case "cerrarEvento":
            // Lógica para el formulario de cierre de evento
            $id_evento = $_POST["id_evento"];
            $Evento->cerrar($id_evento);
            exit; // Importante: detener la ejecución del script después de la redirección
            break;

        case "eliminarEvento":
            // Lógica para el formulario de cierre de evento
            $id_evento = $_POST["id_evento"];
            $Evento->eliminar($id_evento);
            exit; // Importante: detener la ejecución del script después de la redirección
            break;
        default:
            // Acción por defecto si no coincide ninguna de las anteriores
            break;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $presentacion = new PEvento();
    $presentacion->verPagina();
}
