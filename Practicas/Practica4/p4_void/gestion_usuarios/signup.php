<?php

/////////////////////////////////////////////////////////////////////////////////
/* El formulario ha sido enviado (Validamos datos) */
require("validar_signup.php");

/////////////////////////////////////////////////////////////////////////////////
/* Si no hay errores */
if(isset($nombre) and empty($hayerror)){
  //Crear fila en la tabla
  header('Location: login.php');
  exit;
}

/*Si creamos la fila en la tabla -> pasar a login
if()

*/

/////////////////////////////////////////////////////////////////////////////////
/* Hay errores o no se ha enviado formulario */
else {
?>
<!DOCTYPE>
<html>
  <head>
    <title>Signup</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <fieldset>
      <legend><b>Registrarse</b></legend>
      
      <label>Nombre(*)<br> <input type="text" name="nombre"
      <?php if (isset($nombre)) echo " value='".$nombre."'";?> />
      <?php if (isset($hayerror) && array_key_exists('nombre', $hayerror))
      echo $hayerror['nombre']; ?></label><br>

      <label>Apellidos(*)<br> <input type="text" name="apellidos"
      <?php if (isset($apellidos)) echo " value='".$apellidos."'";?> />
      <?php if (isset($hayerror) && array_key_exists('apellidos', $hayerror))
      echo $hayerror['apellidos']; ?></label><br>

      <label>E-mail(*)<br> <input type="email" name="email"
      <?php if (isset($email)) echo " value='".$email."'";?> />
      <?php if (isset($hayerror) && array_key_exists('email', $hayerror))
      echo $hayerror['email']; ?></label><br>

      <label>Contraseña(*)<br> <input type="password" name="clave"
      <?php if (isset($clave)) echo " value='".$clave."'";?> />
      <?php if (isset($hayerror) && array_key_exists('clave', $hayerror))
      echo $hayerror['clave']; ?></label><br>

      <label>¿Que tipo de usuario serás?:<br>
        <input type="radio" name="tipo" value="User"
        <?php if(isset($suscripcion) and ($suscripcion)=='User') echo 'checked'; ?>>User
        <input type="radio" name="tipo" value="Admin"
        <?php if(isset($suscripcion) and ($suscripcion)=='Admin') echo 'checked'; ?>>Admin

        <?php if (isset($hayerror) && array_key_exists('tipo', $hayerror))
        echo $hayerror['tipo']; ?>
      </label><br>


      </fieldset>
      <input type="submit" value="Registrarse"/>
    </form>

    <form action="login.php" method="post">
      <input type="submit" value="Ya tengo cuenta"/>
    </form>
  </body>
</html>
<?php }

/////////////////////////////////////////////////////////////////////////////////
?>
