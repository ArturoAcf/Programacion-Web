<!--
  Práctica 2 - Fichero 'procesar_altaitem.php'
  Realizado por: Arturo Alonso Carbonero
  Grupo: 3ºA - A1
-->

<?php
  require_once('Item.class.inc');

  $nombreItem=$_POST['Nombre'];
  $Tipo=$_POST['Tipo'];
  $Tamanio=$_POST['Tam'];
  $Precio=$_POST['Precio'];
  $Fabricante=$_POST['Fabricante'];
  $Seccion=$_POST['Seccion'];
  $descripcion=$_POST['desc'];

  $datos=array($nombreItem, $Tipo, $Tamanio, $Precio, $Fabricante, $descripcion, $Seccion);
  $Item=new Item($datos);
  $Item->insertarItem($datos);

  header("Location: administracion.php");
  exit;
?>
