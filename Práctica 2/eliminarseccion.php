<!--
  Práctica 2 - Fichero 'eliminarseccion.php'
  Realizado por: Arturo Alonso Carbonero
  DNI: 75936665-A
  Grupo: 3ºA - A1
-->

<?php
  require_once('Seccion.class.inc');

  $nombreSeccion=$_POST['sec'];
  $datos=array($nombreSeccion);
  $datos[1]=$nombreSeccion;
  $seccion=new Seccion($datos);
  $seccion->eliminarSeccion($nombreSeccion);

  header("Location: administracion.php");
  exit;
?>
