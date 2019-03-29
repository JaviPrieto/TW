<?php
//Hacemos las validaciones de los distintos campos
require("validaciones.php");
/////////////////////////////////////////////////////////////////////////////////
/* Si no hay errores */
if (isset($nombre) and empty($hayerror)){
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

        <p><b>Nombre : </b><?php echo $nombre ?></p>
        <p><b>Apellidos : </b><?php echo $apellidos ?></p>
        <p><b>Dirección postal : </b><?php echo $dir_postal ?></p>
        <p><b>Fecha nacimiento : </b><?php echo $fec_nacimiento ?></p>
        <p><b>Nº teléfono : </b><?php echo $telefono?></p>
        <p><b>E-mail: </b><?php echo $email?></p>

        <p><b>Código Cuenta Cliente: </b>
          <ul>
            <li>Código entidad: <?php echo $cod_entidad?></li>
            <li>Oficina: <?php echo $oficina?></li>
            <li>Digitos de control: <?php echo $dig_control?></li>
            <li>Numero de CC: <?php echo $numero_cc?></li>
          </ul>
        </p>

        <p><b>Revista seleccionada: </b><?php echo $revista?></p>
        <p><b>Tipo de suscripción: </b><?php echo $suscripcion?></p>
        <p><b>Modo de pago: </b><?php echo $m_pago?></p>

        <?php if($m_pago =='Tarjeta'){ ?>
          <ul>
            <li>Tipo de tarjeta: <?php echo $tipo_tarjeta ?></li>
            <li>Nº de tarjeta: <?php echo $num_tarjeta ?></li>
            <li>Fecha caducidad: <?php echo $año_caducidad .'-'. $mes_caducidad ?></li>
            <li>Código CVC: <?php echo $codigo_cvc ?></li>
          </ul>
        <?php
        }

        if(isset($_POST['interes'])){
          echo "<b>Sus temas de interés son:</b>" ;
          if(in_array("Divulgacion",$_POST['interes']))
            echo "<p>Divulgacion</p>";
          if(in_array("Motor",$_POST['interes']))
            echo "<p>Motor</p>";
          if(in_array("Viajes",$_POST['interes']))
            echo "<p>Viajes</p>";

        }
        ?>

        <p><b>Acepta publicidad por e-mail: </b><?php echo $publicidad?></p>

      <form action="formulario1.php" method='post'>
        <input type='submit' name='finalizar' value='Finalizar'/>
      </form>
    </body>
  </html>

<?php
}

