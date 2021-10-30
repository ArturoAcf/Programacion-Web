<!--
  Práctica 2 - Fichero 'procesar_altaitem.php'
  Realizado por: Arturo Alonso Carbonero
  DNI: 75936665-A
  Grupo: 3ºA - A1
-->

<?php
  session_start();
  require_once('Item.class.inc');

  $itemx=$_POST['itemx'];
  $nombreItem=$_POST['Nombre'];
  $Tipo=$_POST['Tipo'];
  $Tamanio=$_POST['Tam'];
  $Precio=$_POST['Precio'];
  $Fabricante=$_POST['Fabricante'];
  $Seccion=$_POST['Seccion'];
  $descripcion=$_POST['desc'];

  $datos=array($nombreItem, $Tipo, $Tamanio, $Precio, $Fabricante, $descripcion, $Seccion);
  $Item=new Item($datos);
  $Item->modificarItem($itemx, $datos);

  header("Location: modificaritem.php");
  exit;
?>
