<!--
  Práctica 2 - Fichero 'procesarFormulario.php'
  Realizado por: Arturo Alonso Carbonero
  DNI: 75936665-A
  Grupo: 3ºA - A1
-->

<?php
  class Process_form{
   function comprobarExistencia($var){ // Comprobar si existe el campo
      if(isset($var)){
        return true;
      }
    }

    function comprobarContenido($var){ // Comprobar si se ha rellenado
      if(!empty($var)){
        return true;
      }
    }

    function campoCorrecto($var){ // campo correcto
      if(!$this->comprobarExistencia($var) && !$this->comprobarContenido($var)){
        throw new Exception(' El campo no existe o está vacío');
      }
    }
  };
?>
