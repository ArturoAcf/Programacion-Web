<!--
  Práctica 2 - Fichero 'procesar_login.php'
  Realizado por: Arturo Alonso Carbonero
  DNI: 75936665-A
  Grupo: 3ºA - A1
-->

<?php
  session_start();

  require_once("Usuario.class.inc");

  $validado=Usuario::validarLogin($_POST['usr'], $_POST['psw']);

  if($validado){
    $_SESSION['Usuario']=$_POST['usr'];
    header("Location: index.php");
    exit;
  }else{
    header("Location: index.php");
    exit;
  }
?>
