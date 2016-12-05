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
  echo "No se puede escribir al archivo ($file)";
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

$aux="<center><h4><font color=\"#000\">Detalle de actividades registradas en sistema</font></h4></center>";

$aux=$aux."<center>";
$aux=$aux."<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
$aux=$aux."  <tr>";
$aux=$aux."    <th rowspan=\"2\" bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Delegacion</span></th>";
$aux=$aux."    <th rowspan=\"2\" bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">UOPSI</span></th>";
$aux=$aux."    <th rowspan=\"2\" bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Clave</span></th>";
$aux=$aux."    <th rowspan=\"2\" bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Actividad</span></th>";
$aux=$aux."    <th rowspan=\"2\" bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Tipo de pago</span></th>";
$aux=$aux."    <th colspan=\"2\" bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Cuota</span></th>";
$aux=$aux."    <th colspan=\"2\" scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Usuarios</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Enero</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Febrero</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Marzo</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Abril</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Mayo</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Junio</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Julio</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Agosto</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Septiembre</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Octubre</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Noviembre</span></th>";
$aux=$aux."    <th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Diciembre</span></th>";
$aux=$aux."    <th colspan=\"2\" scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Ingreso total</span></th>";
$aux=$aux."  </tr>";

$aux=$aux."  <tr>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">Ingreso</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">POB</span></td>";
$aux=$aux."  </tr>";

