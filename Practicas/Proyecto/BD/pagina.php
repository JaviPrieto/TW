<?php
  require('html.php');
  require('db.php');
  // Maquetado de página
  // Operaciones con BBDD
  // ************* Inicio de la página
  htmlStart('Listado completo','Listado');
  if (!is_string($db=DB_conexion())) { // Si la conexión es correcta
    $ciudades=DB_getCiudades($db); // Obtener listado de ciudades
    VIEW_listadoCiudades($ciudades); // Mostrar listado
    DB_desconexion($db); // Desconectar de la BBDD

  }else{// Si hay error en conexión
    msgError($db); // Mostrar mensaje de error
  }

  // ************* Fin de la página
  htmlEnd();
?>
