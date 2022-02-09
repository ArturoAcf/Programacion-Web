<!--
  Práctica 2 - Fichero 'item1-2.php'
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
    <title> item1-2 </title>

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
              echo '<h2 id="u"> '.$_SESSION['Usuario'].'</h2>
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
        <img src="Imagenes/t2.png" alt="Telescopio" id="img">
      </section>

      <article class="info">
        <fieldset>
          <label for="name"><b> Nombre: </b></label>
          <input type="text" id="name" value="GSO Telescopio Dobson N 250/1250" readonly/> <br>
          <label for="tipo"><b> Tipo de producto: </b></label>
          <input type="text" id="tipo" value="Telescopio" readonly/> <br>
          <label for="tam"><b> Tamaño: </b></label>
          <input type="text" id="tam" value="1250mm x 250mm" readonly/> <br>
          <label for="prec"><b> Precio: </b></label>
          <input type="text" id="prec" value="875.00€" readonly/> <br>
          <label for="fab"><b> Fabricante: </b></label>
          <input type="text" id="fab" value="GSO" readonly/> <br>
          <label for="sec"><b> Sección: </b></label>
          <input type="text" id="sec" value="Telescopios" readonly/>
        </fieldset>
      </article>

      <p id="imgT"> GSO Telescopio Dobson N 250/1250 - Telescopios </p>

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

        <textarea name="desc" rows="8" cols="80" readonly>GSO Telescopio Dobson N 250/1250:
Potente dobsoniano portátil GSO 880 con una apertura de 10" y una distancia focal de 1250 mm.
Éste es el telescopio ideal para observar objetos de cielo profundo. El tubo cabe en el asiento trasero del coche.
Experimente el placer de la observación con la óptica de calidad de GSO. Observe la Gran Mancha Roja de Júpiter, el mayor torbellino conocido por la humanidad, los anillos de Saturno o la división de Cassini, que revela la verdadera estructura de los anillos. Disfrute de la capacidad de captación de luz de estas ópticas parabólicas de alta calidad y localice los brazos espirales de las galaxias o los jirones de las nebulosas de los viveros estelares. </textarea>
      </section>

      <section class="prev-post">
        <a href="item1-1.php" id="ant"> Anterior </a>
        <a href="item1-3.php" id="sig"> Siguiente </a>
      </section>
    </section>

    <hr>

    <footer> <!-- Contacto y cómo se hizo (PDF de la memoria) -->
      <a href="contacto.php" target="_blank"> Contacto &nbsp - </a>
      <a href="como_se_hizo.pdf" target="_blank"> Cómo se hizo </a> <!-- Enlaza al PDF de la memoria y lo abre en otra pestaña -->
    </footer>
  </body>
</html>
