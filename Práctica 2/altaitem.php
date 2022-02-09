<!--
  Práctica 2 - Fichero 'altaitem.php'
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
    <title> altaitem </title>

    <link rel="stylesheet" type="text/css" href="altaItem.css" />

    <script>
      function validarFormulario(){
        let required=["Nombre", "Tipo", "Tam", "Precio", "Fabricante", "Seccion", "desc"];

        for(campo of required){
          if(document.forms["altaitem"][campo].value==""){
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
                <input type="text" name="usr" id="usr" placeholder="Username" required/>
                <label for="psw"><b> Contraseña: </b></label>
                <input type="password" name="psw" id="psw" placeholder="Password" required/>

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

      <form class="info" name="altaitem" action="procesar_altaitem.php" onsubmit="return validarFormulario()" method="post">
        <fieldset>
          <button type="button" id="img"><i> Añadir imagen </i></button>

          <!-- <img alt="Telescopio" id="img"><br/>
          <input id="inputFile1" type="file">

          <script>
            function init(){
              let inputFile=document.getElementById('img');
                inputFile.addEventListener('change', mostrarImagen, false);
              }

              function mostrarImagen(event){
                  let file=event.target.files[0];
                  let reader=new FileReader();
                reader.onload=function(event){
                  let img=document.getElementById('img');
                  img.src=event.target.result;
                }
                reader.readAsDataURL(file);
              }

              window.addEventListener('load', init, false);
          </script> -->

          <label for="Nombre"><b> Nombre: </b></label>
          <input type="text" name="Nombre" id="name" placeholder="Nombre" /> <br>

          <label for="tipo"><b> Tipo: </b></label>
          <select name="Tipo" id="tipo" required>
            <option value="" selected disabled> Tipo del producto </option>
            <option value = "Telescopio"> Telescopio </option>
            <option value = "Binocular"> Binocular </option>
            <option value = "Montura"> Montura </option>
            <option value = "Lente"> Lente </option>
            <option value = "Cámara"> Cámara </option>
            <option value = "Accesorio"> Accesorio </option>
            <option value = "Libro"> Libro </option>
            <option value = "Láser"> Láser </option>
            <option value = "Software"> Software </option>
          </select> <br>

          <label for="Tam"><b> Tamaño: </b></label>
          <input type="text" name="Tam" id="Tam" placeholder="Tamaño" /> <br>
          <label for="Prec"><b> Precio: </b></label>
          <input type="text" name="Precio" id="Prec" placeholder="Precio en euros" /> <br>
          <label for="fab"><b> Fabricante: </b></label>
          <input type="text" name="Fabricante" id="fab" placeholder="Fabricante" /> <br>
          <label for="sec" id="secl"><b> Sección: </b></label>
          <input type="text" name="Seccion" id="sec" placeholder="Sección" /> <br>

          <h2> Descripción </h2>
          <textarea name="desc" rows="8" cols="80" placeholder="Descripción del producto." ></textarea> <br>

          <input type="submit" id="terminar" value="Añadir item"/>
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
