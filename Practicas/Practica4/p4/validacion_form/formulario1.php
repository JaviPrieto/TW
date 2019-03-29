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
    <p> En nuestra editorial (EDITODO) poseemos del siguiente catálogo de revistas:</p>
    <p><img src="catalogo-revistas" width="500"/></p>

    <!-- FORMULARIO -->
		<form action="formulario2.php" method="post">
			<fieldset>
				<legend><b>Realice su suscripción</b></legend>
        <input type="radio" name="areatematica" value="divulgacion"checked/>Divulgación<br>
        <input type="radio" name="areatematica" value="motor"/>Motor<br>
        <input type="radio" name="areatematica" value="viajes" />Viajes<br>
			</fieldset>
			<p>
				<input type="submit" value="Enviar" >
			</p>
		</form>
  </body>
</html>
