<?php
include "valida_seguridad.php";
include "clases/variablesbd.php";

echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";


	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

echo" <body>";
echo "<div id=\"contenedor\">";
echo "	<div id=\"contenido_cont\">";

$usuario_sistema=$_SESSION["usuario_sistema"];
$clave=$_SESSION["clave"];
$tipo_usuario=$_SESSION["tipo_usuario"];

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema $tipo_usuario</span></div>";

				$result=mysql_query("select jefe_e from vobo where clave='$clave'", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$jefe_e=$row['jefe_e'];
								}


								if($jefe_e==1)
								{

											$result=mysql_query("select count(*) as exreg from egresos where clave='$clave'", $connect);
											$totalregistros=mysql_num_rows($result);
												while($row=mysql_fetch_array($result))
												{
												$exreg=$row['exreg'];
												}
												
													if($exreg==0)
													{
														echo "<center><h1>M&oacute;dulo cerrado!...</h1></center>";
														include "detallee.php";

													}
													else
													{
														echo "<center><h1>Este m&oacute;dulo se ha cerrado por que ya cuenta con Vobo!...</h1></center>";
														include "detallee.php";

													}
								}

								else
								{




echo "    <h3>Captura de Egresos del Presupuesto 2016</h3>";
echo "    <h2>Registro de Gastos</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 1</b> Capture los datos que a continuaci&oacute;n se le solicitan";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
			
			$result=mysql_query("select desc_uops, desc_del,acceso from cat_delegaciones where clave='$clave'", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_uops=$row['desc_uops'];
								$desc_del=$row['desc_del'];
								$acceso=$row['acceso'];
								}


$tip=-1;
if (!empty($_POST['conse_partidas'])){ 
$tip =$_POST['conse_partidas']; 
}


$_SESSION['elimina']=$_REQUEST['elimina'];
$elimina=$_SESSION['elimina'];


if (isset($elimina)) {
$_SESSION['id_conse_egresos']=$_REQUEST['id_conse_egresos'];
$id_conse_egresos=$_SESSION['id_conse_egresos'];

$sqlEliminar = mysql_query("DELETE FROM egresos WHERE id_conse_egresos=$id_conse_egresos and clave='$clave'", $connect) or die(mysql_error());

	if($sqlEliminar)
	{
	echo "<span class=\"spred\">Registro eliminado</span><br>";
	}
	else
	{
	echo "<span class=\"spred\">Error al eliminar el registro!!!</span><br>";
	}	
}
echo "		<label for=\"uopsi\">Unidad Operativa: <b>$desc_uops</b></label><br><br>";

//echo "select conse_partidas, clave_par, desc_par from cat_partidas_e where egresos=1 and acceso in ($acceso) order by clave_par";
echo "		<table width=\"90%\" border=\"0\">";
echo "<form name='form1' action='".$_SERVER['PHP_SELF']."' method='POST'>";
echo "		<tr>";
echo "		<td>";
echo "		<label for=\"actividades\" class=\"spgrey\">Partida: </label>";
echo "		</td>";
echo "		<td>";
echo"
			<select name=\"conse_partidas\" onChange='this.form.submit()'>
			<option value=\"0\">seleccione actividad</option>
			";
	
			$result=mysql_query("select conse_partidas, clave_par, desc_par from cat_partidas_e where egresos=1 and acceso in ($acceso) order by clave_par", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$conse_partidas=$row['conse_partidas'];
								$clave_par=$row['clave_par'];
								$desc_par=$row['desc_par'];
									if($conse_partidas==$tip)
									{
									 print("<option value=\"$conse_partidas\" selected>$clave_par $desc_par</option>");
									}
									else
									{
									 print("<option value=\"$conse_partidas\">$clave_par $desc_par</option>");
									}
								}

mysql_free_result($result) ;
			echo"</select>";
echo "		</td>";
echo "		</form>";

if($tip!=-1)
{
echo "		<form action=\"egresos_1.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
echo "		<input type=\"hidden\" value=\"$tip\" name=\"conse_partida\">";
echo "		<td>";
echo "		<label for=\"tipo_curso\" class=\"spgrey\">Asignar actividad: </label>";
echo "		</td>";
echo "		<td>";
echo "		<select name=\"conse_act\">";
			$result=mysql_query("select conse_act, clave_act, actividad from cat_actividades_i order by conse_act", $connect);
			
								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$conse_act=$row['conse_act'];
								$clave_act=$row['clave_act'];
								$actividad=$row['actividad'];
								
								print("<option value=\"$conse_act\">$clave_act $actividad</option>");
								}

			echo"</select>";

echo "		</td>";
echo "		</tr>";

echo "		<tr><td colspan=\"4\">&nbsp;</td></tr>";



	$result=mysql_query("select status from egresos where clave=$clave", $connect);
	if(!$result)
	{}
	else
	{
		$totalregistros=mysql_num_rows($result);
		while($row=mysql_fetch_array($result))
			{
			$status=$row['status'];
			}
	}
		
	if($status==0)
	{
	echo "		<tr><td colspan=\"4\" align=\"center\">";
	echo "<input type=\"submit\" value=\"Continuar\" />";
	echo "		</td></tr>";
	}
	else
	{
	echo "<tr><td  colspan=\"4\" align=\"center\"><span class=\"spred\">El Plan Rector 2016 correspondiente al area de Egresos ya se ha enviado a revisi&oacute;n ya no es posible realizar capturas!!!</span></td></tr>";
	}

}
echo "</table>";
echo "</form>";

echo "   	</div>";//cajaareas 

echo "<br>";
include "detallee.php";

								}//if de jefe_e=1



echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>