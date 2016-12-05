<?php

session_start();

$_SESSION['clave']=$_REQUEST['clave'];
$clave=$_SESSION["clave"];
$tipo_usuario=$_SESSION["tipo_usuario"];


include "clases/variablesbd.php";


$aux="<?\n";
$aux=$aux."header(\"Content-type: application/vnd.ms-excel\");\n";
$aux=$aux."header(\"Content-Disposition: attachment; filename=excel.xls\");\n";
$aux=$aux."?>\n";
$file = fopen('excel1.php',"w+");
if ( $file )
{

}
else
{
  die( "fopen failed for $filename" ) ;
}
if (fwrite($file,"$aux \n") === FALSE)
{
  $aux=$aux."No se puede escribir al archivo ($file)";
  exit;
}


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

$aux=$aux."<body>";

			$result=mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_uops=$row['desc_uops'];
								$desc_del=$row['desc_del'];
								$id_cuota=$row['id_cuota'];
								}


$aux="<center><h4><font color=\"#000\">Detalle de personal registrado en sistema<br>$desc_uops</font></h4></center>";

$aux=$aux."<center>";
$aux=$aux."<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
$aux=$aux."  <tr>";
$aux=$aux."    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Personal</th>";
$aux=$aux."    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Categoria</th>";
$aux=$aux."    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Actividad</th>";
$aux=$aux."    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Honorarios Brutos</th>";
$aux=$aux."    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Iva</th>";
$aux=$aux."    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Subtotal</th>";
$aux=$aux."    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Retenio ISR</th>";
$aux=$aux."    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Retenido IVA</th>";
$aux=$aux."    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Total x mes</th>";
$aux=$aux."    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Total x anual</th>";
$aux=$aux."    <th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Contrato</th>";
$aux=$aux."    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda2\" colspan=\"4\"><span class=\"titulo_small\">Capturas</th>";
$aux=$aux."  </tr>";


$aux=$aux."  <tr>";
$aux=$aux."    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Metas</th>";
$aux=$aux."    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Plan de trabajo</th>";
$aux=$aux."    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Programas</th>";
$aux=$aux."    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"titulo_small\">Impresion</th>";
$aux=$aux."  </tr>";



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
		
	
$aux=$aux."  <tr>";
$aux=$aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$nombre $ape_pat $ape_mat</span></td>";
$aux=$aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$desc_categoria</span></td>";
$aux=$aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$actividad</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($honorarios,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($iva,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($subtotal,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($retisr,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($retiva,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($neto,2) . "</span></td>";
if($cvr==1)
{
$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($gas_anual,2) . "</span></td>";
$ganual=$gas_anual;
}
else
{
$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($ganual,2) . "</span></td>";	
}
$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$meses Meses</span></td>";

if($cvr==1)
{
$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\" colspan=\"4\"><span class=\"spgreen\"> NO APLICA PARA INSTRUTORES CVR</span></td>";
//$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"><a href=\"programa_persona.php?id_emp=$id_emp\">Ver</a></span></td>";
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
					$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cuant</span></td>";					
			}

			$result1=mysql_query("select count(*) as cuantos 
			from plan p
			where p.clave='$clave' and p.id_emp=$id_emp", $connect);

			$totalregistros=mysql_num_rows($result1);
			$valcolor==0;
			while($row=mysql_fetch_array($result1))
			{
			$cuantos=$row['cuantos'];
					$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cuantos</span></td>";					
			}



			$result2=mysql_query("select count(*) as cuantos1 
			from programa p
			where p.clave='$clave' and p.id_emp=$id_emp", $connect);

			$totalregistros=mysql_num_rows($result2);
			$valcolor==0;
			while($row=mysql_fetch_array($result2))
			{
			$cuantos1=$row['cuantos1'];
					$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cuantos1</span></td>";			
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
							$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">con Vo.Bo.</span></td>";
						}
						else
						{						
							$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
						}
					}
					
			}
			else
			{
					$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">faltan capturas</span></td>";			
			}

}

$aux=$aux."  </tr>";

$ghonorarios+=$honorarios;
$giva+=$iva;
$gsubtotal+=$subtotal;
$gretisr+=$retisr;
$gretiva+=$retiva;
$gtotal+=$neto;
$gganual+=$ganual;
			}			



$aux=$aux."  <tr>";
$aux=$aux."    <td align=\"right\" bgcolor=$celda1 colspan=\"3\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($ghonorarios,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($giva,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gsubtotal,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gretisr,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gretiva,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gtotal,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gganual,2) . "</span></td>";
$aux=$aux."    <td align=\"right\" bgcolor=$celda1 colspan=\"5\"><span class=\"titulo_small\">&nbsp;</span></td>";
$aux=$aux."  </tr>";


print("<tr><td bgcolor=\"#efefef\" ><span class=\"textoformulario\"><b>Proceso Completo&nbsp;<a href=\"excel1.php\" class=\"small_link\">Abrir archivo</a></td></tr>");

$aux=$aux."</table>";
fwrite($file,"$aux \n");
fclose($file);

?>