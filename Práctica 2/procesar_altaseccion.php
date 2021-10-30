<!--
  Práctica 2 - Fichero 'procesar_altaseccion.php'
  Realizado por: Arturo Alonso Carbonero
  DNI: 75936665-A
  Grupo: 3ºA - A1
-->

<?php
  require_once('Seccion.class.inc');

  $nombreSeccion=$_POST['sec'];

  $datos=array($nombreSeccion);
  $Seccion=new Seccion($datos);
  $Seccion->insertarSeccion($datos);

  header("Location: administracion.php");
  exit;
?>
