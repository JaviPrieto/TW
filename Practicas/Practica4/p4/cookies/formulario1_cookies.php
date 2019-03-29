<?php

/////////////////////////////////////////////////////////////////////////////////
/* El formulario ha sido enviado */
if(isset($_POST['nombre'])) {
  /* Comprobar valor de Nombre*/
  if(empty($_POST['nombre']))
    $hayerror['nombre'] = '<p style="color:red;">Introduzca el nombre</p>';
  else if (!preg_match('/^[a-zA-Z, ]*$/',$_POST['nombre']))
    $hayerror['nombre'] = '<p style="color:red;">Nombre invalido</p>';
  else
    $nombre = $_POST['nombre'];

  /* Comprobar que se ha marcado una prenda*/
  if (!isset($_POST['prenda']))
    $hayerror['prenda'] = '<p style="color:red;">Ha de seleccionar una prenda</p>';
  else
    $prenda = $_POST['prenda'];

}

/////////////////////////////////////////////////////////////////////////////////
/* Si no hay errores */
if (isset($nombre) and isset($prenda)){
  /* (COOKIES) */
  setcookie("cook_nombre", $nombre, time()+500);
  setcookie("cook_prenda", $prenda, time()+500);

  header('Location: formulario2_cookies.php');
  exit;
}

/////////////////////////////////////////////////////////////////////////////////
/* Hay errores o no se ha enviado formulario */
else {
?>
<!DOCTYPE>
<html>
  <head>
    <title>TIENDA DE ROPA</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <header>
      <h1>TIENDA DE ROPA</h1>
    </header>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <fieldset>
      <label>Nombre
      <input type="text" name="nombre"
      <?php if (isset($nombre)) echo " value='".$nombre."'";?> />
      <?php if (isset($hayerror) && array_key_exists('nombre', $hayerror))
      echo $hayerror['nombre']; ?></label><br>

      <label>Elija una prenda: <br>
      <input type="radio" name="prenda" value="Camisa"
      <?php if(isset($prenda) and ($prenda)=='Camisa') echo 'checked'; ?>> Camisa<br>
      <input type="radio" name="prenda" value="Pantalon"
      <?php if(isset($prenda) and ($prenda)=='Pantalon') echo 'checked'; ?>> Pantalon<br>
      <input type="radio" name="prenda" value="Falda"
      <?php if(isset($prenda) and ($prenda)=='Falda') echo 'checked'; ?>> Falda<br>

      <?php if (isset($hayerror) && array_key_exists('prenda', $hayerror))
      echo $hayerror['prenda']; ?>
      </label>
      </fieldset>
      <input type="submit" value="Siguiente"/>
    </form>
  </body>
</html>
<?php }
/////////////////////////////////////////////////////////////////////////////////
?>
