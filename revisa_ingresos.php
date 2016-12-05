<?php
	require 'PHPMailerAutoload.php';

	$sqlUpdate = mysql_query("UPDATE datos_cvr SET id_status=2 where clave='$clave' and conse_cvr=$conse_cvr", $connect) or die(mysql_error());
	if($sqlUpdate)
	{
		echo "Su CVR 2017 ha sido enviado para revisi&oacute;n, espere comentarios y/o aprobaci&oacute;n del mismo apartir de este momento usted ya no puede realizar cambios en el mismo!!!";
		$destinatario = "$email";
		$asunto = "Revision de CVR 2017";

		$cuerpo = "		<html>
							<head>
   								<title>Captura CVR 2017</title>
							</head>
							<body>
								<h1>Curso Vacacional Recreativo 2017</h1>
								<p>
									<b>Le informo ". $nombre ."!, que el sistema ha enviado una petici&oacute;n de revisi&oacute;n de captura del CVR 2017 de la Delegaci&oacute;n $cve_delegacion $desc_del de $desc_uops</b> Espere autorizaci&oacute;n de su plan vacacional y/o comentarios del mismo.
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

        //$nombre_completo = $nombre." ".$ape_pat." ".$ape_mat;

        $phpmail->addAddress($correoe, $nombre);
        $phpmail->addCC('fideimss@fideimss.org.mx');
        $phpmail->addCC('lizbeth.escartin@fideimss.org.mx');
        $phpmail->addBCC('maricela.jimenez@imss.gob.mx');
        $phpmail->addBCC('martha.benitez@fideimss.org.mx');
        $phpmail->Subject = "Revisión de CVR 2017";
        $phpmail->Body = $cuerpo;
        $phpmail->IsHTML(true);

        $bool = $phpmail->send();
		if(!$bool)
		{
			echo "<br>Error al enviar CVR 2017!!!";
		}
	}
?>