<!--
  Práctica 2 - Fichero 'modificarseccion.php'
  Realizado por: Arturo Alonso Carbonero
  Grupo: 3ºA - A1
-->

<?php
  require_once('Seccion.class.inc');

  $nombreSeccion=$_POST['nom1'];
  $nuevoNombre=$_POST['nom2'];

  $nombres=array($nombreSeccion, $nuevoNombre);
  $Seccion=new Seccion($nombres);
  $Seccion->modificarSeccion($nombres[0], $nombres[1]);

  header("Location: administracion.php");
  exit;
?>
