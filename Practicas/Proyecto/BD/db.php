<?php
require_once('dbcredenciales.php');

// *********************** Conexión a la BBDD ***********************************
// Devuelve:
//  Si conexión ok -> resource asociado a la BBDD
//  Si error de conexión -> un string con mensaje de error
function DB_conexion(){
  $db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWD,DB_DATABASE);
  if(!$db)
    return "Error de conexión a la base de datos (".mysqli_connect_errno().
            ") : ".mysqli_connect_error();

  // Establecer la codificación de los datos almacenados ("collation")
  mysqli_set_charset($db,"utf8");
  return $db;
}

// *********************** Desconexión de la BBDD ********************************
function DB_desconexion($db){
  mysqli_close($db);
}

// ****************** Consulta para obtener listado de ciudades ******************
function DB_getCiudades($db){
  $res = mysqli_query($db, "SELECT id,name,district,population FROM city
                            WHERE countrycode='ESP' ORDER BY name");
  if($res){     // Si no hay error
    if (mysqli_num_rows($res)>0){ // Si hay alguna tupla de respuesta
      $tabla = mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    else{  // No hay resultados para la consulta
      $tabla = [];
    }
    mysqli_free_result($res); // Liberar memoria de la consulta
  }else{
    $tabla = false; // Error en la consulta
  }
  return $tabla;
}

?>
