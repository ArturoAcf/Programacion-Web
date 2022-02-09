<!--
  Práctica 2 - Fichero 'seccion2.php'
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
    <title> seccion2 - Binoculares </title>

    <link rel="stylesheet" type="text/css" href="seccion.css"/>

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
      <h1> Binoculares </h1>

      <hr id="hr">

      <section class=Productos">
        <article class="Producto">
          <a href="item2.php" target="_blank"> <img src="Imagenes/bn1.png" alt="Binoculares"> </a>
          <a href="item2.php" id="enlace" target="_blank"> Binoculares Fujinon LB 15x80 MT-SX </a>
          <p> Tipo de construcción: Prisamas de porro
              Aumento: 15
              Distancia interocular (mm): 16
              Distancia entre pupilas (mm): 56-72 </p>
        </article>
        <article class="Producto">
          <a href="item2.php" target="_blank"> <img src="Imagenes/bn1.png" alt="Binoculares"> </a>
          <a href="item2.php" id="enlace" target="_blank"> Binoculares Fujinon LB 15x80 MT-SX </a>
          <p> Tipo de construcción: Prisamas de porro
              Aumento: 15
              Distancia interocular (mm): 16
              Distancia entre pupilas (mm): 56-72 </p>
        </article>
        <article class="Producto">
          <a href="item2.php" target="_blank"> <img src="Imagenes/bn1.png" alt="Binoculares"> </a>
          <a href="item2.php" id="enlace" target="_blank"> Binoculares Fujinon LB 15x80 MT-SX </a>
          <p> Tipo de construcción: Prisamas de porro
              Aumento: 15
              Distancia interocular (mm): 16
              Distancia entre pupilas (mm): 56-72 </p>
        </article>
        <article class="Producto">
          <a href="item2.php" target="_blank"> <img src="Imagenes/bn1.png" alt="Binoculares"> </a>
          <a href="item2.php" id="enlace" target="_blank"> Binoculares Fujinon LB 15x80 MT-SX </a>
          <p> Tipo de construcción: Prisamas de porro
              Aumento: 15
              Distancia interocular (mm): 16
              Distancia entre pupilas (mm): 56-72 </p>
        </article>
        <article class="Producto">
          <a href="item2.php" target="_blank"> <img src="Imagenes/bn1.png" alt="Binoculares"> </a>
          <a href="item2.php" id="enlace" target="_blank"> Binoculares Fujinon LB 15x80 MT-SX </a>
          <p> Tipo de construcción: Prisamas de porro
              Aumento: 15
              Distancia interocular (mm): 16
              Distancia entre pupilas (mm): 56-72 </p>
        </article>
        <article class="Producto">
          <a href="item2.php" target="_blank"> <img src="Imagenes/bn1.png" alt="Binoculares"> </a>
          <a href="item2.php" id="enlace" target="_blank"> Binoculares Fujinon LB 15x80 MT-SX </a>
          <p> Tipo de construcción: Prisamas de porro
              Aumento: 15
              Distancia interocular (mm): 16
              Distancia entre pupilas (mm): 56-72 </p>
        </article>
        <article class="Producto">
          <a href="item2.php" target="_blank"> <img src="Imagenes/bn1.png" alt="Binoculares"> </a>
          <a href="item2.php" id="enlace" target="_blank"> Binoculares Fujinon LB 15x80 MT-SX </a>
          <p> Tipo de construcción: Prisamas de porro
              Aumento: 15
              Distancia interocular (mm): 16
              Distancia entre pupilas (mm): 56-72 </p>
        </article>
        <article class="Producto">
          <a href="item2.php" target="_blank"> <img src="Imagenes/bn1.png" alt="Binoculares"> </a>
          <a href="item2.php" id="enlace" target="_blank"> Binoculares Fujinon LB 15x80 MT-SX </a>
          <p> Tipo de construcción: Prisamas de porro
              Aumento: 15
              Distancia interocular (mm): 16
              Distancia entre pupilas (mm): 56-72 </p>
        </article>
        <article class="Producto">
          <a href="item2.php" target="_blank"> <img src="Imagenes/bn1.png" alt="Binoculares"> </a>
          <a href="item2.php" id="enlace" target="_blank"> Binoculares Fujinon LB 15x80 MT-SX </a>
          <p> Tipo de construcción: Prisamas de porro
              Aumento: 15
              Distancia interocular (mm): 16
              Distancia entre pupilas (mm): 56-72 </p>
        </article>
      </section>
    </section>

    <hr>

    <section class="Nums">
      <a href="seccion2.php"> 🠐 &nbsp </a>

      <a href="seccion2.php"> 1 &nbsp </a>
      <a href="seccion2.php"> 2 &nbsp </a>
      <a href="seccion2.php"> 3 &nbsp </a>

      <a href="seccion2.php"> 🠒 </a>
    </section>

    <hr>

    <footer> <!-- Contacto y cómo se hizo (PDF de la memoria) -->
      <a href="contacto.php" target="_blank"> Contacto &nbsp - </a>
      <a href="como_se_hizo.pdf" target="_blank"> Cómo se hizo </a> <!-- Enlaza al PDF de la memoria y lo abre en otra pestaña -->
    </footer>
  </body>
</html>
