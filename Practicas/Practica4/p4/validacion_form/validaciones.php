<?php
/////////////////////////////////////////////////////////////////////////////////
/* El formulario ha sido enviado */
if(isset($_POST['nombre'])) {

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

  /*Validar la dirección postal*/
  if(empty($_POST['dir_postal']))
    $hayerror['dir_postal'] = '<font color="red">Introduzca la dirección postal</font>';
  else
    $dir_postal = $_POST['dir_postal'];

  /*Validar la fecha de nacimiento*/
  if(empty($_POST['fec_nacimiento']))
    $hayerror['fec_nacimiento'] = '<font color="red">Introduzca una fecha de nacimiento</font>';
  else if (calcula_edad($_POST['fec_nacimiento'])<18)
    $hayerror['fec_nacimiento'] = '<font color="red">Debe de ser mayor de edad para suscribirse </font>';
  else
    $fec_nacimiento = $_POST['fec_nacimiento'];

  /*Validar el telefono*/
  if(empty($_POST['telefono']))
    $hayerror['telefono'] = '<font color="red">Introduzca su número de teléfono</font>';
  else if (!preg_match('/^[9|6|7][0-9]{8}$/',$_POST['telefono']))
    $hayerror['telefono'] = '<font color="red">El número de teléfono contiene 9 dígitos</font>';
  else
    $telefono = $_POST['telefono'];

  /*Validar el email*/
  if(empty($_POST['email']))
    $hayerror['email'] = '<font color="red">Introduzca un email</font>';
  else if (!comprobar_email($_POST['email']))
    $hayerror['email'] = '<font color="red">El email introducido no es correcto</font>';
  else
    $email = $_POST['email'];

  /*Validar el código cuenta cliente
  if(!valcuenta_bancaria($_POST['cod_entidad'],$_POST['oficina'],$_POST['dig_control'],$_POST['numero_cc'])){
    $hayerror['cod_entidad'] = '<font color="red">4 dígitos</font>';
    $hayerror['oficina'] = '<font color="red">4 dígitos</font>';
    $hayerror['dig_control'] = '<font color="red">2 dígitos</font>';
    $hayerror['numero_cc'] = '<font color="red">10 dígitos</font>';
  }
  else{
    $cod_entidad = $_POST['cod_entidad'];
    $oficina = $_POST['oficina'];
    $dig_control = $_POST['dig_control'];
    $numero_cc = $_POST['numero_cc'];
  }*/

  /*Validar el cod_entidad*/
  if(empty($_POST['cod_entidad']))
    $hayerror['cod_entidad'] = '<font color="red">Indique el codigo de entidad</font>';
  if(strlen($_POST['cod_entidad'])!=4)
    $hayerror['cod_entidad'] = '<font color="red">4 dígitos</font>';
  else
    $cod_entidad = $_POST['cod_entidad'];

  /*Validar la oficina*/
  if(empty($_POST['oficina']))
    $hayerror['oficina'] = '<font color="red">Indique la oficina</font>';
  if(strlen($_POST['oficina'])!=4)
    $hayerror['oficina'] = '<font color="red">4 dígitos</font>';
  else
    $oficina = $_POST['oficina'];

  /*Validar el dig_control*/
  if(empty($_POST['dig_control']))
    $hayerror['dig_control'] = '<font color="red">Indique los digitos de control</font>';
  if(strlen($_POST['dig_control'])!=2)
    $hayerror['dig_control'] = '<font color="red">2 dígitos</font>';
  else
    $dig_control = $_POST['dig_control'];

  /*Validar el numero_cc*/
  if(empty($_POST['numero_cc']))
    $hayerror['numero_cc'] = '<font color="red">Codigo de entidad vacío</font>';
  if(strlen($_POST['numero_cc'])!=10)
    $hayerror['numero_cc'] = '<font color="red">10 dígitos</font>';
  else
    $numero_cc = $_POST['numero_cc'];

  /*Recoger que revista ha seleccionado*/
  if(isset($_POST['divulgacion']))
    $revista = $_POST['divulgacion'];
  else if(isset($_POST['motor']))
    $revista = $_POST['motor'];
  else if(isset($_POST['viajes']))
    $revista = $_POST['viajes'];

  /* Comprobar que se ha marcado un tipo de suscripcion*/
  if (!isset($_POST['suscripcion']))
    $hayerror['suscripcion'] = '<font color="red"> Indique el tipo de suscripción</font>';
  else
    $suscripcion = $_POST['suscripcion'];

  /* Comprobar que se ha marcado un tipo de modo de pago*/
  if (!isset($_POST['m_pago']))
    $hayerror['m_pago'] = '<font color="red"> Indique el modo de pago</font>';
  else
    $m_pago = $_POST['m_pago'];

  /*Si paga con tarjeta indicar campos*/
  if(isset($_POST['m_pago']) and ($m_pago=='Tarjeta')){
    //Tipo de tarjeta
    if(isset($_POST['tipo_tarjeta'])){
      $tipo_tarjeta = $_POST['tipo_tarjeta'];
    }
    //Numero de la tarjeta
    if(empty($_POST['num_tarjeta'])){
      $hayerror['num_tarjeta'] = '<font color="red"> Indique el numero de tarjeta</font>';
    }else if(strlen($_POST['num_tarjeta'])!=16){
      $hayerror['num_tarjeta'] = '<font color="red">16 dígitos</font>';
    }
    else{
      $num_tarjeta = $_POST['num_tarjeta'];
    }
    //Fecha de caducidad
    if(isset($_POST['año_caducidad'])){
      $año_caducidad = $_POST['año_caducidad'];
    }
    if(isset($_POST['mes_caducidad'])){
      $mes_caducidad = $_POST['mes_caducidad'];
    }
    //Código CVC
    if(empty($_POST['codigo_cvc'])){
      $hayerror['codigo_cvc'] = '<font color="red"> Indique el codigo CVC</font>';
    }else if(strlen($_POST['codigo_cvc'])!=3){
      $hayerror['codigo_cvc'] = '<font color="red">3 dígitos</font>';
    }
    else{
      $codigo_cvc = $_POST['codigo_cvc'];
    }
  }
  /* Ver si quiere aceptar publicidad por email*/
  if (isset($_POST['publicidad']))
    $publicidad = $_POST['publicidad'];
  else
    $publicidad = $_POST['publicidad'];

}

