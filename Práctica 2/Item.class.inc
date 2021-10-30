<!--
  Práctica 2 - Fichero 'Item.class.inc'
  Realizado por: Arturo Alonso Carbonero
  DNI: 75936665-A
  Grupo: 3ºA - A1
-->

<?php
  require_once('datosObject.class.inc');
  require_once('procesarFormulario.php');

  class Item extends DataObject{
    protected $datos=array(
      "Nombre" => "",
      "Tipo" => "",
      "Tamanio" => "",
      "Precio" => 0,
      "Fabricante" => "",
      "Seccion" => "",
      "Descripción" => ""
    );

    /*
    * Función para obtener los items de la web
    */
    public static function obtenerItems($items){ // Esto debería ser Items
      $consulta="SELECT * FROM Items";
      $conexion=parent::conectar();
      $resultados=$conexion->query($consulta);

      foreach($resultados as $fila){
        echo "Nombre: ".$fila["Nombre"]." "." Tipo: ".$fila["Tipo"]." Tamanio: ".$fila["Tamanio"]." Precio: ".$fila["Precio"].
        " Fabricante: ".$fila["Fabricante"]." Seccion: ".$fila["Seccion"]."</br>";
      }

      parent::desconectar($conexion);
    }

    /*
    * Función para obtener una fila de la tabla 'Items'
    */
    public function getItem($nombreI){
      $conexion=parent::conectar();
      $sql="SELECT * FROM Items WHERE Nombre='$nombreI'";

      try{
        $st=$conexion->prepare($sql);
        $st->bindValue(":Nombre", $nombreI, PDO::PARAM_INT);
        $st->execute();
        $fila=$st->fetch();
        parent::desconectar($conexion);

        if($fila){
          return new Item($fila);
        }
      }catch(PDOException $e){
        parent::desconectar($conexion);
        die("Error de consulta: ".$e->getMessage()."</br>");
      }
    }

    /*
    * Función para insertar un item en la tabla 'Items'
    */
    public static function insertarItem($datosI){
      $campo=new Process_form();
      $nom=$datosI;
      $conexion=parent::conectar();

      try{
        $campo->campoCorrecto($nom);
      }catch(Exception $e){
        echo "</br> Error, ".$e->getMessage()."</br>";
      }

      $consultaSQL="INSERT INTO Items VALUES ('$datosI[0]', '$datosI[1]', '$datosI[2]', '$datosI[3]', '$datosI[4]', '$datosI[5]', '$datosI[6]')";
      parent::desconectar($conexion);

      try{
        $conexion->query($consultaSQL);
      }catch(PDOException $e){
        parent::desconectar($conexion);
        echo "Error de consulta: ".$e->getMessage()."</br>";
      }
    }

    /*
    * Función para modificar un item de la tabla 'Items'
    */
    public static function modificarItem($itemx, $valores){
      $conexion=parent::conectar();
      $campo=new Process_form();
      $nombreI=$itemx;
      $datos=$valores;

      try{
        foreach($datos as $fila){
          $campo->campoCorrecto($fila);
        }
      }catch(Exception $e){
        echo "</br> Error, ".$e->getMessage()."</br>";
      }

      $consultaSQL="UPDATE Items SET Nombre='$datos[0]', Tipo='$datos[1]', Tamanio='$datos[2]', Precio='$datos[3]', Fabricante='$datos[4]',
                                Descripcion='$datos[5]', Seccion='$datos[6]' WHERE Nombre='$nombreI'";

      try{
        $conexion->query($consultaSQL);
        parent::desconectar($conexion);
      }catch(PDOException $e){
        parent::desconectar($conexion);
        echo "Error de consulta: ".$e->getMessage()."</br>";
      }
    }

    /*
    * Función para eliminar un item de la tabla 'Items'
    */
    public static function eliminarItem($nom){
      $campo=new Process_form();
      $nombreI=$nom;
      $conexion=parent::conectar();

      try{
        $campo->campoCorrecto($nombreI);
      }catch(Exception $e){
        echo "</br> Error, ".$e->getMessage()."</br>";
      }

      $consultaSQL="DELETE FROM Items WHERE Nombre='$nombreI'";
      parent::desconectar($conexion);

      try{
        $conexion->query($consultaSQL);
      }catch(PDOException $e){
        parent::desconectar($conexion);
        echo "Error de consulta: ".$e->getMessage()."</br>";
      }
    }
  };
?>
