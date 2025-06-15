<?php
// Requerimos los archivos necesarios
require_once './negocio/Gestionar_Evento/IEvento.php';
require_once './negocio/Gestionar_Evento/Evento.php';
require_once './negocio/Gestionar_Evento/decoradores/Iluminacion.php';
require_once './negocio/Gestionar_Evento/decoradores/Entretenimiento.php';
require_once './negocio/Gestionar_Evento/decoradores/Escenografia.php';

// Crear un evento básico
$eventoBasico = new Evento();

// Decorar el evento con Entretenimiento
$eventoConEntretenimiento = new Entretenimiento($eventoBasico);

// Decorar el evento con Escenografía
$eventoConEscenografia = new Escenografia($eventoConEntretenimiento);

// Mostrar información del evento con decoradores
echo "<h2>Información del Evento Decorado:</h2>";
echo "<p><strong>Descripción del Evento:</strong><br>" . $eventoConEscenografia->get_DescripcionEvento() . "</p>";
echo "<p><strong>Costo del Evento:</strong> $" . $eventoConEscenografia->get_Costo() . "</p>";
?>
