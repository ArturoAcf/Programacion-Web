<!--
  Práctica 2 - Fichero 'eliminarusuario.php'
  Realizado por: Arturo Alonso Carbonero
  Grupo: 3ºA - A1
-->

<?php
  require_once('Usuario.class.inc');

  $nombreUsr=$_POST['usr'];
  $datos=array($nombreUsr);
  $datos[1]=$nombreUsr;
  $User=new Usuario($datos);
  $User->eliminarUsuario($nombreUsr);

  header("Location: index.php");
  exit;
?>