$colorfila=0;


			$result=mysql_query("select i.id_conse_ing, i.clave_act,i.clave, i.id_tipo_pago, i.id_tipo_curso, i.fecha_ini, i.fecha_fin, i.cta_der, i.cta_noder,
			(i.enero+i.febrero+i.marzo+i.abril+i.mayo+i.junio+i.julio+i.agosto+i.septiembre+i.octubre+i.noviembre+i.diciembre) as ingretot,
			(i.dh1+i.dh2+i.dh3+i.dh4+i.dh5+i.dh6+i.dh7+i.dh8+i.dh9+i.dh10+i.dh11+i.dh12) as totdh,
			(i.ndh1+i.ndh2+i.ndh3+i.ndh4+i.ndh5+i.ndh6+i.ndh7+i.ndh8+i.ndh9+i.ndh10+i.ndh11+i.ndh12) as totndh,
			i.enero, i.febrero, i.marzo, i.abril, i.mayo, i.junio, i.julio, i.agosto, i.septiembre, i.octubre, i.noviembre, i.diciembre,
			i.dh1, i.dh2, i.dh3, i.dh4, i.dh5, i.dh6, i.dh7, i.dh8, i.dh9, i.dh10, i.dh11, i.dh12,
			i.ndh1, i.ndh2, i.ndh3, i.ndh4, i.ndh5, i.ndh6, i.ndh7, i.ndh8, i.ndh9, i.ndh10, i.ndh11, i.ndh12,
			ci.clave_act as clact, ci.actividad, cti.desc_tipo_pago, ctc.desc_tipo_curso,cd.desc_uops, cd.desc_del
			from ingresos i, cat_actividades_i ci, cat_tipo_pago_i cti, cat_tipo_curso_i ctc, cat_delegaciones cd
			where i.clave='$clave' and ci.conse_act=i.conse_act and cti.id_tipo_pago=i.id_tipo_pago and
			ctc.id_tipo_curso=i.id_tipo_curso and cd.clave=i.clave order by i.clave, i.id_conse_ing", $connect);

			$totalregistros=mysql_num_rows($result);
			while($row=mysql_fetch_array($result))
			{
			$id_conse_ing=$row['id_conse_ing'];
			$clave_act=$row['clave_act'];
			$id_tipo_pago=$row['id_tipo_pago'];
			$id_tipo_curso=$row['id_tipo_curso'];
			$fecha_ini=$row['fecha_ini'];
			$fecha_fin=$row['fecha_fin'];
			$cta_der=$row['cta_der'];
			$cta_noder=$row['cta_noder'];
			$ingretot=$row['ingretot'];
			$totdh=$row['totdh'];
			$totndh=$row['totndh'];
			$clact=$row['clact'];
			$actividad=$row['actividad'];
			$desc_tipo_pago=$row['desc_tipo_pago'];
			$desc_tipo_curso=$row['desc_tipo_curso'];
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
			$ndh1=$row['ndh1'];
			$ndh2=$row['ndh2'];
			$ndh3=$row['ndh3'];
			$ndh4=$row['ndh4'];
			$ndh5=$row['ndh5'];
			$ndh6=$row['ndh6'];
			$ndh7=$row['ndh7'];
			$ndh8=$row['ndh8'];
			$ndh9=$row['ndh9'];
			$ndh10=$row['ndh10'];
			$ndh11=$row['ndh11'];
			$ndh12=$row['ndh12'];
			$dh1=$row['dh1'];
			$dh2=$row['dh2'];
			$dh3=$row['dh3'];
			$dh4=$row['dh4'];
			$dh5=$row['dh5'];
			$dh6=$row['dh6'];
			$dh7=$row['dh7'];
			$dh8=$row['dh8'];
			$dh9=$row['dh9'];
			$dh10=$row['dh10'];
			$dh11=$row['dh11'];
			$dh12=$row['dh12'];
			$desc_uops=$row['desc_uops'];
			$desc_del=$row['desc_del'];



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

$poblacion=$totdh+$totndh;
$aux=$aux."  <tr>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$desc_del</span></td>";
$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$desc_uops</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$clact</span></td>";
$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$actividad</span></td>";
$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$desc_tipo_pago</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($cta_der,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($cta_noder,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$totdh</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$totndh</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($enero,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh1</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh1</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($febrero,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh2</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh2</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($marzo,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh3</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh3</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($abril,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh4</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh4</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($mayo,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh5</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh5</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($junio,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh6</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh6</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($julio,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh7</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh7</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($agosto,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh8</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh8</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($septiembre,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh9</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh9</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($octubre,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh10</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh10</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($noviembre,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh11</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh11</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($diciembre,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh12</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh12</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($ingretot,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$poblacion</span></td>";
$aux=$aux."  </tr>";

$gtotdh+=$totdh;
$gtotndh+=$totndh;
$gdh1+=$dh1;
$gndh1+=$ndh1;
$gdh2+=$dh2;
$gndh2+=$ndh2;
$gdh3+=$dh3;
$gndh3+=$ndh3;
$gdh4+=$dh4;
$gndh4+=$ndh4;
$gdh5+=$dh5;
$gndh5+=$ndh5;
$gdh6+=$dh6;
$gndh6+=$ndh6;
$gdh7+=$dh7;
$gndh7+=$ndh7;
$gdh8+=$dh8;
$gndh8+=$ndh8;
$gdh9+=$dh9;
$gndh9+=$ndh9;
$gdh10+=$dh10;
$gndh10+=$ndh10;
$gdh11+=$dh11;
$gndh11+=$ndh11;
$gdh12+=$dh12;
$gndh12+=$ndh12;
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
$gingretot+=$ingretot;
$gpoblacion+=$poblacion;
			}


/****/
$aux=$aux."  <tr>";
$aux=$aux."    <td align=\"right\" bgcolor=$celda colspan=\"7\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">$gtotdh</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">$gtotndh</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($genero,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh1</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh1</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gfebrero,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh2</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh2</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmarzo,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh3</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh3</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gabril,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh4</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh4</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmayo,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh5</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh5</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gjunio,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh6</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh6</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gjulio,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh7</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh7</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gagosto,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh8</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh8</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gseptiembre,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh9</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh9</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($goctubre,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh10</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh10</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gnoviembre,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh11</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh11</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gdiciembre,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh12</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh12</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\"> " . number_format($gingretot,2) . "</span></td>";
$aux=$aux."    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">$gpoblacion</span></td>";
$aux=$aux."  </tr>";

/****/

print("<tr><td bgcolor=\"#efefef\" ><span class=\"textoformulario\"><b>Proceso Completo&nbsp;<a href=\"excel1.php\" class=\"small_link\">Abrir archivo</a></td></tr>");

$aux=$aux."</table>";
fwrite($file,"$aux \n");
fclose($file);

?>