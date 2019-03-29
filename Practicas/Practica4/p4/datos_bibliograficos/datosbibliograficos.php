<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Obtener datos bibliográficos</title>
	</head>

	<body>
		<h1>Obtener datos bibliográficos</h1>

		<!-- FORMULARIO -->
		<form action="datosbibliograficos.php" method="get">
			<fieldset>
				<legend><b>Realice su búsqueda</b></legend>
				<input type="text" name="busqueda"/><br></label>
			</fieldset>
			<p>
				<input type="submit" value="Enviar" >
			</p>
		</form>

    <?php
			//Una vez le hemos dado a enviar
			if(!empty($_GET) == true){
				$cad = $_GET["busqueda"];

				if($cad == ""){
					echo "No se han enviado datos al formulario";
				}
				else{
					//Obtener el recurso curl
					$curl = curl_init();
					//Url a la que mandamos la peticion
					$url = "http://bencore.ugr.es/iii/encore/search?formids=target&lang=spi&suite=def&reservedids=lang%2Csuite&submitmode=&submitname=&target=".$cad."&submit.x=0&submit.y=0";

					//Establecer las opciones de la peticion
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
					curl_setopt($curl, CURLOPT_USERAGENT, "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12");

					//Enviar la solicitud y guardar la respuesta en $resp
					$respuesta_html = curl_exec($curl);

					//Cerrar la solicitud
					curl_close($curl);

					//Hacerle las expresiones regulares a $resp -> a y span (titulos y autores)
					//TITULO -> a#recordDisplayLink2Component_x
					//AUTORES -> span.additionalFields.customSecondaryText

					// Patrones:
					//$patron = "/c[aeiou]/";       // Buscar los a y los span


					//($patron, $respuesta_html, $resultado);


					//Pintamos la respuesta
					print_r($respuesta_html);
				}
		}
    ?>
	</body>
</html>
