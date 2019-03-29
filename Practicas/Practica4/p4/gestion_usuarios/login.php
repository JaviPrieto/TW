<?php

/////////////////////////////////////////////////////////////////////////////////
/* El formulario ha sido enviado */
if(isset($_POST['email'])){
  /*Validar los datos*/
  if(empty($_POST['email']))
    $hayerror['email'] = '<font color="red">Introduzca su email</font>';
  else if(!comprobar_email($_POST['email']))
    $hayerror['email'] = '<font color="red">El email introducido no es correcto</font>';
  else
    $email = $_POST['email'];

  /*Validar la clave*/
  if(empty($_POST['clave']))
    $hayerror['clave'] = '<font color="red">¿Olvidó su contraseña?</font>';
  else if(strlen($_POST['clave']) < 6)
    $hayerror['clave'] = '<font color="red">La contraseña es muy corta.(6 dígitos)</font>';
  else
    $clave = $_POST['clave'];
}

/////////////////////////////////////////////////////////////////////////////////
/* Si no hay errores */
if(isset($email) and empty($hayerror)){
  //Acceder a la base de datos
  $db = mysqli_connect("localhost","javiprieto11718jul","bBEimgWH","javiprieto11718jul");
  // Establecer la codificación de los datos almacenados ("collation")
  mysqli_set_charset($db,"utf8");

  $res_email = mysqli_query($db,"SELECT email FROM usuarios WHERE email='$email'");
  $res_clave = mysqli_query($db,"SELECT login FROM usuarios WHERE login='$clave'");

  //Si hay un usuario con ese email y contraseña
  if($res_email and $res_clave){
    //Hacemos la consulta sobre el tipo de usuario
    $res_tipo = mysqli_query($db,"SELECT tipo FROM usuarios WHERE email='$email'");
    if($res_tipo){
      $valor_tipo = mysqli_fetch_assoc($res_tipo);
      //Comprobar si es usuario
      if($valor_tipo['tipo'] == 'Admin'){
        echo "Bienvenido eres admin";
      }
      else if($valor_tipo['Tipo'] == 'Manager'){
        echo "Bienvenido eres gestor";
      }
    }
  }
  else{
    echo "<font color='red'>No existe ningún usuario con esos datos</font>";
    ?>
    <form action="login.php" method="post">
      <input type="submit" value="Volver"/>
    </form>
    <?php
  }
  mysqli_close($db);

}

/////////////////////////////////////////////////////////////////////////////////
/* Hay errores o no se ha enviado formulario */
else {

<!DOCTYPE>
require ("html_comun.php");
HTMLinicio("Login");
HTMLnav(0);

//Pagina principal
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
  echo $hayerror['clave']; ?></label><br><br>

  <input type="submit" value="Aceptar"/>
  </fieldset>

</form>







HTMLfooter();
HTMLfin();
?>


<?php }
/////////////////////////////////////////////////////////////////////////////////

//Funcion para validar el email
function comprobar_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}

?>
