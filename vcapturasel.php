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

$celda="#222222";
$celda1="#333333";
$celda2="#555555";
$celdaf="#ffffff";
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


echo "<center><h4><font color=\"#000\">Detalle de actividades registradas en sistema $desc_uops</font></h4></center>";

echo "<center>";
echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
echo "  <tr>";
echo "    <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Capitulo</span></th>";
echo "    <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Partida</span></th>";
echo "    <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Origen del Gasto</span></th>";
echo "    <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Actividad</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Cantidad</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Unidad</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Enero</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Febrero</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Marzo</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Abril</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Mayo</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Junio</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Julio</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Agosto</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Septiembre</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Octubre</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Noviembre</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Diciembre</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Total</span></th>";
echo "  </tr>";

$colorfila=0;



			$result=mysql_query("select e.id_conse_egresos,e.clave_act,e.clave_par,e.cantidad,e.unidad,e.total_gasto,ci.actividad,cp.desc_par,
			e.origen_del_gasto,e.enero,e.febrero,e.marzo,e.abril,e.mayo,e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre
			from egresos e, cat_actividades_i ci, cat_partidas_e cp where clave=$clave and ci.clave_act=e.clave_act and cp.clave_par=e.clave_par order by id_conse_egresos", $connect);

			$totalregistros=mysql_num_rows($result);
			$valcolor==0;
			while($row=mysql_fetch_array($result))
			{
			$id_conse_egresos=$row['id_conse_egresos'];
			$clave_act=$row['clave_act'];
			$clave_par=$row['clave_par'];
			$cantidad=$row['cantidad'];
			$unidad=$row['unidad'];			
			$total_gasto=$row['total_gasto'];
			$actividad=$row['actividad'];
			$desc_par=$row['desc_par'];
			$status=$row['status'];
			$origen_del_gasto=$row['origen_del_gasto'];
			$enero=$row['enero'];
			$febrero=$row['febrero'];
			$marzo=$row['marzo'];
			$abril=$row['abril'];
			$mayo=$row['mayo'];
			$junio=$row['junio'];
			$julio=$row['julio'];
			$agosto=$row['agosto'];
			$septiembre=$row['septiembre'];
			$octubre=$row['octubre'];
			$noviembre=$row['noviembre'];
			$diciembre=$row['diciembre'];

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

echo "  <tr>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$clave_par</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$desc_par</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$origen_del_gasto</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$clave_act $actividad</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$cantidad</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$unidad</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($enero,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($febrero,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($marzo,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($abril,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($mayo,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($junio,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($julio,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($agosto,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($septiembre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($octubre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($noviembre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($diciembre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($total_gasto,2) . "</span></td>";
echo "  </tr>";


$genero+=$enero;
$gfebrero+=$febrero;
$gmarzo+=$marzo;
$gabril+=$abril;
$gmayo+=$mayo;
$gjunio+=$junio;
$gjulio+=$julio;
$gagosto+=$agosto;
$gseptiembre+=$septiembre;
$goctubre+=$octubre;
$gnoviembre+=$noviembre;
$gdiciembre+=$diciembre;
$gingretot+=$total_gasto;
			}			



/*obras*/

			$resulto=mysql_query("select o.id_conse_obra,o.clave_act,o.clave_par,o.cantidad,o.unidad,o.total_gastoo,ci.actividad,cp.desc_par,
			o.origen_del_gasto,o.enero,o.febrero,o.marzo,o.abril,o.mayo,o.junio,o.julio,o.agosto,o.septiembre,o.octubre,o.noviembre,o.diciembre
			from obras o, cat_actividades_i ci, cat_partidas_e cp where clave=$clave and ci.clave_act=o.clave_act and cp.clave_par=o.clave_par order by clave_par", $connect);

			$totalregistroso=mysql_num_rows($resulto);
			$valcolor==0;
			while($row=mysql_fetch_array($resulto))
			{
			$id_conse_obra=$row['id_conse_obra'];
			$clave_act=$row['clave_act'];
			$clave_par=$row['clave_par'];
			$cantidad=$row['cantidad'];
			$unidad=$row['unidad'];			
			$total_gastoo=$row['total_gastoo'];
			$actividad=$row['actividad'];
			$desc_par=$row['desc_par'];
			$status=$row['status'];
			$origen_del_gasto=$row['origen_del_gasto'];
			$enero=$row['enero'];
			$febrero=$row['febrero'];
			$marzo=$row['marzo'];
			$abril=$row['abril'];
			$mayo=$row['mayo'];
			$junio=$row['junio'];
			$julio=$row['julio'];
			$agosto=$row['agosto'];
			$septiembre=$row['septiembre'];
			$octubre=$row['octubre'];
			$noviembre=$row['noviembre'];
			$diciembre=$row['diciembre'];

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

echo "  <tr>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$clave_par</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$desc_par</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$origen_del_gasto</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$clave_act $actividad</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$cantidad</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$unidad</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($enero,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($febrero,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($marzo,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($abril,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($mayo,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($junio,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($julio,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($agosto,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($septiembre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($octubre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($noviembre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($diciembre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($total_gastoo,2) . "</span></td>";
echo "  </tr>";


$genero+=$enero;
$gfebrero+=$febrero;
$gmarzo+=$marzo;
$gabril+=$abril;
$gmayo+=$mayo;
$gjunio+=$junio;
$gjulio+=$julio;
$gagosto+=$agosto;
$gseptiembre+=$septiembre;
$goctubre+=$octubre;
$gnoviembre+=$noviembre;
$gdiciembre+=$diciembre;
$gingretot+=$total_gastoo;
			}			

/*termina obras*/



echo "  <tr>";
echo "    <td align=\"right\" bgcolor=$celda colspan=\"6\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($genero,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gfebrero,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmarzo,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gabril,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmayo,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gjunio,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gjulio,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gagosto,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gseptiembre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($goctubre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gnoviembre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gdiciembre,2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\"> " . number_format($gingretot,2) . "</span></td>";
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
									


		
									$sqlUpdate = mysql_query("UPDATE egresos SET status=2 where clave='$clave'", $connect) or die(mysql_error());
									
									//echo "UPDATE datos_cvr SET id_status=2 where clave='$clave' and conse_cvr=$conse_cvr  $email";
									
									if($sqlUpdate)
									{							

									echo "Su Plan Rector 2017 correspondiente al area de Egresos ha sido enviado para revisi&oacute;n, espere comentarios y/o aprobaci&oacute;n del mismo!!!";
									$hoy = date("Y-m-d H:i:s");
									$sqlUpdate = mysql_query("UPDATE vobo SET jefe_e=1,fec_jefe_e='$hoy' where clave='$clave'", $connect) or die(mysql_error());


	$clacon=substr($clave,0,2);
	$result=mysql_query("select nombre, ape_pat, ape_mat from jefes where clave like '$clacon%' and activo=1", $connect);

	$totalregistros=mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran

		while($row=mysql_fetch_array($result))
		{
		$nombre=$row['nombre'];
		$ape_pat=$row['ape_pat'];
		$ape_mat=$row['ape_mat'];
		}

$jefe="$nombre $ape_pat $ape_mat";

$destinatario = "leticia.giles@fideimss.org.mx";
$asunto = "Revision de Plan Rector 2017 - Egresos";

$cuerpo = "
<html>
<head>
   <title> .:Plan Rector 2017:. </title>
</head>
<body>
<h1>.:Plan Rector 2017:.</h1>
<p>
<b>C.P. Leticia Giles Ortega</b><br><br> Le informo que el usuario ". $jefe ." Jefe de Ofcina de Deporte ha aprobado el Plan Rector 2017 correspondiente al Area de Egresos de $desc_uops por lo que a enviado solicitud de autorizacion del mismo.<br><br><b>Este es un mensaje del sistema</b>
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
$headers .= "Cc: fideimss@fideimss.org.mx, lizbeth.escartin@fideimss.org.mx\r\n";

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

		
	$result=mysql_query("select count(*) as numerosc,status from egresos where clave=$clave", $connect);
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
	echo "<tr><td align=\"center\"><a href=\"imprime_egresos.php\">Imprimir</a></td></tr>";
	}
	else if($status==1 && $numerosc!=0)
	{

									$sqlUpdate = mysql_query("UPDATE egresos SET status=0 where clave='$clave'", $connect) or die(mysql_error());
									if($sqlUpdate)
									{
									echo "El Plan Rector 2017 correspondiente al &Aacute;rea de Egresos se ha liberado!!!";
									
									$sqlUpdate = mysql_query("UPDATE vobo SET jefe_e=0 where clave='$clave'", $connect) or die(mysql_error());
								
									}
									else
									{
									echo "El Plan Rector 2017 correspondiente al &Aacute;rea de Egresos no ha sido liberado!!!";										
									}


		if($tipo_usuario=='ADM' || $tipo_usuario=='CON')
		{
		echo "<form name='form1' action='".$_SERVER['PHP_SELF']."' method='POST'>";
		echo "<tr><td align=\"center\"><a href=\"imprime_egresos.php\">Imprimir</a></td></tr>";
		echo "<input type=\"hidden\" name=\"clave\" value=\"$clave\">";
		echo "</form>";
		}
		else
		{
		echo "<tr><td align=\"center\">El Plan Rector 2017 este en proceso de revision por el jefe de oficina!!!</td></tr>";
		echo "<tr><td align=\"center\"><a href=\"imprime_egresos.php\">Imprimir</a></td></tr>";
		}
	}

	else if($status==2 && $numerosc!=0)
	{
		if($tipo_usuario=='JD2')
		{

									$sqlUpdate = mysql_query("UPDATE egresos SET status=0 where clave='$clave'", $connect) or die(mysql_error());
									if($sqlUpdate)
									{
									echo "El Plan Rector 2017 correspondiente al &Aacute;rea de Egresos se ha liberado!!!";
									$sqlUpdate = mysql_query("UPDATE vobo SET jefe_e=0 where clave='$clave'", $connect) or die(mysql_error());

									}
									else
									{
									echo "El Plan Rector 2017 correspondiente al &Aacute;rea de Egresos no ha sido liberado!!!";										
									}



		echo "<form name='form1' action='autorizae.php' method='POST'>";
		echo "<tr><td align=\"center\"><a href=\"imprime_ingresos.php\">Imprimir</a></td></tr>";
		echo "<input type=\"hidden\" name=\"clave\" value=\"$clave\">";
		echo "</form>";
		}
		else
		{
		echo "<tr><td align=\"center\">El Plan Rector 2017 ha sido autorizado por el Jefe de Oficina y ha sido enviado al personal de Fideimss para autorizacion!!!</td></tr>";
		echo "<tr><td align=\"center\"><a href=\"imprime_egresos.php\">Imprimir</a></td></tr>";
		}
	}


}

echo "</table>";

echo "</center>";
echo "</body>";
echo "</html>";
?>