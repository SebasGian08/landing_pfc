<?php 
require_once __DIR__ . '/controlador/Controlador.php';

$controlador = new Controlador();
$tipoVista = $_GET['vista'] ?? 'default'; // Valor por defecto si no se especifica
$controlador->manejarSolicitud($tipoVista);
?>
