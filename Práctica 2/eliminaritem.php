<!--
  Práctica 2 - Fichero 'eliminaritem.php'
  Realizado por: Arturo Alonso Carbonero
  Grupo: 3ºA - A1
-->

<?php
  require_once('Item.class.inc');

  $nombreItem=$_POST['Nombre'];
  $datos=array($nombreItem);
  $datos[1]=$nombreItem;
  $Item=new Item($datos);
  $Item->eliminarItem($nombreItem);

  header("Location: administracion.php");
  exit;
?>
