<?php

session_start();

$_SESSION['clave']=$_REQUEST['clave'];
$clave=$_SESSION["clave"];
$tipo_usuario=$_SESSION["tipo_usuario"];


include "clases/variablesbd.php";

	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

$celda="#222";
$celda1="#333";
$celda2="#555";
$celdaf="#fff";
$celdaf1="#F0F0F9";


//$_SESSION['usuario_sistema']="$nombre $ape_pat $ape_mat";
$usuario_sistema=$_SESSION['usuario_sistema'];
$usu=$_SESSION['usu'];

echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";

echo "<body>";

			$result=mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_uops=$row['desc_uops'];
								$desc_del=$row['desc_del'];
								$id_cuota=$row['id_cuota'];
								}


echo "<center><h4><font color=\"#000\">Detalle de personal registrado en sistema<br>$desc_uops</font></h4></center>";

echo "<center>";
echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
echo "  <tr>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Personal</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Categoria</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Actividad</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Honorarios Brutos</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Iva</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Subtotal</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Retenio ISR</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Retenido IVA</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Total x mes</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Total x anual</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Contrato</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda2\" colspan=\"4\"><span class=\"titulo_small\">Capturas</th>";
echo "  </tr>";


echo "  <tr>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Metas</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Plan de trabajo</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Programas</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Impresion</th>";
echo "  </tr>";



