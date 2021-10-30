<!--
  Práctica 2 - Fichero 'procesar_modificarperfil.php'
  Realizado por: Arturo Alonso Carbonero
  DNI: 75936665-A
  Grupo: 3ºA - A1
-->

<?php
  session_start();
  require_once("Usuario.class.inc");

  $validado=Usuario::validarLogin($_SESSION['Usuario'], $_POST['psw']);

  $nombreUsuario=$_POST['usr'];
  $userAnterior=$_SESSION['Usuario'];
  $_SESSION['Usuario']=$_POST['usr'];

  $nombre=$_POST['Nombre'];
  $apellidoPrimero=$_POST['surname1'];
  $apellidoSegundo=$_POST['surname2'];
  $fechaNacimiento=$_POST['date'];
  $nacionalidad=$_POST['nac'];
  $fromacion=$_POST['forma'];
  $areaConocimiento=$_POST['adc'];
  $pass=$_POST['psw'];
  $genero=$_POST['gen'];
  $correo=$_POST['correo'];

  $datos=array($nombre, $apellidoPrimero, $apellidoSegundo,
               $fechaNacimiento, $nacionalidad, $fromacion,
               $areaConocimiento, $pass, $genero, $nombreUsuario, $correo);
  $user=new Usuario($datos);
  $user->modificarUsuario($userAnterior, $datos);

  header("Location: index.php");
  exit;
?>
