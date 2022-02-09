<!--
  Práctica 2 - Fichero 'Seccion.class.inc'
  Realizado por: Arturo Alonso Carbonero
  Grupo: 3ºA - A1
-->

<?php
  require_once('datosObject.class.inc');
  require_once('procesarFormulario.php');

  class Seccion extends DataObject{
    protected $datos=array(
      "Nombre" => ""
    );

    /*
    * Función para obtener las secciones de la web
    */
    public static function obtenerSecciones($secciones){
      $consulta="SELECT * FROM Secciones";
      $conexion=parent::conectar();
      $resultados=$conexion->query($consulta);

      foreach($resultados as $fila){
        echo '<nav class="BarNav">
          <ul id="bn">
            <li> <a href="seccion1-1.php" target="_blank">'.$fila["Nombre"].' </li>
          </ul>
        </nav>';
      }

      parent::desconectar($conexion);
    }

    /*
    * Función para obtener una fila de la tabla 'Secciones'
    */
    public function obtenerFila($id){
      $conexion=parent::conectar();
      $sql="SELECT * FROM Secciones WHERE Nombre='$id'";

      try{
        $st=$conexion->prepare($sql);
        $st->bindValue(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $fila=$st->fetch();
        parent::desconectar($conexion);

        if($fila){
          return new Seccion($fila);
        }
      }catch(PDOException $e){
        parent::desconectar($conexion);
        die("Error de consulta: ".$e->getMessage()."</br>");
      }
    }

    /*
    * Función para insertar una sección en la tabla 'Secciones'
    */
    public static function insertarSeccion($datosS){
      $campo=new Process_form();
      $nom=$datosS;
      $conexion=parent::conectar();

      try{
        $campo->campoCorrecto($nom);
      }catch(Exception $e){
        echo "</br> Error, ".$e->getMessage()."</br>";
      }

      $consultaSQL="INSERT INTO Secciones VALUES ('$datosS[0]')";

      try{
        $conexion->query($consultaSQL);
        parent::desconectar($conexion);
      }catch(PDOException $e){
        parent::desconectar($conexion);
        echo "Error de consulta: ".$e->getMessage()."</br>";
      }
    }

    /*
    * Función para modificar una sección de la tabla 'Secciones'
    */
    public static function modificarSeccion($nom, $nuevoNom){
      $campo=new Process_form();
      $nombre=$nom;
      $nuevoNombre=$nuevoNom;
      $conexion=parent::conectar();

      try{
        $campo->campoCorrecto($nombre);
      }catch(Exception $e){
        echo "</br> Error, ".$e->getMessage()."</br>";
      }

      $consultaSQL="UPDATE Secciones SET Nombre='$nuevoNombre' WHERE Nombre='$nombre'";

      try{
        $conexion->query($consultaSQL);
        parent::desconectar($conexion);
      }catch(PDOException $e){
        parent::desconectar($conexion);
        echo "Error de consulta: ".$e->getMessage()."</br>";
      }
    }

    /*
    * Función para eliminar una sección de la tabla 'Secciones'
    */
    public static function eliminarSeccion($nom){
      $campo=new Process_form();
      $nombreS=$nom;
      $conexion=parent::conectar();

      try{
        $campo->campoCorrecto($nombreS);
      }catch(Exception $e){
        echo "</br> Error, ".$e->getMessage()."</br>";
      }

      $consultaSQL="DELETE FROM Secciones WHERE Nombre='$nombreS'";

      try{
        $conexion->query($consultaSQL);
        parent::desconectar($conexion);
      }catch(PDOException $e){
        parent::desconectar($conexion);
        echo "Error de consulta: ".$e->getMessage()."</br>";
      }
    }
  };
?>
