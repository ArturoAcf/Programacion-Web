<!--
  Práctica 2 - Fichero 'procesar_logout.php'
  Realizado por: Arturo Alonso Carbonero
  DNI: 75936665-A
  Grupo: 3ºA - A1
-->
<?php
  session_start();

  $_SESSION['Usuario']=null;

  header("Location: index.php");
  exit;
?>
