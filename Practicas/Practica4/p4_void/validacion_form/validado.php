<?php
/////////////////////////////////////////////////////////////////////////////////
/* El formulario ha sido enviado */
if(isset($_POST['finalizar'])) {
  //BORRAR LAS COOKIES
  /*setcookie("cook_nombre", $nombre, time()-10000);
  setcookie("cook_apellidos", $apellidos, time()-10000);
  setcookie("cook_direccion", $dir_postal, time()-10000);
  setcookie("cook_fecha", $fec_nacimiento, time()-10000);*/



  //REDIRIGIR AL FORMULARIO 1 PARA HACER OTRA SUBSCRIPCION
  header('Location: formulario1.php');
  exit;
}

/////////////////////////////////////////////////////////////////////////////////
/*Si no se ha enviado formulario */
else {
?>
<!DOCTYPE>
<html>
  <head>
    <title>Datos de la suscripción</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <header>
      <h1>Datos de la suscripción</h1>
    </header>

      <p><b>Nombre : </b><?php echo $nombre?></p>


    <form action="<?php echo $_SERVER['PHP_SELF']?>" method='post'>
      <input type='submit' name='finalizar' value='Finalizar'/>
    </form>
  </body>
</html>
<?php }
/////////////////////////////////////////////////////////////////////////////////
?>
