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


echo "<center><h4><font color=\"#000\">Presupuesto De Egresos Ejercicio 2017 $desc_uops</font></h4></center>";

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


/*personal*/

			$resultp=mysql_query("select p.id_conse_personal,p.clave_act,p.clave_par,p.cantidad,ci.actividad,cp.desc_par,
			p.conse_categoria,p.ene,p.feb,p.mar,p.abr,p.may,p.jun,p.jul,p.ago,p.sep,p.oct,p.nov,p.dic,cc.desc_categoria,cc.subtotal,p.status,p.meses,p.gas_anual
			from personal p, cat_actividades_i ci, cat_partidas_e cp, cat_categoria cc where clave=$clave and ci.clave_act=p.clave_act and cp.clave_par=p.clave_par and cc.conse_categoria=p.conse_categoria order by clave_par, id_conse_personal", $connect);

			$totalregistros=mysql_num_rows($resultp);
			$valcolor==0;
			while($row=mysql_fetch_array($resultp))
			{
			$id_conse_personal=$row['id_conse_personal'];
			$clave_act=$row['clave_act'];
			$clave_par=$row['clave_par'];
			$cantidad=$row['cantidad'];
			$actividad=$row['actividad'];
			$desc_par=$row['desc_par'];
			$ene=$row['ene'];
			$feb=$row['feb'];
			$mar=$row['mar'];
			$abr=$row['abr'];
			$may=$row['may'];
			$jun=$row['jun'];
			$jul=$row['jul'];
			$ago=$row['ago'];
			$sep=$row['sep'];
			$oct=$row['oct'];
			$nov=$row['nov'];
			$dic=$row['dic'];
			$desc_categoria=$row['desc_categoria'];
			$subtotal=$row['subtotal'];
			$status=$row['status'];			
			$meses=$row['meses'];			
			$gas_anual=$row['gas_anual'];			


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


if($ene==1){$enero=$subtotal;}else{$enero=0;}
if($feb==1){$febrero=$subtotal;}else{$febrero=0;}
if($mar==1){$marzo=$subtotal;}else{$marzo=0;}
if($abr==1){$abril=$subtotal;}else{$abril=0;}
if($may==1){$mayo=$subtotal;}else{$mayo=0;}
if($jun==1){$junio=$subtotal;}else{$junio=0;}
if($jul==1){$julio=$subtotal;}else{$julio=0;}
if($ago==1){$agosto=$subtotal;}else{$agosto=0;}
if($sep==1){$septiembre=$subtotal;}else{$septiembre=0;}
if($oct==1){$octubre=$subtotal;}else{$octubre=0;}
if($nov==1){$noviembre=$subtotal;}else{$noviembre=0;}
if($dic==1){$diciembre=$subtotal;}else{$diciembre=0;}

$total_gastop=$enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$noviembre+$diciembre;

echo "  <tr>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$clave_par</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$desc_par</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$desc_categoria</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$clave_act $actividad</span></td>";
echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$meses</span></td>";
echo "    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">meses</span></td>";
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

				if($status==10)
				{
				echo "    <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($gas_anual,2) . "</span></td>";
				$total_gastop=$gas_anual;
				}
				else
				{
				echo "    <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gastop,2) . "</span></td>";
				}

//echo "    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($total_gastop,2) . "</span></td>";
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
$gingretot+=$total_gastop;

			}				


/*termina personal*/

/*egresos*/
			$result=mysql_query("select e.id_conse_egresos,e.clave_act,e.clave_par,e.cantidad,e.unidad,e.total_gasto,ci.actividad,cp.desc_par,
			e.origen_del_gasto,e.enero,e.febrero,e.marzo,e.abril,e.mayo,e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre
			from egresos e, cat_actividades_i ci, cat_partidas_e cp where clave=$clave and ci.clave_act=e.clave_act and cp.clave_par=e.clave_par order by clave_par", $connect);

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

/*terrmina egresos*/
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
									


		
									$sqlUpdate = mysql_query("UPDATE egresos SET status=1 where clave='$clave'", $connect) or die(mysql_error());
									
									//echo "UPDATE datos_cvr SET id_status=2 where clave='$clave' and conse_cvr=$conse_cvr  $email";
									
									if($sqlUpdate)
									{							

									echo "Su Plan Rector 2017 correspondiente al area de Egresos ha sido enviado para revisi&oacute;n al jefe de oficina, espere comentarios y/o aprobaci&oacute;n del mismo apartir de este momento usted ya no puede realizar cambios en el mismo!!!";

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

//$destinatario = "leticia.giles@fideimss.org.mx";
$asunto = "Revision de Plan Rector 2017 - Egresos";

$cuerpo = "
<html>
<head>
   <title> .:Plan Rector 2017:. </title>
</head>
<body>
<h1>.:Plan Rector 2017:.</h1>
<p>
<b>Jefe de Oficina de Deporte<br>$jefe</b><br><br> Le informo que el usuario ". $usuario_sistema ." de $desc_uops ha enviado una petici&oacute;n de revisi&oacute;n de Plan Rector 2017 correspondiete al &Aacute;rea de Egresos del Fideicomiso para el Desarrollo del Deporte por parte de su Delegaci&oacute;n $desc_del,  Esperando sus comentarios y/o visto bueno del mismo. Una vez con se Vobo. deber&aacute; enviarlo a revisión por parte del personal del Fideicomiso para su validaci&oacute;n final<br><br><b>Este es un mensaje del sistema!</b>
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
$headers .= "Cc: fideimss@fideimss.org.mx, leticia.giles@fideimss.org.mx, $email_1, lizbeth.escartin@fideimss.org.mx\r\n";

//direcciones que recibirán copia oculta
//$headers .= "Bcc: maricela.jimenez@imss.gob.mx, martha.benitez@fideimss.org.mx\r\n";

mail($destinatario,$asunto,$cuerpo,$headers);
									
									}
									else
									{
									echo "<br>Error al enviar CVR 2017!!!";
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
	
		
	if($status==0 || $status==10 && $numerosc!=0)
	{
	echo "<form name='form1' action='".$_SERVER['PHP_SELF']."' method='POST'>";
	echo "<tr><td align=\"center\"><input name=\"revisa\" type=\"checkbox\" value=\"si\"> Enviar a revisi&oacute;n al Jefe de Oficina</td></tr>";
	echo "<tr><td align=\"center\"><input type=\"submit\" value=\"continuar\" /></td></tr>";
	echo "<tr><td align=\"center\"><a href=\"imprime_egresosX.php\">Imprimir</a></td></tr>";
	echo "</form>";
	}
	else if($status==1 && $numerosc!=0)
	{
	echo "<tr><td align=\"center\">El Plan Rector 2017 correspondiente al area de Egresos ya se ha enviado a revisi&oacute;n al Jefe de Oficina!!!</td></tr>";
	echo "<tr><td align=\"center\"><a href=\"imprime_egresosX.php\">Imprimir</a></td></tr>";
	}
	else if($status==2 && $numerosc!=0)
	{
	echo "<tr><td align=\"center\">El Plan Rector 2017 correspondiente al area de Egresos ya ha sido autorizado y enviado por el Jefe de Oficina a Fideimss a revisi&oacute;n!!!</td></tr>";
	echo "<tr><td align=\"center\"><a href=\"imprime_egresosX.php\">Imprimir</a></td></tr>";
	}
	else if($status==3 && $numerosc!=0)
	{
	echo "<tr><td align=\"center\">El Plan Rector 2017 correspondiente al area de Egresos ya ha sido autorizado!!!</td></tr>";
	echo "<tr><td align=\"center\"><a href=\"imprime_egresosX.php\">Imprimir</a></td></tr>";
	}
	else
	{
	echo "<tr><td align=\"center\"><a href=\"imprime_egresosX.php\">Imprimir</a></td></tr>";
	}

}

echo "</table>";

echo "</center>";
echo "</body>";
echo "</html>";
?>