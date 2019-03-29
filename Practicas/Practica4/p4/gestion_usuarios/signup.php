<?php

/////////////////////////////////////////////////////////////////////////////////
/* El formulario ha sido enviado (Validamos datos) */
if(isset($_POST['nombre']))
  require("validar_signup.php");

/////////////////////////////////////////////////////////////////////////////////
/* Si no hay errores */
if(isset($nombre) and empty($hayerror)){
  //Acceder a la base de datos
  $db = mysqli_connect("localhost","javiprieto11718","3PoR2dbG","javiprieto11718");
  // Establecer la codificación de los datos almacenados ("collation")
  mysqli_set_charset($db,"utf8");

  //Comprobamos que no existe un usuario con los mismos datos(email)
  $res = mysqli_query($db,"SELECT Email FROM usuariosBD WHERE Email='$email'");
  if($res){ // Si no hay error
    if(mysqli_num_rows($res)>0){
      echo "<font color='red'>Ya existe un usuario con esos datos</font>";
      ?>
      <form action="signup.php" method="post">
        <input type="submit" value="Volver"/>
      </form>
      <?php
    }
  }
  else{ //Si no coincide

    //Insertamos los datos en la tabla
    mysqli_query($db, "INSERT INTO usuariosBD VALUES ('$nombre','$apellidos','$email','$clave','$tipo')");
    echo "Registro completado";
    ?>

    <form action="login.php" method="post">
      <input type="submit" value="Acceder"/>
    </form>
    <?php
  }
  mysqli_close($db);
}

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
        <?php if(isset($tipo) and ($tipo)=='User') echo 'checked'; ?>>User
        <input type="radio" name="tipo" value="Admin"
        <?php if(isset($tipo) and ($tipo)=='Admin') echo 'checked'; ?>>Admin

        <?php if (isset($hayerror) && array_key_exists('tipo', $hayerror))
        echo $hayerror['tipo']; ?>
      </label><br><br>

        <input type="submit" value="Registrarse"/>
      </fieldset>
    </form>

    <form action="login.php" method="post">
      <input type="submit" value="Ya tengo cuenta"/>
    </form>


  </body>
</html>
<?php }
/////////////////////////////////////////////////////////////////////////////////
?>
