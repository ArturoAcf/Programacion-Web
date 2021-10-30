<!--
  Práctica 2 - Fichero 'seccion1-2.php'
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
    <title> seccion1-2 - Telescopios </title>

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
      <h1> Telescopios </h1>

      <hr id="hr">

      <section class=Productos">
        <article class="Producto">
          <a href="item1-1.php" target="_blank"> <img src="Imagenes/t1.png" alt="Telescopio"> </a>
          <a href="item1-1.php" id="enlace" target="_blank"> Telescopio Skywatcher N 150/1200 </a>
          <p> Diseño óptico: Reflector Newton
              Diámetro: 150mm
              Distancia focal: 1200mm
              Relación focal: f/8
              Máximo aumento recomendable: 300x </p>
        </article>
        <article class="Producto">
          <a href="item1-2.php" target="_blank"> <img src="Imagenes/t2.png" alt="Telescopio"> </a>
          <a href="item1-2.php" id="enlace" target="_blank"> GSO Telescopio Dobson N 250/1250 </a>
          <p> Diseño óptico: Reflector Newton
              Diámetro: 250mm
              Distancia focal: 1250mm
              Relación focal: f/5
              Máximo aumento recomendable: 500x </p>
        </article>
        <article class="Producto">
          <a href="item1-3.php" target="_blank"> <img src="Imagenes/t3.png" alt="Telescopio"> </a>
          <a href="item1-3.php" id="enlace" target="_blank"> Telescopio Schmidt-Cassegrain <br> SC 203/2032 </a>
          <p> Diseño óptico: Reflector Schmidt-Cassegrain
              Diámetro: 203mm
              Distancia focal: 2032mm
              Máximo aumento recomendable: 406x </p>
        </article>
        <article class="Producto">
          <a href="item1-3.php" target="_blank"> <img src="Imagenes/t3.png" alt="Telescopio"> </a>
          <a href="item1-3.php" id="enlace" target="_blank"> Telescopio Schmidt-Cassegrain <br> SC 203/2032 </a>
          <p> Diseño óptico: Reflector Schmidt-Cassegrain
              Diámetro: 203mm
              Distancia focal: 2032mm
              Máximo aumento recomendable: 406x </p>
        </article>
        <article class="Producto">
          <a href="item1-1.php" target="_blank"> <img src="Imagenes/t1.png" alt="Telescopio"> </a>
          <a href="item1-1.php" id="enlace" target="_blank"> Telescopio Skywatcher N 150/1200 </a>
          <p> Diseño óptico: Reflector Newton
              Diámetro: 150mm
              Distancia focal: 1200mm
              Relación focal: f/8
              Máximo aumento recomendable: 300x </p>
        </article>
        <article class="Producto">
          <a href="item1-2.php" target="_blank"> <img src="Imagenes/t2.png" alt="Telescopio"> </a>
          <a href="item1-2.php" id="enlace" target="_blank"> GSO Telescopio Dobson N 250/1250 </a>
          <p> Diseño óptico: Reflector Newton
              Diámetro: 250mm
              Distancia focal: 1250mm
              Relación focal: f/5
              Máximo aumento recomendable: 500x </p>
        </article>
        <article class="Producto">
          <a href="item1-2.php" target="_blank"> <img src="Imagenes/t2.png" alt="Telescopio"> </a>
          <a href="item1-2.php" id="enlace" target="_blank"> GSO Telescopio Dobson N 250/1250 </a>
          <p> Diseño óptico: Reflector Newton
              Diámetro: 250mm
              Distancia focal: 1250mm
              Relación focal: f/5
              Máximo aumento recomendable: 500x </p>
        </article>
        <article class="Producto">
          <a href="item1-3.php" target="_blank"> <img src="Imagenes/t3.png" alt="Telescopio"> </a>
          <a href="item1-3.php" id="enlace" target="_blank"> Telescopio Schmidt-Cassegrain <br> SC 203/2032 </a>
          <p> Diseño óptico: Reflector Schmidt-Cassegrain
              Diámetro: 203mm
              Distancia focal: 2032mm
              Máximo aumento recomendable: 406x </p>
        </article>
        <article class="Producto">
          <a href="item1-1.php" target="_blank"> <img src="Imagenes/t1.png" alt="Telescopio"> </a>
          <a href="item1-1.php" id="enlace" target="_blank"> Telescopio Skywatcher N 150/1200 </a>
          <p> Diseño óptico: Reflector Newton
              Diámetro: 150mm
              Distancia focal: 1200mm
              Relación focal: f/8
              Máximo aumento recomendable: 300x </p>
        </article>
      </section>
    </section>

    <hr>

    <section class="Nums">
      <a href="seccion1-1.php"> 🠐 &nbsp </a>

      <a href="seccion1-1.php"> 1 &nbsp </a>
      <a href="seccion1-2.php"> 2 &nbsp </a>
      <a href="seccion1-3.php"> 3 &nbsp </a>

      <a href="seccion1-3.php"> 🠒 </a>
    </section>

    <hr>

    <footer> <!-- Contacto y cómo se hizo (PDF de la memoria) -->
      <a href="contacto.php" target="_blank"> Contacto &nbsp - </a>
      <a href="como_se_hizo.pdf" target="_blank"> Cómo se hizo </a> <!-- Enlaza al PDF de la memoria y lo abre en otra pestaña -->
    </footer>
  </body>
</html>
