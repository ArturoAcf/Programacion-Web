<!--
  Práctica 2 - Fichero 'altausuario.php'
  Realizado por: Arturo Alonso Carbonero
  Grupo: 3ºA - A1
-->

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title> altausuario </title>

    <link rel="stylesheet" type="text/css" href="altausuario_css.css" />

    <script>
      function validarFormulario(){
        let required=["usr", "correo", "Nombre", "surname1", "surname2", "date",
                      "nac", "forma", "adc", "psw", "psw_c", "gen", "checkTerms"];

        for(campo of required){
          if(document.forms["altausuario"][campo].value==""){
            alert("El campo "+campo+" es obligatorio");
            return false;
          }
        }

        if(document.forms["altausuario"]["psw"].value==""){
          alert("Introduce una contraseña");
          return false;
        }

        let pass=document.forms["altausuario"]["psw"].value;
        if((pass.length!=0 && pass.length<4) && pass.value!=document.forms["altausuario"]["psw_c"].value){
          alert("La contraseña debe ser igual a la anterior");
          return false;
        }

        let correoElectronico=document.forms["altausuario"]["correo"].value;
        if(correoElectronico.indexOf(' ')>-1){
          alert("Un correo electrónico no puede contener espacios en blanco");
          return false;
        }else if(correoElectronico.indexOf('@')<1){
          alert("Un correo electrónico debe tener este formato: <nombre>@<dominio>.<extension>");
          return false;
        }
      }
    </script>
  </head>

  <body>
    <header>
      <h1> Formulario para darse de alta </h1>
    </header>

    <section class="main">
      <form class="info" name="altausuario" action="procesar_altausuario.php" onsubmit="return validarFormulario()" method="post">
        <fieldset>
          <label for="usr"><b> Nombre de Usuario: </b></label>
          <input type="text" name="usr" id="usr" placeholder="Nombre Usuario"/> <br>
          <label for="correo"><b> Correo Electrónico: </b></label>
          <input type="text" name="correo" id="correo" placeholder="ejemplo@gmail.com"/> <br>
          <label for="Nombre"><b> Nombre: </b></label>
          <input type="text" name="Nombre" id="Nombre" placeholder="Nombre"/> <br>
          <label for="surname1"><b> Primer apellido: </b></label>
          <input type="text" name="surname1" id="surname1" placeholder="Primer apellido"/> <br>
          <label for="surname2"><b> Segundo apellido: </b></label>
          <input type="text" name="surname2" id="surname2" placeholder="Segundo apellido"/> <br>
          <label for="date"><b> Fecha de nacimiento: </b></label>
          <input type="text" name="date" id="date" placeholder="aaaa-mm-dd"/> <br>
          <label for="nac"><b> Nacionalidad: </b></label>
          <input type="text" name="nac" id="nac" placeholder="País"/> <br>

          <label for="for"><b> Formación: </b></label>
          <select name="for" id="for">
            <option value="" selected disabled> Nivel de formación </option>
            <option value = "ESO"> Educación Secundaria Obligatoria (ESO) </option>
            <option value = "Bachillerato"> Bachillerato </option>
            <option value = "Grado"> Grado universitario </option>
            <option value = "FP"> Formación profesional (FP) </option>
            <option value = "Otro"> Otro </option>
          </select> <br>

          <label for="adc"><b> Área de conocimiento: </b></label>
          <input type="text" name="adc" id="adc" list="ac">
          <datalist id="ac">
            <option value="Ingeniería Informática">
            <option value="Telecomunicaciones">
            <option value="Ingeniería Mecánica">
            <option value="Ingeniería Electrónica">
            <option value="Biología">
            <option value="Geología">
            <option value="Química">
            <option value="Física">
            <option value="Matemáticas">
          </datalist> <br>

          <!-- En un futuro se comprobará si son la misma -->
          <label for="psw"><b> Contraseña: </b></label>
          <input type="password" name="psw" id="psw" placeholder="Caracteres alfanuméricos"/>
          <label for="psw_c"><b> Contraseña: </b></label>
          <input type="password" name="psw_c" id="psw_c" placeholder="Repetir contraseña"/> <br>

          <label><b> Género: </b></label> <br>
          <input type="radio" id="radio" name="gen" value="Hombre">
          <label for="m" id="g"> Masculino </label>
          <input type="radio" name="gen" value="Mujer">
          <label for="f" id="g"> Femenino </label>
          <input type="radio" name="gen" value="Otro">
          <label for="other" id="g"> Otro </label> <br>

          <label for="checkTerms"><b> Aceptar términos de uso: </b></label>
          <input type="checkbox" name="checkTerms" id="checkTerms"/> <br>

          <input type="submit" id="b1" value="Enviar"/>

          <input type="reset" id="b2" value="Reiniciar"/>
        </fieldset>
      </form>
    </section>

    <hr>

    <footer> <!-- Contacto y cómo se hizo (PDF de la memoria) -->
      <a href="contacto.php" target="_blank"> Contacto &nbsp - </a>
      <a href="como_se_hizo.pdf" target="_blank"> Cómo se hizo </a> <!-- Enlaza al PDF de la memoria y lo abre en otra pestaña -->
    </footer>
  </body>
</html>
