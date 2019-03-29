<?php
// Mostrar tabla con listado de ciudades
// $datos: array asociativo
// cada elemento es un registro (name,district,population)
function VIEW_listadoCiudades($datos){
echo <<< HTML
  <div class='listado'> <table> <tr>
  <th>Ciudad</th> <th>Comunidad</th> <th>Población</th> </tr>
HTML;
foreach ($datos as $v) {
  echo '<tr>';
  echo "<td class='ciu_nombre'>{$v['name']}</td>";
  echo "<td class='ciu_comunidad'>{$v['district']}</td>";
  echo "<td class='ciu_poblacion'>{$v['population']}</td>";
  echo '</tr>';
}
echo <<< HTML
</table>
</div>
HTML;
}

?>
