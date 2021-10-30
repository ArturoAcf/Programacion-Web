<!--
  Práctica 2 - Fichero 'administracion.php'
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> administracion </title>

    <link rel="stylesheet" type="text/css" href="administracion.css"/>
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
                <input type="text" name="usr" id="usr" placeholder="Username" required/>
                <label for="psw"><b> Contraseña: </b></label>
                <input type="password" name="psw" id="psw" placeholder="Password" required/>

                <input type="submit" id="b1" value="Enviar"/>
              </fieldset>
            </form>

            <a href="altausuario.php"> Registro de usuarios </a>';
          }
        ?>
      </aside>
    </header>

    <hr>

    <section class="main"> <!-- Section con el contenido principal del cuerpo -->
      <h1> Seleccione una opción </h1>

      <!-- Usuarios -->
      <section class="col">
        <h1> Gestión de Usuarios </h1>

        <form action="altausuario.php" method="post">
          <fieldset> <!-- Inicion de sesión / Registro de usuarios -->
            <input type="submit" id="b1" value="Añadir usuario"/>
          </fieldset>
        </form>

        <?php
          echo'
          <form class="eliminar" action="eliminarusuario.php" method="post">
            <fieldset>
              <label for="user"><b> Eliminar Usuario: </b></label>
              <input type="text" name="user" id="user" placeholder="Nombre de Usuario" /> <br>
            </fieldset>
          </form>
          ';
        ?>
      </section>

      <!-- Items -->
      <section class="col">
        <h1> Gestión de Items </h1>

        <form action="altaitem.php" method="post">
          <fieldset> <!-- Inicion de sesión / Registro de usuarios -->
            <input type="submit" id="b1" value="Añadir item"/>
          </fieldset>
        </form>

        <?php
          echo'
          <form class="eliminar" action="eliminaritem.php" method="post">
            <fieldset>
              <label for="name"><b> Eliminar Item: </b></label>
              <input type="text" name="Nombre" id="name" placeholder="Nombre del Item" /> <br>
            </fieldset>
          </form>
          ';
        ?>

        <?php
          echo'
          <form class="modificar" action="modificaritem.php" method="post">
            <fieldset>
              <label for="itemx"><b> Modificar Item: </b></label>
              <input type="text" name="itemx" id="name" placeholder="Nombre del Item" /> <br>
            </fieldset>
          </form>
          ';
        ?>
      </section>

      <!-- Secciones -->
      <section class="col">
        <h1> Gestión de Secciones </h1>

        <?php
          echo'
          <form class="sec" action="procesar_altaseccion.php" method="post">
            <fieldset>
              <label for="sec"><b> Añadir Seccion: </b></label>
              <input type="text" name="sec" id="name" placeholder="Nombre de la Sección" /> <br>
            </fieldset>
          </form>
          ';
        ?>

        <?php
          echo'
          <form class="sec" action="eliminarseccion.php" method="post">
            <fieldset>
              <label for="sec"><b> Eliminar Sección: </b></label>
              <input type="text" name="sec" id="user" placeholder="Nombre de la Sección" /> <br>
            </fieldset>
          </form>
          ';
        ?>

        <?php
          echo'
          <form class="sec" action="modificarseccion.php" method="post">
            <fieldset>
              <label for="nom1"><b> Nombre de la sección: </b></label>
              <input type="text" name="nom1" id="name" placeholder="Nombre de la sección" /> <br>

              <label for="nom2"><b> Nuevo nombre: </b></label>
              <input type="text" name="nom2" id="name" placeholder="Nombre de la sección" /> <br>

              <input type="submit" id="bm" value="Modificar Sección"/>
            </fieldset>
          </form>
          ';
        ?>
      </section>
    </section>

    <hr>

    <footer> <!-- Contacto y cómo se hizo (PDF de la memoria) -->
      <a href="contacto.php" target="_blank"> Contacto &nbsp - </a>
      <a href="como_se_hizo.pdf" target="_blank"> Cómo se hizo </a> <!-- Enlaza al PDF de la memoria y lo abre en otra pestaña -->
    </footer>
  </body>
</html>
