<!--
  Práctica 2 - Fichero 'Usuario.class.inc'
  Realizado por: Arturo Alonso Carbonero
  DNI: 75936665-A
  Grupo: 3ºA - A1
-->

<?php

  /* NOTA -> Mirar lo de TABLA_USUARIOS */

  require_once('datosObject.class.inc');
  require_once('procesarFormulario.php');
  require_once('configuracion.inc');

  /*
  * Datos de un usuario de la web
  */
  class Usuario extends DataObject{
    protected $datos=array(
      "Nombre" => "",
      "Apellido1" => "",
      "Apellido2" => "",
      "date" => null,
      "nac" => "",
      "for" => "",
      "adc" => "",
      "psw" => "",
      "gen" => "",
      "Usuario" => "",
      "Correo" => ""
    );

    /*
    * Función para obtener los usuarios de la web
    */
    public static function obtenerUsuarios($usuarios){
      $consulta="SELECT * FROM Usuarios";
      $conexion=parent::conectar();
      $resultados=$conexion->query($consulta);

      foreach($resultados as $fila){
        echo "Nombre: ".$fila["Nombre"]." "." Apellido1: ".$fila["Apellido1"]." Apellido2: ".$fila["Apellido2"]."</br>";
      }

      parent::desconectar($conexion);
    }

    /*
    * Función para obtener una fila de la tabla 'Usuarios'
    */
    public function getUsuario($nickname){
      $conexion=parent::conectar();
      $sql="SELECT * FROM Usuarios WHERE Usuario='$nickname'";

      try{
        $st=$conexion->prepare($sql);
        $st->bindValue(":Usuario", $nickname);
        $st->execute();
        $fila=$st->fetch();
        parent::desconectar($conexion);

        if($fila){
          return new Usuario($fila);
        }
      }catch(PDOException $e) {
        parent::desconectar($conexion);
        die("Error de consulta: ".$e->getMessage());
      }
    }

    /*
    * Función para insertar un usuario en la tabla 'Usuarios'
    */
    public static function insertarUsuario($datosU){
      $campo=new Process_form();
      $nom=$datosU;
      $conexion=parent::conectar();

      try{
        foreach($nom as $valor){
          $campo->campoCorrecto($valor);
        }
      }catch(Exception $e){
        echo "</br> Error, ".$e->getMessage()."</br>";
      }

      $consultaSQL="INSERT INTO Usuarios VALUES ('$datosU[0]', '$datosU[1]', '$datosU[2]',
                                                 '$datosU[3]', '$datosU[4]', '$datosU[5]',
                                                 '$datosU[6]', '$datosU[7]', '$datosU[8]',
                                                 '$datosU[9]', '$datosU[10]')";

      try{
        $conexion->query($consultaSQL);
        parent::desconectar($conexion);
      }catch(PDOException $e){
        parent::desconectar($conexion);
        echo "Error de consulta: ".$e->getMessage()."</br>";
      }
    }

    /*
    * Función para modificar el perfil de un usuario de la tabla 'Usuarios'
    */
    public static function modificarUsuario($usuario, $valores){
      $conexion=parent::conectar();
      $campo=new Process_form();
      $user=$usuario;
      $datos=$valores;

      try{
        foreach($datos as $fila){
          $campo->campoCorrecto($fila);
        }
      }catch(Exception $e){
        echo "</br> Error, ".$e->getMessage()."</br>";
      }

      $consultaSQL="UPDATE Usuarios SET Nombre='$datos[0]', Apellido1='$datos[1]', Apellido2='$datos[2]', Fecha='$datos[3]', Nacionalidad='$datos[4]',
                                Formacion='$datos[5]', areaConocimiento='$datos[6]', Contrasenia='$datos[7]', Genero='$datos[8]',
                                Usuario='$datos[9]', Correo='$datos[10]' WHERE Usuario='$user'";

      try{
        $conexion->query($consultaSQL);
        parent::desconectar($conexion);
      }catch(PDOException $e){
        parent::desconectar($conexion);
        echo "Error de consulta: ".$e->getMessage()."</br>";
      }
    }

    /*
    * Función para eliminar un usuario de la tabla 'Usuarios'
    */
    public static function eliminarUsuario($Usuario){
      $campo=new Process_form();
      $nombreUsr=$Usuario;
      $conexion=parent::conectar();

      try{
        $campo->campoCorrecto($nombreUsr);
      }catch(Exception $e){
        echo "</br> Error, ".$e->getMessage()."</br>";
      }

      $consultaSQL="DELETE FROM Usuarios WHERE Usuario='$nombreUsr'";
      parent::desconectar($conexion);

      try{
        $conexion->query($consultaSQL);
      }catch(PDOException $e){
        parent::desconectar($conexion);
        echo "Error de consulta: ".$e->getMessage()."</br>";
      }
    }

    /*
    * Función para comprobar el inicio de sesión de un usuario
    */
    public static function validarLogin($usuario, $psw) {
      $conexion=parent::conectar();
      $sql="SELECT * FROM Usuarios WHERE Usuario='$usuario' AND Contrasenia='$psw'";

      try{
        $sentencia=$conexion->prepare($sql);

        $sentencia->bindValue(":usuario", $usuario, PDO::PARAM_STR);
        $sentencia->bindValue(":psw", hash('sha512', $psw), PDO::PARAM_STR);
        $sentencia->execute();

        $filas=$sentencia->rowCount();

        if($filas==1){ // Solo un usuario
          parent::desconectar($conexion);
          return true;
        }else{
          parent::desconectar($conexion);
          return false;
        }
      }catch(PDOException $e){
        parent::desconectar($conexion);
        die("Petición fallida: ".$e->getMessage());
      }
    }
  };
?>