/////////////////////////////////////////////////////////////////////////////////
/* Hay errores o no se ha enviado formulario */
else {
?>
<!DOCTYPE>
<html>
  <head>
    <title>EDITODO</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <header>
      <h1>EDITODO</h1>
    </header>

    <?php $area = $_POST["areatematica"]?>
    <p>Has escogido el área: <b><?php echo $area; ?></b></p>
    <p>Rellene el siguiente formulario para la suscripción:</p>

    <!-- FORMULARIO -->
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <!-- variable del form1 -->
      <input name="areatematica" hidden value=<?php echo $area?> >

      <fieldset>
        <legend><b>Información personal</b></legend>

        <label>Nombre(*) <input type="text" name="nombre"
        <?php if (isset($nombre)) echo " value='".$nombre."'";?> />
        <?php if (isset($hayerror) && array_key_exists('nombre', $hayerror))
        echo $hayerror['nombre']; ?></label><br>

        <label>Apellidos(*) <input type="text" name="apellidos"
        <?php if (isset($apellidos)) echo " value='".$apellidos."'";?> />
        <?php if (isset($hayerror) && array_key_exists('apellidos', $hayerror))
        echo $hayerror['apellidos']; ?></label><br>

        <label>Dirección postal(*) <input type="text" name="dir_postal"
        <?php if (isset($dir_postal)) echo " value='".$dir_postal."'";?> />
        <?php if (isset($hayerror) && array_key_exists('dir_postal', $hayerror))
        echo $hayerror['dir_postal']; ?></label><br>

        <label>Fecha de nacimiento(*) <input type="date" name="fec_nacimiento"
        <?php if (isset($fec_nacimiento)) echo " value='".$fec_nacimiento."'";?> />
        <?php if (isset($hayerror) && array_key_exists('fec_nacimiento', $hayerror))
        echo $hayerror['fec_nacimiento']; ?></label><br>

        <label>Teléfono(*) <input type="tel" name="telefono"
        <?php if (isset($telefono)) echo " value='".$telefono."'";?> />
        <?php if (isset($hayerror) && array_key_exists('telefono', $hayerror))
        echo $hayerror['telefono']; ?></label><br>

        <label>E-mail(*) <input type="email" name="email"
        <?php if (isset($email)) echo " value='".$email."'";?> />
        <?php if (isset($hayerror) && array_key_exists('email', $hayerror))
        echo $hayerror['email']; ?></label><br>

        <fieldset>
          <legend><b>Código cuenta cliente</b></legend>
          <label>Código de Entidad <input type="text" name="cod_entidad" placeholder="ej: NRBE"
          <?php if (isset($cod_entidad)) echo " value='".$cod_entidad."'";?> />
          <?php if (isset($hayerror) && array_key_exists('cod_entidad', $hayerror))
          echo $hayerror['cod_entidad']; ?></label><br>
          <label>Oficina <input type="text" name="oficina" placeholder="ej: XXXX"
          <?php if (isset($oficina)) echo " value='".$oficina."'";?> />
          <?php if (isset($hayerror) && array_key_exists('oficina', $hayerror))
          echo $hayerror['oficina']; ?></label><br>
          <label>Digitos de control <input type="text" name="dig_control" placeholder="ej: XX"
          <?php if (isset($dig_control)) echo " value='".$dig_control."'";?> />
          <?php if (isset($hayerror) && array_key_exists('dig_control', $hayerror))
          echo $hayerror['dig_control']; ?></label><br>
          <label>Número de CC <input type="text" name="numero_cc" placeholder="ej: XXXXXXXXXX"
          <?php if (isset($numero_cc)) echo " value='".$numero_cc."'";?> />
          <?php if (isset($hayerror) && array_key_exists('numero_cc', $hayerror))
          echo $hayerror['numero_cc']; ?></label><br>

        </fieldset>
      </fieldset>

      <fieldset>
        <legend><b>Información sobre la suscripción</b></legend>
        <label>Revista
        <?php
        switch($area){
          case "divulgacion" :
               echo "<select name='divulgacion'>
               <option selected>Sabelotodo</option>
               <option>Solo sé que no se nada</option>
               <option>Muy interesado</option>
               <option>Ciencia con sabor</option>
               </select>  " ; break;

          case "motor" :
          echo "<select name='motor'>
           <option selected>Supercoches</option>
           <option>Corre que te pillo</option>
           <option>El más lento de la carretera</option>
           </select>  " ; break;

          case "viajes" :
           echo "<select name='viajes'>
           <option selected>Paraisos del mundo</option>
           <option>Conoce tu ciudad</option>
           <option>La casa de tu vecino: rincones inhóspitos</option>

           </select>  " ; break;
         }?>
       </label><br>
       <label>Tipo de suscripción:<br>
         <input type="radio" name="suscripcion" value="Anual"
         <?php if(isset($suscripcion) and ($suscripcion)=='Anual') echo 'checked'; ?>>Anual
         <input type="radio" name="suscripcion" value="bianual"
         <?php if(isset($suscripcion) and ($suscripcion)=='Bianual') echo 'checked'; ?>>Bianual

         <?php if (isset($hayerror) && array_key_exists('suscripcion', $hayerror))
         echo $hayerror['suscripcion']; ?>
       </label><br>
       <label>Modo de pago:<br>
         <input type="radio" name="m_pago" value="Tarjeta"
         <?php if(isset($m_pago) and ($m_pago)=='Tarjeta') echo 'checked'; ?>>Tarjeta de crédito
         <input type="radio" name="m_pago" value="Reembolso"
         <?php if(isset($m_pago) and ($m_pago)=='Reembolso') echo 'checked'; ?>>Reembolso

         <?php if (isset($hayerror) && array_key_exists('m_pago', $hayerror))
         echo $hayerror['m_pago']; ?>
       </label><br>

       <fieldset>
        <legend><b>Datos tarjeta</b></legend>
        <label>Tipo de tarjeta
          <select name ="tipo_tarjeta">
            <option>Visa</option><option>MasterCard</option><option>American Express</option>
          </select>
        </label><br>
        <label>Numero de la tarjeta <input type="text" name="num_tarjeta" placeholder="ej: XXXX XXXX XXXX XXXX"
        <?php if (isset($num_tarjeta)) echo " value='".$num_tarjeta."'";?> />
        <?php if (isset($hayerror) && array_key_exists('num_tarjeta', $hayerror))
        echo $hayerror['num_tarjeta']; ?></label><br>

        <label>Fecha de caducidad
        <select name="año_caducidad">
          <option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option>
          <option>2021</option><option>2022</option><option>2023</option>
        </select>
        <select name="mes_caducidad">
          <option>Enero</option><option>Febrero</option><option>Marzo</option><option>Abril</option><option>Mayo</option><option>Junio</option>
          <option>Julio</option><option>Agosto</option><option>Septiembre</option><option>Octubre</option><option>Noviembre</option><option>Diciembre</option>
        </select>
      </label><br>
        <label>Código CVC <input type="text" name="codigo_cvc" placeholder="ej: XXX"
        <?php if (isset($codigo_cvc)) echo " value='".$codigo_cvc."'";?> />
        <?php if (isset($hayerror) && array_key_exists('codigo_cvc', $hayerror))
        echo $hayerror['codigo_cvc']; ?></label><br>
       </fieldset>

      </fieldset>

      <fieldset>
        <legend><b>Otra información</b></legend>
        <label>Temas de interés:<br>
          <label><input type="checkbox" name="interes[]" value="Divulgacion"/> Divulgación</label><br>
          <label><input type="checkbox" name="interes[]" value="Motor"/> Motor</label><br>
          <label><input type="checkbox" name="interes[]" value="Viajes"/> Viajes</label><br>

          <label>Desea recibir publicidad por e-mail:<br>
            <input type="radio" name="publicidad" value="si" checked/>Si
            <input type="radio" name="publicidad" value="no"/>No
          </label><br>
      </fieldset>
      <p>
        <input type="submit" value="Enviar" >
      </p>
    </form>

  </body>
</html>
<?php }
/////////////////////////////////////////////////////////////////////////////////
?>