//////////////////////////////////////////////////////////////////////////////////////
//Funcion para calcular la edad
function calcula_edad($fec_nacimiento){
	list($ano,$mes,$dia) = explode("-",$fec_nacimiento);
	$ano_diferencia  = date("Y") - $ano;
	$mes_diferencia = date("m") - $mes;
	$dia_diferencia   = date("d") - $dia;
	if ($dia_diferencia < 0 || $mes_diferencia < 0)
		$ano_diferencia--;
	return $ano_diferencia;
}

//////////////////////////////////////////////////////////////////////////////////////
//Funcion para validar el email
function comprobar_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}

//////////////////////////////////////////////////////////////////////////////////////
//Funcion para validar la cuenta bancaria
function valcuenta_bancaria($cuenta1,$cuenta2,$cuenta3,$cuenta4){
  if (strlen($cuenta1)!=4) return false;
  if (strlen($cuenta2)!=4) return false;
  if (strlen($cuenta3)!=2) return false;
  if (strlen($cuenta4)!=10) return false;

  if (mod11_cuenta_bancaria("00".$cuenta1.$cuenta2)!=$cuenta3{0}) return false;
  if (mod11_cuenta_bancaria($cuenta4)!=$cuenta3{1}) return false;
  return true;
}

function mod11_cuenta_bancaria($numero){
  if (strlen($numero)!=10) return "?";

  $cifras = Array(1,2,4,8,5,10,9,7,3,6);
  $chequeo=0;
  for ($i=0; $i < 10; $i++)
      $chequeo += substr($numero,$i,1) * $cifras[$i];

  $chequeo = 11 - ($chequeo % 11);
  if ($chequeo == 11) $chequeo = 0;
  if ($chequeo == 10) $chequeo = 1;
  return $chequeo;
}


?>
