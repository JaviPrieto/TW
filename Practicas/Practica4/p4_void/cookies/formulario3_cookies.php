<?php
//Comprobar que hemos pasado antes por el formulario1 y formulario2
if( !isset($_COOKIE["cook_nombre"]) and !isset($_COOKIE["cook_prenda"]) and
    !isset($_COOKIE["cook_talla"]) and !isset($_COOKIE["cook_color"])){

      header('Location: formulario1_cookies.php');
      exit;
}
/////////////////////////////////////////////////////////////////////////////////
/* El formulario ha sido enviado */
if(isset($_POST['finalizar'])) {
  //BORRAR LAS COOKIES
  setcookie("cook_nombre", $nombre, time()-1000);
  setcookie("cook_prenda", $prenda, time()-1000);
  setcookie("cook_talla", $talla, time()-1000);
  setcookie("cook_color", $color, time()-1000);


  //REDIRIGIR AL FORMULARIO 1 POR SI QUIERE VOLVER A COMPRAR
  header('Location: formulario1_cookies.php');
  exit;
}

/////////////////////////////////////////////////////////////////////////////////
/*Si no se ha enviado formulario */
else {
?>
<!DOCTYPE>
<html>
  <head>
    <title>Datos de la compra</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <header>
      <h1>Datos de la compra</h1>
    </header>

      <p><b>Nombre : </b><?php echo $_COOKIE["cook_nombre"] ?></p>
      <p><b>Prenda : </b><?php echo $_COOKIE["cook_prenda"] ?></p>
      <p><b>Talla : </b><?php echo $_COOKIE["cook_talla"] ?></p>
      <p><b>Color : </b><?php echo $_COOKIE["cook_color"] ?></p>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <input type="submit" name="finalizar" value="Finalizar compra"/>
    </form>
  </body>
</html>
<?php }
/////////////////////////////////////////////////////////////////////////////////
?>
