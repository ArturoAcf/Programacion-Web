<!--
  Práctica 2 - Fichero 'index.php'
  Realizado por: Arturo Alonso Carbonero
  DNI: 75936665-A
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
    <title> index </title>

    <link rel="stylesheet" type="text/css" href="index.css"/>

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

    <section class="main"> <!-- Section con el contenido principal del cuerpo -->
      <section id="section_img"> <!-- Imagen -->
        <img src="Imagenes/Luna.jpeg" alt="Observar">
      </section>

      <section class="vertical-line"></section> <!-- Línea vertical -->

      <section>
        <h1> Algunos items destacados </h1> <!-- Algunos items destacados -->

        <section class="Scroll">
          <article class="Producto"> <!-- Producto -->
            <a href="item1-1.php" target="_blank"> <img src="Imagenes/t1.png" alt="Telescopio"> </a>
            <a href="item1-1.php" target="_blank" id="a"> Telescopio Skywatcher N 150/1200 <br> Explorer 150PL EQ3-2 </a>
          </article>

          <article class="Producto"> <!-- Producto -->
            <a href="item3.php" target="_blank"> <img src="Imagenes/m1.png" alt="Montura"> </a>
            <a href="item3.php" target="_blank" id="a"> Montura ecuatorial NEQ3-2 </a>
          </article>

          <article class="Producto"> <!-- Producto -->
            <a href="item2.php" target="_blank"> <img src="Imagenes/bn1.png" alt="Binoculares"> </a>
            <a href="item2.php" target="_blank" id="a"> Binoculares Fujinon LB 15x80 MT-SX </a>
          </article>

          <article class="Producto"> <!-- Producto -->
            <a href="item1-2.php" target="_blank"> <img src="Imagenes/t2.png" alt="Telescopio"> </a>
            <a href="item1-2.php" target="_blank" id="a"> GSO Telescopio Dobson N 250/1250 DOB </a>
          </article>

          <article class="Producto"> <!-- Producto -->
            <a href="item2.php" target="_blank"> <img src="Imagenes/m2.png" alt="Montura"> </a>
            <a href="item2.php" target="_blank" id="a"> Montura Celestron AVX (Avanzada) 91519 </a>
          </article>
        </section>
      </section>
    </section>

    <hr>

    <footer> <!-- Contacto y cómo se hizo (PDF de la memoria) -->
      <a href="contacto.php" target="_blank"> Contacto &nbsp - </a>
      <a href="como_se_hizo.pdf" target="_blank"> Cómo se hizo </a> <!-- Enlaza al PDF de la memoria y lo abre en otra pestaña -->
    </footer>
  </body>
</html>
