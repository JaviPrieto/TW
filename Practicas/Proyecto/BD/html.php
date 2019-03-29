<?php
require_once('htmlforms.php'); // Inclusión de formularios

// $titulo: title de la página    // $activo: enlace activo del menu
function htmlStart($titulo,$activo=''){
  __htmlInicio($titulo);
  __htmlEncabezado($activo);
  __htmlContenidosIni();
}

function htmlEnd(){
  __htmlContenidosFin();
  __htmlPiepagina();
  __htmlFin();
}

function htmlNav($clase,$menu,$activo=''){
  echo "<nav class='$clase'>";
  foreach ($menu as $elem)
    echo "<a ".($activo==$elem['texto']?"class='activo' ":'').
                                "href='{$elem['url']}'>{$elem['texto']}</a>";
  echo '</nav>';
}

// ******** Funciones privadas de este módulo

// Cabecera de página web // Contenidos INICIO
function __htmlInicio($titulo){
echo <<< HTML
  <!DOCTYPE html> <html> <head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="estilo.css" />
  <title>{$titulo}</title> </head> <body>
HTML;
}

// Contenidos INICIO
function __htmlContenidosIni(){
  echo '<div class="contenidos">';
}

function __htmlEncabezado($activo){ // Encabezado
echo <<< HTML
  <div class='encabezado'>
  <h1>GeoWeb: geografía política</h1>
  <h2>Una web con datos geográficos</h2>
  </div>
HTML;
htmlNav('menu',[['texto'=>'Listado', 'url'=>'listado.php'],
                ['texto'=>'Listado Paginado', 'url'=>'listado_paginado.php'],
                ['texto'=>'Listado Paginado (botones)', 'url'=>'listado_paginadoBotones.php'],
                ['texto'=>'Búsqueda', 'url'=>'buscarCiudad.php'],
                ['texto'=>'Nueva ciudad', 'url'=>'addCiudad.php'],
                ['texto'=>'Backup', 'url'=>'backup.php'],
                ['texto'=>'Restore', 'url'=>'restore.php']],$activo);
}

// Contenidos FIN
function __htmlContenidosFin(){
  echo '</div>';
}

// Pie de página
function __htmlPiepagina(){
echo <<< HTML
  <div class='piepagina'>
  <h1>&copy; Tecnologías Web</h2>
  </div>
HTML;
}

// Cierre de página web
function __htmlFin() {
  echo '</body></html>';
}
