<?php

/*Comprobar que hemos pasado antes por el formulario1*/
if( !isset($_COOKIE["cook_nombre"]) and !isset($_COOKIE["cook_prenda"]) ){
  header('Location: formulario1_cookies.php');
  exit;
}

/////////////////////////////////////////////////////////////////////////////////
/* El formulario ha sido enviado */
if(isset($_POST['talla'])) {
  /* Comprobar valor de la talla*/
  if(empty($_POST['talla']))
    $hayerror['talla'] = '<p style="color:red;">Introduzca la talla</p>';
  else if (($_POST['talla']<30) or ($_POST['talla']>50))
    $hayerror['talla'] = '<p style="color:red;">Talla invalida</p>';
  else
    $talla = $_POST['talla'];

  /* Comprobar que se ha marcado un color*/
  if (!isset($_POST['color']))
    $hayerror['color'] = '<p style="color:red;">Ha de seleccionar un color</p>';
  else
    $color = $_POST['color'];
}

/////////////////////////////////////////////////////////////////////////////////
/* Si no hay errores */
if (isset($talla) && isset($color)){
  /* (COOKIES) */
  setcookie("cook_talla", $talla, time()+500);
  setcookie("cook_color", $color, time()+500);

  header('Location: formulario3_cookies.php');
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
      <label>Talla (entre 30-50)
      <input type='text' name='talla'
      <?php if (isset($talla)) echo " value='".$talla."'";?> />
      <?php if (isset($hayerror) && array_key_exists('talla', $hayerror))
      echo $hayerror['talla']; ?></label><br>

      <label>Elija un color: <br>
      <input type="radio" name="color" value="Rojo"
      <?php if(isset($color) and ($color)=='Rojo') echo 'checked'; ?>> Rojo<br>
      <input type="radio" name="color" value="Verde"
      <?php if(isset($color) and ($color)=='Verde') echo 'checked'; ?>> Verde<br>
      <input type="radio" name="color" value="Azul"
      <?php if(isset($color) and ($color)=='Azul') echo 'checked'; ?>> Azul<br>

      <?php if (isset($hayerror) && array_key_exists('color', $hayerror))
      echo $hayerror['color']; ?>
      </label>
      </fieldset>
      <input type="submit" value="Siguiente"/>
    </form>
  </body>
</html>
<?php }
/////////////////////////////////////////////////////////////////////////////////
?>
