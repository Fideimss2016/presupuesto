<?php
	require 'PHPMailerAutoload.php';

	echo" 		<link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";

//	include "valida_seguridad.php";
	include "clases/variablesbd.php";

	echo" 		<link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";

	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);

	echo" 		<body>";

	$clave 	= $_SESSION["clave"];
	$celda 	= "#1a1a1a";
	$tabla 	= "#666";
	$celda1 = "#666";
	$result = mysql_query("SELECT u.id_usuario, u.nombre, u.ape_pat, u.ape_mat, u.clave, u.usuario, u.password, u.email, u.tipo_usuario, cd.desc_uops FROM usuarios u, cat_delegaciones cd WHERE u.clave=cd.clave ORDER BY id_usuario", $connect);
	$totalregistros = mysql_num_rows($result);
	$valcolor = 0;
	while($row = mysql_fetch_array($result))
	{
		$id_usuario 	= $row['id_usuario'];
		$nombre 		= $row['nombre'];
		$ape_pat 		= $row['ape_pat'];
		$ape_mat 		= $row['ape_mat'];
		$clave 			= $row['clave'];
		$usuario 		= $row['usuario'];			
		$password 		= $row['password'];
		$email 			= $row['email'];
		$tipo_usuario 	= $row['tipo_usuario'];
		$desc_uops 		= $row['desc_uops'];

		if($result)	
		{
			//echo  "SI";
			$jefe 			= "$nombre $ape_pat $ape_mat";
			$destinatario 	= "$email";

			$asunto = "Notificacion de Alta de Usuario en el Sistema Plan Rector 2017";

			if($tipo_usuario 	== 'ADM')	{$puesto = "ADMINISTRADOR"; $funcion = "que de seguimiento a la captura";}
			else if($tipo_usuario == 'CAP')	{$puesto = "Director(a)"; $funcion = "captura y seguimiento";}
			else if($tipo_usuario == 'CON')	{$puesto = "Jefe de Cultura Fisica y Deporte"; $funcion = "que de seguimiento a la captura";}
			else if($tipo_usuario == 'CO1')	{$puesto = "Jefe de Servicios de Prestaciones Economicas y Sociales"; $funcion = "que de seguimiento a la captura";}
			else {$puesto = "Jefe de Departamento"; $funcion = "que de seguimiento a la captura";}

			$cuerpo = "	<html>
							<head>
								<title> .:Alta de usuario:. </title>
							</head>
							<body>
								<h1>.:Plan Rector 2017:.</h1>
								<p>
									<b>$puesto<br>$jefe</b>
									<br>
									<b>$desc_uops</b>
									<br>
									<br>
									De acuerdo al oficio numero 000722 emitido por este FIDEICOMISO Le informo que se ha generado un usuario para $funcion del Presupuesto 2017, por lo que el acceso será a través de la página del FIDEICOMISO.
									<br>
									<br>
									USUARIO: $usuario
									<br>
									PASSWORD: $password
									<br>
									<br>
									<b>Este es un mensaje del sistema!</b>
								</p>
							</body>
						</html>";

	        $phpmail = new PHPMailer;
	        $phpmail->SMTPSecure = "tls";
	        $phpmail->Host = "mail.fideimss.org.mx";
	        $phpmail->Timeout = 30;
	        $phpmail->Username = "admin.fideimss@fideimss.org.mx";
	        $phpmail->Password = "S0qmgcrm26$";
	        $phpmail->SMTPKeepAlive = true;
	        $phpmail->Mailer = "smtp";
	        $phpmail->isSMTP();
	        $phpmail->SMTPAuth = true;
	        $phpmail->CharSet = 'utf-8';
	        $phpmail->setFrom('fideimss@fideimss.org.mx', 'Sistema FIDEIMSS');
	        $phpmail->addAddress($email, $nombre);
	        $phpmail->addCC('fideimss@fideimss.org.mx');
	        $phpmail->Subject = "Alta de Usuario para el Plan Rector 2017";
	        $phpmail->Body = $cuerpo;
	        $phpmail->IsHTML(true);

	        $bool = $phpmail->send();

			if($bool)
			{
				echo "		<div class='control-group success'>
								<div class='alert alert-success' role='alert'>Su mensaje ha sido enviado!</div>
							</div>";
			}
			else
			{
				echo "		<div class='control-group error'>
								<div class='alert alert-danger' role='alert'>Su mensaje no pudo ser enviado!</div>
							</div>";
			}
		}
	}
	echo" 	</body>";
	echo" </html>";
?>