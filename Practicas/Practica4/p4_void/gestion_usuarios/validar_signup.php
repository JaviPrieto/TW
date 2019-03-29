<?php

if(isset($_POST['nombre'])){
  /* Validar el nombre*/
  if(empty($_POST['nombre']))
    $hayerror['nombre'] = '<font color="red">Introduzca el nombre</font>';
  else if (!preg_match('/^[a-zA-Z, ]*$/',$_POST['nombre']))
    $hayerror['nombre'] = '<font color="red">Nombre inválido</font>';
  else
    $nombre = $_POST['nombre'];

  /*Validar los apellidos*/
  if(empty($_POST['apellidos']))
    $hayerror['apellidos'] = '<font color="red">Introduzca los apellidos</font>';
  else if (!preg_match('/^[a-zA-Z, ]*$/',$_POST['apellidos']))
    $hayerror['apellidos'] = '<font color="red">Apellidos no válidos </font>';
  else
    $apellidos = $_POST['apellidos'];

  /*Validar el email*/
  if(empty($_POST['email']))
    $hayerror['email'] = '<font color="red">Introduzca un email</font>';
  else if (!comprobar_email($_POST['email']))
    $hayerror['email'] = '<font color="red">El email introducido no es correcto</font>';
  else
    $email = $_POST['email'];

  /*Validar la clave*/
  if(empty($_POST['clave']))
    $hayerror['clave'] = '<font color="red">Introduzca una contraseña</font>';
  else if(strlen($_POST['clave']) < 6)
    $hayerror['clave'] = '<font color="red">La contraseña es muy corta.(6 dígitos)</font>';
  else
    $clave = $_POST['clave'];

  /* Comprobar que se ha marcado un tipo de suscripcion*/
  if(!isset($_POST['tipo']))
    $hayerror['tipo'] = '<font color="red"> Indique el tipo de usuario</font>';
  else
    $tipo = $_POST['tipo'];
}

//////////////////////////////////////////////////////////////////////////////////////
//Funcion para validar el email
function comprobar_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}
?>
