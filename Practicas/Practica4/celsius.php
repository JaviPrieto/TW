<?php
if(isset($_GET['celsius'])) { /* El formulario ha sido enviado */
  /* Comprobar valor de Celsius */
  if(empty($_GET['celsius']))
    $hayerror['celsius'] = '<p style="color:red;">No ha indicado ningún valor</p>';
  else if (!is_numeric($_GET['celsius']))
    $hayerror['celsius'] = '<p style="color:red;">El valor debe ser un número</p>';
  else if ($_GET['celsius']<-100)
    $hayerror['celsius'] = '<p style="color:red;">El número ha de ser mayor que -100</p>';
  else
    $celsius = $_GET['celsius'];

  /* Comprobar si hay alguna escala */
  if (!isset($_GET['destino']))
    $hayerror['destino'] = '<p style="color:red;">Ha de seleccionar al menos una escala</p>';
  else {
    if (in_array('Fahrenheit',$_GET['destino']))
    $destino['fah'] = 1;
    if (in_array('Kelvin',$_GET['destino']))
    $destino['kel'] = 1;
    if (in_array('Rankine',$_GET['destino']))
    $destino['ran'] = 1;
  }
}

if (isset($celsius) && isset($destino)) {
  /* Si no hay errores */
  echo "<p>Grados Celsius: $celsius</p>";
  if (array_key_exists('fah',$destino))
    echo '<p>Grados Fahrenheit: '.($celsius*9/5+32).'</p>';
  if (array_key_exists('kel',$destino))
    echo '<p>Grados Kelvin: '.($celsius+273.15).'</p>';
  if (array_key_exists('ran',$destino))
    echo '<p>Grados Rankine: '.($celsius*9/5+491.67).'</p>';
  echo "<p><a href='".$_SERVER["SCRIPT_NAME"]."'>Calcule otra conversión</a></p>";
}

else { /* Hay errores o no se ha enviado formulario */
?>
<form action="<?php echo $_SERVER['SCRIPT_NAME']?>" method='get'>
  <label>Temperatura en Celsius:
  <input type='text' name='celsius'
  <?php if (isset($celsius)) echo " value='".$celsius."'";?> />
  <?php if (isset($hayerror) && array_key_exists('celsius', $hayerror))
  echo $hayerror['celsius']; ?></label><br>
  <label>A qué unidad desea convertir: <br>
  <input type='checkbox' name='destino[]' value='Fahrenheit'
  <?php if (isset($destino) && array_key_exists('fah',$destino))
  echo ' checked';?> > Fahrenheit<br>
  <input type='checkbox' name='destino[]' value='Kelvin'
  <?php if (isset($destino) && array_key_exists('kel',$destino))
  echo ' checked';?> > Kelvin<br>
  <input type='checkbox' name='destino[]' value='Rankine'
  <?php if (isset($destino) && array_key_exists('ran',$destino))
  echo ' checked';?> > Rankine<br>
  <?php if (isset($hayerror) && array_key_exists('destino', $hayerror))

  echo $hayerror['destino']; ?>
  </label>
  <input type='submit' value='Convertir'/>
</form>
<?php } ?>
