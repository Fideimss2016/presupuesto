<?php
@session_start();


$Fecha=$_REQUEST['Fecha'];
$Fecha1=$_REQUEST['Fecha1'];
$clave_delegacion=$_REQUEST['clave_delegacion'];
$clave_act=$_REQUEST['clave_act'];


/*
$clave_act=$_REQUEST['clave_act'];
$id_tipo_pago=$_REQUEST['id_tipo_pago'];
$id_condicion=$_REQUEST['id_condicion'];
*/
include "../clases/variablesbd.php";

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



$conexion=pg_connect("host=$host port=$puerto user=$user password=$clave dbname=$dbname ") OR die ("No se puede conectar $!");



$aux="<table  border=\"1\" cellpadding=\"4\"  width=\"100%\">";

$aux=$aux."<tr><td><center><b>ID</td>";
$aux=$aux."<td><center><b>FECHA</td>";
$aux=$aux."<td><center><b>GUIA</td>";
$aux=$aux."<td><center><b>REFERENCIA</td>";
$aux=$aux."<td><center><b>IMPORTE</td>";
$aux=$aux."<td><center><b>BENEFICIARIO</td>";
$aux=$aux."<td><center><b>DELEGACION</td>";
$aux=$aux."<td><center><b>UNIDAD OPERATIVA</td>";
$aux=$aux."<td><center><b>ACTIVIDAD</td>";
$aux=$aux."</tr>";


/*
$query=" SELECT en.fecha, en.guia, en.referencia, en.importe, en.beneficiario, cd.descripcion_uops, cd.descripcion_del, ca. descripcion as actividad
		 FROM edo_cuenta_nuevo en, cat_delegs cd, cat_acts ca
		 WHERE cd.clave=en.clave
		 AND en.clave_acts=ca.clave
		 AND ca.anio=en.anio
	 	";
*/

$query=" SELECT en.fecha, en.guia, en.referencia, en.importe, en.beneficiario, cd.descripcion_uops, cd.descripcion_del, ca. descripcion as actividad, en.anio
		 FROM edo_cuenta_nuevo en, cat_delegs cd, cat_acts ca
		 WHERE cd.clave=en.clave
		 AND en.clave_acts=ca.clave
		 AND ca.anio=en.anio
	 	";
	
	$query=$query." and en.fecha between '$Fecha' and '$Fecha1'";

print("<input type=\"hidden\" name=\"Fecha\" value=\"$Fecha\">");

if($clave_delegacion!='-1')
{
	$query=$query." and cd.clave_delegacion='$clave_delegacion' ";

}

if($clave_act!='-1')
{
	$query=$query." and en.clave_acts='$clave_act' ";

}

$query=$query." order by descripcion_del, descripcion_uops,fecha, importe";
/**/
	
/*
if($id_tipo_pago!='-1')
{
	$query=$query." and cat_tipo_pago.id_tipo_pago='$id_tipo_pago' ";
}

if($id_condicion!='-1')
{
	$query=$query." and cat_condicion_usuario.id_condicion='$id_condicion' ";
}
*/


$total=0;

$res=pg_exec($conexion,$query);
$numero=pg_numrows($res);
for($i=0;$i<$numero;$i++)
{
	$fecha=pg_result($res,$i,'fecha');
	$guia=pg_result($res,$i,'guia');
	$referencia=pg_result($res,$i,'referencia');
	$importe=pg_result($res,$i,'importe');
	$beneficiario=pg_result($res,$i,'beneficiario');
	$descripcion_del=pg_result($res,$i,'descripcion_del');
	$descripcion_uops=pg_result($res,$i,'descripcion_uops');
	$actividad=pg_result($res,$i,'actividad');
	
	$consecu=$i+1;
	$treferencia="'".$referencia;

	$aux=$aux."<tr>
			   <td><center>$consecu</td>
			   <td><center>$fecha</td>
			   <td><center>$guia</td>
			   <td><center>$treferencia</td>
			   <td><center>".number_format($importe,2,'.',',')."</td>
			   <td><center>$beneficiario</td>
			   <td><center>$descripcion_del</td>
			   <td><center>$descripcion_uops</td>
			   <td><center>$actividad</td>
			   </tr>";
}

print("<tr><td bgcolor=\"#efefef\" ><span class=\"textoformulario\"><b>Proceso Completo&nbsp;<a href=\"excel1.php\" class=\"small_link\">Abrir archivo</a></td></tr>");

$aux=$aux."</table>";
fwrite($file,"$aux \n");
fclose($file);

?>
