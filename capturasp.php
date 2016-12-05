<?php

session_start();
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

echo "<center><h4><font color=\"#000\">Proyecto para la contrataci&oacute;n de instructores 2017<br>$desc_uops</font></h4></center>";

echo "<center>";
echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
echo "  <tr>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Personal</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Categor&iacute;a</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Actividad</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Honorarios Brutos</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">IVA</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Subtotal</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Retenido ISR</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Retenido IVA</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Total mensual</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Total Anual</th>";
echo "    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Contrato</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda2\" colspan=\"4\"><span class=\"titulo_small\">Capturas</th>";
echo "  </tr>";


echo "  <tr>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Metas</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Plan de trabajo</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Programa de trabajo</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Impresi&oacute;n</th>";
echo "  </tr>";

$colorfila=0;

			$result=mysql_query("select p.conse_categoria,p.id_emp,p.clave_act,p.clave_par, cpe.desc_par, p.status, cai.actividad, cc.desc_categoria, p.nombre, p.ape_pat, p.ape_mat,p.id_conse_personal,cc.honorarios,cc.iva,
			cc.subtotal,cc.retisr,cc.retiva,cc.neto,p.meses,p.gas_anual,p.cvr
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
			$gas_anual=$row['gas_anual'];
			$cvr=$row['cvr'];


									
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

if($cvr==1)
{
echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($gas_anual,2) . "</span></td>";
$ganual=$gas_anual;
}
else
{
echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($ganual,2) . "</span></td>";	
}


echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$meses Meses</span></td>";



if($cvr==1)
{
echo "    <td align=\"center\" bgcolor=$color valign=\"top\" colspan=\"4\"><span class=\"spgreen\"> NO APLICA PARA INSTRUTORES CVR</span></td>";
//echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"><a href=\"programa_persona.php?id_emp=$id_emp\">Ver</a></span></td>";
}
else
{

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
					echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"><a href=\"programa_persona.php?id_emp=$id_emp\">Ver</a></span></td>";
			}
			else
			{
					echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">faltan capturas</span></td>";			
			}

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

$_SESSION['revisa']=$_REQUEST['revisa'];
$revisa=$_SESSION['revisa'];

if (isset($revisa)) 
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
									


		
									$sqlUpdate = mysql_query("UPDATE personal SET status=1 where clave='$clave'", $connect) or die(mysql_error());
									
									//echo "UPDATE datos_cvr SET id_status=2 where clave='$clave' and conse_cvr=$conse_cvr  $email";
									
									if($sqlUpdate)
									{							

									echo "Su Plan Rector 2017 correspondiente al Area de Personal ha sido enviado para revisi&oacute;n al jefe de oficina, espere comentarios y/o aprobaci&oacute;n del mismo apartir de este momento usted ya no puede realizar cambios en el mismo!!!";

	$clacon=substr($clave,0,2);
	$result=mysql_query("select nombre, ape_pat, ape_mat, email from jefes where clave like '$clacon%' and activo=1", $connect);

	$totalregistros=mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran

		while($row=mysql_fetch_array($result))
		{
		$nombre=$row['nombre'];
		$ape_pat=$row['ape_pat'];
		$ape_mat=$row['ape_mat'];
		$email=$row['email'];
		}

			$clacon=substr($clave,0,2);

			$resultj=mysql_query("SELECT nombre_1,email_1,nombre_2,email_2,nombre_3,email_3 FROM jefes_mail WHERE clave like '$clacon%'", $connect);
			$totalregistros=mysql_num_rows($resultj);
			while($row=mysql_fetch_array($resultj))
			{
				$nombre_1=$row['nombre_1'];
				$email_1=$row['email_1'];
				$nombre_2=$row['nombre_2'];
				$email_2=$row['email_2'];
				$nombre_3=$row['nombre_3'];
				$email_3=$row['email_3'];
			}

		
$jefe="$nombre $ape_pat $ape_mat";
$destinatario = "$email";

$asunto = "Revision de Plan Rector 2017 - Personal";

$cuerpo = "
<html>
<head>
   <title> .:Plan Rector 2017:. </title>
</head>
<body>
<h1>.:Plan Rector 2017:.</h1>
<p>
<b>Jefe de Oficina de Deporte<br>$jefe</b><br><br> Le informo que el usuario ". $usuario_sistema ." de $desc_uops ha enviado una petici&oacute;n de revisi&oacute;n de Plan Rector 2017 correspondiete al &Aacute;rea de Personal del Fideicomiso para el Desarrollo del Deporte por parte de su Delegaci&oacute;n $desc_del,  Esperando sus comentarios y/o visto bueno del mismo. Una vez con se Vobo. deber&aacute; enviarlo a revisión por parte del personal del Fideicomiso para su validaci&oacute;n final<br><br><b>Este es un mensaje del sistema!</b>
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
$headers .= "Cc: fideimss@fideimss.org.mx, martha.benitez@fideimss.org.mx, $email_1\r\n";

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
	
		
	if($status==0 || $status==10 && $numerosc!=0)
	{
	echo "<form name='form1' action='".$_SERVER['PHP_SELF']."' method='POST'>";
	echo "<tr><td align=\"center\"><input name=\"revisa\" type=\"checkbox\" value=\"si\"> Enviar a revisi&oacute;n al Jefe de Oficina</td></tr>";
	echo "<tr><td align=\"center\"><input type=\"submit\" value=\"continuar\" /></td></tr>";
	echo "<tr><td align=\"center\"><a href=\"imprime_personal.php\">Imprimir</a></td></tr>";
	echo "</form>";
	}
	else if($status==1 && $numerosc!=0)
	{
	echo "<tr><td align=\"center\">El Plan Rector 2017 correspondiente al Area de Personal ya se ha enviado a revisi&oacute;n al Jefe de Oficina!!!</td></tr>";
	echo "<tr><td align=\"center\"><a href=\"imprime_personal.php\">Imprimir</a></td></tr>";
	}
	else if($status==2 && $numerosc!=0)
	{
	echo "<tr><td align=\"center\">El Plan Rector 2017 correspondiente al Area de Personal ya ha sido autorizado y enviado por el Jefe de Oficina a Fideimss a revisi&oacute;n!!!</td></tr>";
	echo "<tr><td align=\"center\"><a href=\"imprime_personal.php\">Imprimir</a></td></tr>";
	}
	else if($status==3 && $numerosc!=0)
	{
	echo "<tr><td align=\"center\">El Plan Rector 2017 correspondiente al Area de Personal ya ha sido autorizado!!!</td></tr>";
	echo "<tr><td align=\"center\"><a href=\"imprime_personal.php\">Imprimir</a></td></tr>";
	}
}

echo "</table>";

echo "</center>";
echo "</body>";
echo "</html>";
?>