$colorfila=0;

			$result=mysql_query("select p.conse_categoria,p.id_emp,p.clave_act,p.clave_par, cpe.desc_par, p.status, cai.actividad, cc.desc_categoria, p.nombre, p.ape_pat, p.ape_mat,p.id_conse_personal,cc.honorarios,cc.iva,
			cc.subtotal,cc.retisr,cc.retiva,cc.neto,p.meses
			from personal p, cat_partidas_e cpe, cat_actividades_i cai, cat_categoria cc
			where clave='$clave' and cpe.clave_par=p.clave_par and cai.clave_act=p.clave_act and cc.conse_categoria=p.conse_categoria order by conse_categoria", $connect);

			$totalregistros=mysql_num_rows($result);
			$valcolor==0;
			while($row=mysql_fetch_array($result))
			{
			$conse_categoria=$row['conse_categoria'];
			$id_emp=$row['id_emp'];
			$clave_act=$row['clave_act'];
			$clave_par=$row['clave_par'];
			$conse_categoria=$row['conse_categoria'];
			$desc_par=$row['desc_par'];			
			$status=$row['status'];			
			$actividad=$row['actividad'];			
			$desc_categoria=$row['desc_categoria'];						
			$nombre=$row['nombre'];
			$ape_pat=$row['ape_pat'];
			$ape_mat=$row['ape_mat'];
			$id_conse_personal=$row['id_conse_personal'];
			$honorarios=$row['honorarios'];
			$iva=$row['iva'];			
			$subtotal=$row['subtotal'];
			$retisr=$row['retisr'];
			$retiva=$row['retiva'];
			$neto=$row['neto'];
			$meses=$row['meses'];

									
	if ($colorfila==0)
	{
	   	$color= "#efefef";
	   	$colorfila=1;
	}
	else
	{
	   	$color="#ffffff";
	   	$colorfila=0;
    }
		$ganual=$meses*$subtotal;
		
	
echo "  <tr>";
echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$nombre $ape_pat $ape_mat</span></td>";
echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$desc_categoria</span></td>";
echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$actividad</span></td>";
echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($honorarios,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($iva,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($subtotal,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($retisr,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($retiva,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($neto,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($ganual,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$meses Meses</span></td>";

			$result3=mysql_query("select status
			from metas m
			where m.clave='$clave' and m.id_emp=$id_emp", $connect);

			$totalregistros=mysql_num_rows($result3);
			$valcolor==0;
			while($row=mysql_fetch_array($result3))
			{
			$status=$row['status'];
				if($status==0){$cuant=0;}else{$cuant=1;}
					echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cuant</span></td>";					
			}

			$result1=mysql_query("select count(*) as cuantos 
			from plan p
			where p.clave='$clave' and p.id_emp=$id_emp", $connect);

			$totalregistros=mysql_num_rows($result1);
			$valcolor==0;
			while($row=mysql_fetch_array($result1))
			{
			$cuantos=$row['cuantos'];
					echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cuantos</span></td>";					
			}



			$result2=mysql_query("select count(*) as cuantos1 
			from programa p
			where p.clave='$clave' and p.id_emp=$id_emp", $connect);

			$totalregistros=mysql_num_rows($result2);
			$valcolor==0;
			while($row=mysql_fetch_array($result2))
			{
			$cuantos1=$row['cuantos1'];
					echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cuantos1</span></td>";			
			}


			if($cuant!=0 && $cuantos!=0 && $cuantos1!=0)
			{
					
					$results=mysql_query("select status 
					from personal p
					where clave='$clave' and p.id_emp=$id_emp", $connect);

					$totalregistross=mysql_num_rows($results);
					$valcolor==0;
					while($row=mysql_fetch_array($results))
					{
					$status=$row['status'];
						if($status==5)
						{						
							echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"><a href=\"programa_persona.php?id_emp=$id_emp\">con Vo.Bo.</a></span></td>";
						}
						else
						{						
							echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"><a href=\"programa_persona.php?id_emp=$id_emp\">ver</a></span></td>";
						}
					}
					
			}
			else
			{
					echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">faltan capturas</span></td>";			
			}



echo "  </tr>";

$ghonorarios+=$honorarios;
$giva+=$iva;
$gsubtotal+=$subtotal;
$gretisr+=$retisr;
$gretiva+=$retiva;
$gtotal+=$neto;
$gganual+=$ganual;
			}			



echo "  <tr>";
echo "    <td align=\"right\" bgcolor=$celda1 colspan=\"3\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($ghonorarios,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($giva,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gsubtotal,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gretisr,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gretiva,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gtotal,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gganual,2) . "</span></td>";
echo "    <td align=\"right\" bgcolor=$celda1 colspan=\"5\"><span class=\"titulo_small\">&nbsp;</span></td>";
echo "  </tr>";

echo "</table>";

echo "<br><br>";

echo "<table width=\"97%\">";

$_SESSION['vobo']=$_REQUEST['vobo'];
$vobo=$_SESSION['vobo'];

if (isset($vobo)) 
{
	//echo "DEFINIDA $clave";

/***FORMULARIO RESPUESTA***/

	$result=mysql_query("select desc_uops, desc_del from cat_delegaciones where clave=$clave", $connect);

	$totalregistros=mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran

		while($row=mysql_fetch_array($result))
		{
		$desc_uops=$row['desc_uops'];
		$desc_del=$row['desc_del'];
		}
									


		
									$sqlUpdate = mysql_query("UPDATE personal SET status=2 where clave='$clave'", $connect) or die(mysql_error());
									
									//echo "UPDATE personal SET status=2 where clave='$clave'";
									
									if($sqlUpdate)
									{							

									echo "Su Plan Rector 2017 correspondiente al Area de Personal ha sido enviado para revisi&oacute;n, analizaremos la viabilidad de su proyecto!!!";
									$hoy = date("Y-m-d H:i:s");
									$sqlUpdate = mysql_query("UPDATE vobo SET jefe_p=1,fec_jefe_p='$hoy' where clave='$clave'", $connect) or die(mysql_error());


	$clacon=substr($clave,0,2);
	$result=mysql_query("select nombre, ape_pat, ape_mat from jefes where clave like '$clacon%' and activo=0", $connect);

	$totalregistros=mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran

		while($row=mysql_fetch_array($result))
		{
		$nombre=$row['nombre'];
		$ape_pat=$row['ape_pat'];
		$ape_mat=$row['ape_mat'];
		}

$jefe="$nombre $ape_pat $ape_mat";

$destinatario = "martha.benitez@fideimss.org.mx";
$asunto = "Revision de Plan Rector 2017 - Obras";

$cuerpo = "
<html>
<head>
   <title> .:Plan Rector 2017:. </title>
</head>
<body>
<h1>.:Plan Rector 2017:.</h1>
<p>
<b> C.P. Martha Maria Benitez Arroyo </b><br><br> Le informo que el usuario ". $jefe ." Jefe de Ofcina de Deporte ha enviado el Plan Rector 2017 correspondiente al Personal de $desc_uops por lo que a enviado solicitud de autorizacion del mismo.<br><br><b>Este es un mensaje del sistema</b>
</p>
</body>
</html>
";

//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente
$headers .= "From: FIDEICOMISO PARA EL DESARROLLO DEL DEPORTE <fideimss@fideimss.org.mx>\r\n";

//dirección de respuesta, si queremos que sea distinta que la del remitente
$headers .= "Reply-To: fideimss@fideimss.org.mx\r\n";

//ruta del mensaje desde origen a destino
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n";

//direcciones que recibián copia
$headers .= "Cc: fideimss@fideimss.org.mx\r\n";

//direcciones que recibirán copia oculta
//$headers .= "Bcc: maricela.jimenez@imss.gob.mx, martha.benitez@fideimss.org.mx\r\n";

mail($destinatario,$asunto,$cuerpo,$headers);
									
									}
									else
									{
									echo "<br>Error al enviar Presupuesto 2017!!!";
									}
			
										
/***************************************************************************FIN FORMULARIO RESPUESTA********************************************************************************/	
	
}
else
{
	//echo "NO DEFINIDA";	
}

if($result!=0)
{

		
	$result=mysql_query("select count(*) as numerosc,status from personal where clave=$clave", $connect);
	$totalregistros=mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran

		while($row=mysql_fetch_array($result))
		{
		$status=$row['status'];
		$numerosc=$row['numerosc'];
		}
	
		
	if($status==0 && $numerosc!=0)
	{
	echo "<tr><td align=\"center\">El Plan Rector 2017 sigue en status de captura!!!</td></tr>";
	echo "<tr><td align=\"center\"><a href=\"imprime_personal.php\">Imprimir</a></td></tr>";
	
	}
	else if($status==1 && $numerosc!=0)
	{

									$sqlUpdate = mysql_query("UPDATE personal SET status=0 where clave='$clave'", $connect) or die(mysql_error());
									if($sqlUpdate)
									{
									echo "El Plan Rector 2017 correspondiente al &Aacute;rea de Personal se ha liberado!!!";
									$sqlUpdate = mysql_query("UPDATE vobo SET jefe_p=0 where clave='$clave'", $connect) or die(mysql_error());
									}
									else
									{
									echo "El Plan Rector 2017 correspondiente al &Aacute;rea de Personal no ha sido liberado!!!";										
									}


		if($tipo_usuario=='ADM' || $tipo_usuario=='CON')
		{
		echo "<form name='form1' action='".$_SERVER['PHP_SELF']."' method='POST'>";
		echo "<tr><td align=\"center\"><a href=\"imprime_obras.php\">Imprimir</a></td></tr>";
		echo "<input type=\"hidden\" name=\"clave\" value=\"$clave\">";
		echo "</form>";
		}
		else
		{
		echo "<tr><td align=\"center\">El Plan Rector 2017 este en proceso de revision por el jefe de oficina!!!</td></tr>";
		echo "<tr><td align=\"center\"><a href=\"imprime_personal.php\">Imprimir</a></td></tr>";
		}
	}
	else if($status==2 || $status==5 && $numerosc!=0)
	{
		if($tipo_usuario=='JD4')
		{

									$sqlUpdate = mysql_query("UPDATE personal SET status=0 where clave='$clave'", $connect) or die(mysql_error());
									if($sqlUpdate)
									{
									echo "El Plan Rector 2017 correspondiente al &Aacute;rea de Personal se ha liberado!!!";
									$sqlUpdate = mysql_query("UPDATE vobo SET jefe_p=0 where clave='$clave'", $connect) or die(mysql_error());
									}
									else
									{
									echo "El Plan Rector 2017 correspondiente al &Aacute;rea de Personal no ha sido liberado!!!";										
									}

		echo "<form name='form1' action='autorizao.php' method='POST'>";
		echo "<tr><td align=\"center\"><a href=\"imprime_obras.php\">Imprimir</a></td></tr>";
		echo "<input type=\"hidden\" name=\"clave\" value=\"$clave\">";
		echo "</form>";
		}
		else
		{
		echo "<tr><td align=\"center\">El Plan Rector 2017 ha sido autorizado por el Jefe de Oficina y ha sido enviado al personal de Fideimss para autorizacion!!!</td></tr>";
		echo "<tr><td align=\"center\"><a href=\"imprime_obras.php\">Imprimir</a></td></tr>";
		}
	}
}

echo "</table>";

echo "</center>";
echo "</body>";
echo "</html>";
?>