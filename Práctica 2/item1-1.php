<!--
  Práctica 2 - Fichero 'item1-1.php'
  Realizado por: Arturo Alonso Carbonero
  Grupo: 3ºA - A1
-->

<?php
  session_start();
  $Admin="Admin";
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title> item1-1 </title>

    <link rel="stylesheet" type="text/css" href="item.css"/>

    <script>
      function validarFormulario(){
        let required=["usr", "psw"];

        for(campo of required){
          if(document.forms["iniciar_sesion"][campo].value==""){
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
            echo '<form class="iniciar_sesion" name="iniciar_sesion" action="procesar_login.php" onsubmit="return validarFormulario()" method="post">
              <fieldset> <!-- Inicion de sesión / Registro de usuarios -->
                <label for="usr"><b> Usuario: </b></label>
                <input type="text" name="usr" id="usr" placeholder="Username" />
                <label for="psw"><b> Contraseña: </b></label>
                <input type="password" name="psw" id="psw" placeholder="Password" />

                <input type="submit" id="b1" value="Enviar"/>
              </fieldset>
            </form>

            <a href="altausuario.php"> Registro de usuarios </a>';
          }
        ?>
      </aside>

      <?php
        require_once('Seccion.class.inc');

        $arrayS=array();
        $Secciones=Seccion::obtenerSecciones($arrayS);
      ?>
    </header>

    <hr>

    <section class="main">
      <h1> Telescopios </h1>

      <hr id="hr">

      <section id="section_img"> <!-- Imagen -->
        <img src="Imagenes/t1.png" alt="Telescopio" id="img">
      </section>

      <article class="info">
        <fieldset>
          <label for="name"><b> Nombre: </b></label>
          <input type="text" id="name" value="Telescopio Skywatcher N 150/1200" readonly/> <br>
          <label for="tipo"><b> Tipo de producto: </b></label>
          <input type="text" id="tipo" value="Telescopio" readonly/> <br>
          <label for="tam"><b> Tamaño: </b></label>
          <input type="text" id="tam" value="1200mm x 150mm" readonly/> <br>
          <label for="prec"><b> Precio: </b></label>
          <input type="text" id="prec" value="719.00€" readonly/> <br>
          <label for="fab"><b> Fabricante: </b></label>
          <input type="text" id="fab" value="Skywatcher" readonly/> <br>
          <label for="sec"><b> Sección: </b></label>
          <input type="text" id="sec" value="Telescopios" readonly/>
        </fieldset>
      </article>

      <p id="imgT"> Telescopio Skywatcher N 150/1200 - Telescopios </p>

      <script>
        let img=document.getElementById('img');
        let name=document.getElementById('name');
        let sec=document.getElementById('sec');


        document.getElementById('imgT').style.display='none';

        img.onmouseover=function(){
          document.getElementById('imgT').style.display='block';
          document.getElementById('imgT').style.color='white';
          document.getElementById('imgT').style.marginLeft="90px";
        }

        img.onmouseout=function(){
          document.getElementById('imgT').style.display='none';
        }
      </script>

      <section class="desc">
        <h2> Descripción </h2>
        <!-- Mejor forma de que se visualice correctamente (?) -->
        <textarea name="desc" rows="8" cols="80" readonly>Telescopio Skywatcher N 150/1200:
¡Ésta es una muy buena alternativa para principiantes y un indispensable para los astrónomos aficionados más experimentados! Este telescopio reflector newtoniano con su impresionante diámetro de 150 mm recoge tanta luz que se hacen visibles hermosos objetos distantes del cielo profundo, como la nebulosa del Anillo en la constelación de Lyra o la nebulosa Dumbbell. Incluso estrellas individuales de cúmulos globulares como el M13 quedan definidas hasta el borde.
En la observación planetaria también ofrece imágenes detalladas de Saturno, Júpiter, Venus y Marte. Gracias al rango de apertura de f/8, este reflector es un verdadero todoterreno, adecuado tanto para el cielo profundo como para la observación planetaria. La capacidad de recogida de luz del 150 es 460 veces mayor que la del ojo humano. </textarea>
      </section>

      <section class="prev-post">
        <a href="item1-2.php" id="sig"> Siguiente </a>
      </section>
    </section>

    <hr>

    <footer> <!-- Contacto y cómo se hizo (PDF de la memoria) -->
      <a href="contacto.php" target="_blank"> Contacto &nbsp - </a>
      <a href="como_se_hizo.pdf" target="_blank"> Cómo se hizo </a> <!-- Enlaza al PDF de la memoria y lo abre en otra pestaña -->
    </footer>
  </body>
</html>
