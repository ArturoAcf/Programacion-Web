<!--
  Práctica 2 - Fichero 'modificaritem.php'
  Realizado por: Arturo Alonso Carbonero
  Grupo: 3ºA - A1
-->

<?php
  session_start();
  require_once('Item.class.inc');

  $Admin="Admin";

  $itemx=$_POST['itemx'];
  $item=Item::getItem($itemx);
  $nombreI=$item->devolverValor('Nombre');
  $tipo=$item->devolverValor('Tipo');
  $tam=$item->devolverValor('Tamanio');
  $precio=$item->devolverValor('Precio');
  $fabricante=$item->devolverValor('Fabricante');
  $seccion=$item->devolverValor('Seccion');
  // $desc=$item->devolverValor('Descripcion');         ¿?
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title> modificaritem </title>

    <link rel="stylesheet" type="text/css" href="altaItem.css" />

    <script>
      function validarFormulario(){
        let required=["Nombre", "Tipo", "Tam", "Precio", "Fabricante", "Seccion", "desc"];

        for(campo of required){
          if(document.forms["modificaritem"][campo].value==""){
            alert("El campo "+campo+" es obligatorio");
            return false;
          }
        }
      }
    </script>
  </head>

  <body>
    <header>
      <h1> AD ASTRA </h1> <!-- Título provisional -->

      <img src="Imagenes/Luna.jpeg" alt="Luna"> <!-- Logo provisional -->

      <aside>
        <?php
          if(!empty($_SESSION['Usuario'])){
              echo '<h2 id="u"> '.$_SESSION['Usuario'].' </h2>
              <a class="enlace" href="procesar_logout.php" id="u2"> Cerrar Sesión &nbsp </a>';

              if($_SESSION['Usuario']==$Admin){
                echo '<a class="enlace" href="administracion.php" id="u3"> Administración </a>';
              }else{
                echo '<a class="enlace" href="modificarperfil.php" id="u3"> Editar perfil </a>';
            }
          }else{
            echo '<form class="iniciar_sesion" action="procesar_login.php" method="post">
              <fieldset> <!-- Inicion de sesión / Registro de usuarios -->
                <label for="usr"><b> Usuario: </b></label>
                <input type="text" name="usr" id="usr" placeholder="Username" />
                <label for="psw"><b> Contraseña: </b></label>
                <input type="password" name="psw" id="psw" placeholder="Password" />

                <input type="submit" id="b1" value="Enviar"/>
              </fieldset>
            </form>';
          }
        ?>
      </aside>
    </header>

    <hr>

    <section class="main">
      <h1> Formulario para añadir un producto </h1>

      <form class="info" name="modificaritem" action="procesar_modificaritem.php" onsubmit="return validarFormulario()" method="post">
        <?php
          echo '<input type="hidden" name="itemx" id="itemx" value='.$itemx.' readonly>';
        ?>

        <fieldset>
          <section id="section_img"> <!-- Imagen -->
            <img src="Imagenes/t3.png" alt="Telescopio" id="img">
          </section>

          <label for="name"><b> Nombre: </b></label>
          <input type="text" name="Nombre" id="name" value="<?php echo $nombreI ?>" /> <br>

          <label for="tipo"><b> Tipo: </b></label>
          <select name="Tipo" id="tipo" >
            <option <?php if($tipo=="Telescopio") echo "selected='selected'" ?> value="<?php echo $tipo ?>"> Telescopio </option>
            <option <?php if($tipo=="Binocular") echo "selected='selected'" ?> value="<?php echo $tipo ?>"> Binocular </option>
            <option <?php if($tipo=="Montura") echo "selected='selected'" ?> value="<?php echo $tipo ?>"> Montura </option>
            <option <?php if($tipo=="Lente") echo "selected='selected'" ?> value="<?php echo $tipo ?>"> Lente </option>
            <option <?php if($tipo=="Cámara") echo "selected='selected'" ?> value="<?php echo $tipo ?>"> Cámara </option>
            <option <?php if($tipo=="Accesorio") echo "selected='selected'" ?> value="<?php echo $tipo ?>"> Accesorio </option>
            <option <?php if($tipo=="Libro") echo "selected='selected'" ?> value="<?php echo $tipo ?>"> Libro </option>
            <option <?php if($tipo=="Láser") echo "selected='selected'" ?> value="<?php echo $tipo ?>"> Láser </option>
            <option <?php if($tipo=="Software") echo "selected='selected'" ?> value="<?php echo $tipo ?>"> Software </option>
          </select> <br>

          <label for="Tam"><b> Tamaño: </b></label>
          <input type="text" name="Tam" id="Tam" value="<?php echo $tam ?>" /> <br>
          <label for="Prec"><b> Precio: </b></label>
          <input type="text" name="Precio" id="Prec" value="<?php echo $precio ?>" /> <br>
          <label for="fab"><b> Fabricante: </b></label>
          <input type="text" name="Fabricante" id="fab" value="<?php echo $fabricante ?>" /> <br>
          <label for="sec" id="secl"><b> Sección: </b></label>
          <input type="text" name="Seccion" id="sec" value="<?php echo $seccion ?>" /> <br>

          <p id="imgT"> <?php echo $nombreI ?> - <?php echo $seccion ?> </p>

          <script>
            let img=document.getElementById('img');
            let name=document.getElementById('name');
            let sec=document.getElementById('sec');


            document.getElementById('imgT').style.display='none';

            img.onmouseover=function(){
              document.getElementById('imgT').style.display='block';
              document.getElementById('imgT').style.color='white';
            }

            img.onmouseout=function(){
              document.getElementById('imgT').style.display='none';
            }
          </script>

          <h2> Descripción </h2>
          <textarea name="desc" rows="8" cols="80" value="Descripción" ></textarea> <br>

          <input type="submit" id="terminar" value="Modificar"/>
          <input type="reset" id="b2" value="Reiniciar"/>
        </fieldset>
      </form>
    </section>

    <footer> <!-- Contacto y cómo se hizo (PDF de la memoria) -->
      <a href="contacto.php" target="_blank"> Contacto &nbsp - </a>
      <a href="como_se_hizo.pdf" target="_blank"> Cómo se hizo </a> <!-- Enlaza al PDF de la memoria y lo abre en otra pestaña -->
    </footer>
  </body>
</html>
