<!--
  Práctica 2 - Fichero 'procesar_altausuario.php'
  Realizado por: Arturo Alonso Carbonero
  DNI: 75936665-A
  Grupo: 3ºA - A1
-->

<?php
  require_once('Usuario.class.inc');

  $nombreUsuario=$_POST['usr'];
  $nombre=$_POST['Nombre'];
  $apellidoPrimero=$_POST['surname1'];
  $apellidoSegundo=$_POST['surname2'];
  $fechaNacimiento=$_POST['date'];
  $nacionalidad=$_POST['nac'];
  $fromacion=$_POST['for'];
  $areaConocimiento=$_POST['adc'];
  $pass=$_POST['psw'];
  $genero=$_POST['gen'];
  $correo=$_POST['correo'];

  $datos=array($nombre, $apellidoPrimero, $apellidoSegundo,
               $fechaNacimiento, $nacionalidad, $fromacion,
               $areaConocimiento, $pass, $genero, $nombreUsuario, $correo);
  $user=new Usuario($datos);
  $user->insertarUsuario($datos);

  header("Location: index.php");
  exit;
?>
