<?php 
	echo" <html>";
	echo" <head>";
	echo" <title>Presupuesto 2017</title>";
	echo" </head>";

	function ObtenerNavegadorWeb() {
		$agente = $_SERVER['HTTP_USER_AGENT'];
		$navegador = 'Unknown';
		if (preg_match('/MSIE/i', $agente) && !preg_match('/Opera/i', $agente)) {
			$navegador = 'Internet Explorer';
		}
		elseif (preg_match('/Firefox/i', $agente)) {
			$navegador = 'Mozilla Firefox';
		}
		elseif (preg_match('/Chrome/i', $agente)) {
			$navegador = 'Google Chrome';
		}
		elseif (preg_match('/Safari/i', $agente)) {
			$navegador = 'Apple Safari';
		}
		elseif (preg_match('/Opera/i', $agente)) {
			$navegador = 'Opera';
		}
		elseif (preg_match('/Netscape/i', $agente)) {
			$navegador = 'Netscape';
		}

		return array (
			'agente' => $agente,
			'nombre_navegador' => $navegador
		);
	}

	$ew = ObtenerNavegadorWeb();
	$navegador = $ew['nombre_navegador'];

	if ($navegador != 'Google Chrome')
	{
		echo"	<body>
					<div class='container'>
						<div class='alert alert-danger'>
							PARA INGRESAR AL SISTEMA DEBE UTILIZAR EL NAVEGADOR DE INTERNET GOOGLE CHROME
						</div>
					</div>
				</body>";
	}
	else
	{
?>
		include "top.html";

		echo" <center>";
		echo" <body>";
		echo" <h1> .:Presupuesto 2017:. </h1>";
		//echo" <h3><font color=\"#cc0000\"> Sistema cerrado para usuarios de captura </font></h3>";

		if ($_GET["errorusuario"]=="si")
		{
			echo" <font color=\"red\"><b>Datos incorrectos</b></font>";
		}
		else
		{
			echo" Introduce tu nombre de usuario y contrase&ntilde;a";
		}
		echo" <form action=\"autentication.php\" method=\"POST\">";

		echo" <table border=\"0\">";
		echo" <tr><td>Nombre de usuario:</td><td><input name=\"usu\" size=\"25\" value=\"\"/></td></tr>";
		echo" <tr><td>Contrase&ntilde;a:</td><td><input name=\"contrasena\" size=\"25\" type=\"password\"/></td></tr>";
		echo" <tr><td/><td><input type=\"submit\" value=\"Iniciar de sesi&oacute;n\"/></td></tr>";
		echo" </table>";
		echo" </form>";
		echo" </body>";
		echo" </center>";
		echo" </html>";
<?php
	}
?>
