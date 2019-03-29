<?php

/////////////////////////////////////////////////////////////////////////////////
/* El formulario ha sido enviado */
if(isset($_POST['email'])){
  /*Validar los datos*/
  if(empty($_POST['email']))
    $hayerror['email'] = '<font color="red">Introduzca su email</font>';
  if(empty($_POST['clave']))
    $hayerror['clave'] = '<font color="red">¿Olvidó su contraseña?</font>';
  //Comprobar que existe en la base de datos
  else{
    $email = $_POST['email'];
    $clave = $_POST['clave'];
  }
}

/////////////////////////////////////////////////////////////////////////////////
/* Si no hay errores */
if(isset($email) and empty($hayerror)){

  header('Location: principal.php');
  exit;
}

/////////////////////////////////////////////////////////////////////////////////
/* Hay errores o no se ha enviado formulario */
else {
?>
<!DOCTYPE>
<html>
  <head>
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
  
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <fieldset>
      <legend><b>Iniciar sesión</b></legend>
      <label>Email<br>
      <input type="email" name="email"
      <?php if (isset($email)) echo " value='".$email."'";?> />
      <?php if (isset($hayerror) && array_key_exists('nombre', $hayerror))
      echo $hayerror['nombre']; ?></label><br>

      <label>Contraseña<br>
      <input type="password" name="clave"
      <?php if (isset($clave)) echo " value='".$clave."'";?> />
      <?php if (isset($hayerror) && array_key_exists('clave', $hayerror))
      echo $hayerror['clave']; ?></label><br>

      </fieldset>
      <input type="submit" value="Aceptar"/>
    </form>
  </body>
</html>
<?php }
/////////////////////////////////////////////////////////////////////////////////

//Funcion para validar el email
function comprobar_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}

?>
