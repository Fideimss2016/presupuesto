<?php
//include "valida_seguridad.php";
include 'clases/variablesbd.php';
$host="localhost";
$user="root";
$passworks="";
$dbname="fideimss_presupuesto";

echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";


	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

echo" <body>";
echo "<div id=\"contenedor\">";
echo "	<div id=\"contenido_cont\">";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema $tipo_usuario</span></div>";

				$result=mysql_query("select jefe_o from vobo where clave='$clave'", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$jefe_o=$row['jefe_o'];
								}


								if($jefe_o==1)
								{

											$result=mysql_query("select count(*) as exreg from obras where clave='$clave'", $connect);
											$totalregistros=mysql_num_rows($result);
												while($row=mysql_fetch_array($result))
												{
												$exreg=$row['exreg'];
												}
												
													if($exreg==0)
													{
														echo "<center><h1>M&oacute;dulo cerrado!...</h1></center>";
													}
													else
													{
														echo "<center><h1>Este m&oacute;dulo se ha cerrado por que ya cuenta con Vobo!...</h1></center>";
														//include "detalleo.php";
														include "detalleox.php";

													}
								}

								else
								{

echo "    <h3>Captura de Obra y Equipamiento Deportivo del Presupuesto 2017</h3>";
echo "    <h2>Registro de Obra</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 1</b> Capture los datos que a continuaci&oacute;n se le solicitan";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
			
			$result=mysql_query("select desc_uops, desc_del from cat_delegaciones where clave='$clave'", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_uops=$row['desc_uops'];
								$desc_del=$row['desc_del'];
								}

								//echo "select desc_uops, desc_del from cat_delegaciones where clave='$clave'";

$tip=-1;
if (!empty($_POST['conse_partidas'])){ 
$tip =$_POST['conse_partidas']; 
}

if(!empty($_POST['elimina'])){
	$_SESSION['elimina']=$_REQUEST['elimina'];
	$elimina=$_SESSION['elimina'];
}

if (isset($elimina)) {
$_SESSION['id_conse_obra']=$_REQUEST['id_conse_obra'];
$id_conse_obra=$_SESSION['id_conse_obra'];

$sqlEliminar = mysql_query("DELETE FROM obras WHERE id_conse_obra=$id_conse_obra and clave='$clave'", $connect) or die(mysql_error());
//$sqlEliminar = mysql_query("update obras set activo = 0 WHERE id_conse_obra=$id_conse_obra and clave='$clave'", $connect) or die(mysql_error());

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

echo "		<table width=\"90%\" border=\"0\">";
echo "<form name='form1' action='".$_SERVER['PHP_SELF']."' method='POST'>";
echo "		<tr>";
echo "		<td>";
echo "		<label for=\"actividades\" class=\"spgrey\">Partida: </label>";
echo "		</td>";
echo "		<td>";
echo"
			<select name=\"conse_partidas\" onChange='this.form.submit()'>
			<option value=\"0\">seleccione partida</option>
			";
	
			$result=mysql_query("select conse_partidas, clave_par, desc_par from cat_partidas_e where obra=1 order by clave_par", $connect);

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
echo "		</tr>";

echo "		</form>";

if($tip!=-1)
{
echo "		<form action=\"obra_1x.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
echo "		<input type=\"hidden\" value=\"$tip\" name=\"conse_partida\">";
echo "		<tr><td>";
if($tip==10)
{
	echo "		<label for=\"tipo_curso\" class=\"spgrey\">Tipo de bien:</label>";
}
else
{
	echo "      <label for=\"tipo_curso\" class=\"spgrey\">Tipo de gasto:</label>";
}

echo "		</td>";
echo "		<td>";
echo "		<select name=\"id_proyecto\">";


			if($tip==5)
			{
				//Partida 0311
				$result=mysql_query("select id_proyecto, desc_proyecto from cat_proyectos_o where partida = '0311' and activo = 1 order by id_proyecto", $connect);
			}
			else if($tip==10)
			{
				//Partida 0501
				$result=mysql_query("select id_proyecto, desc_proyecto from cat_proyectos_o where partida = '0501' and activo = 1 order by id_proyecto", $connect);
			}
			else if($tip==11)
			{
				//Partida 0601
				$result=mysql_query("select id_proyecto, desc_proyecto from cat_proyectos_o where partida = '0601' and activo = 1 order by id_proyecto", $connect);
			}
			else if($tip==12)
			{
				//Partida 0602
				$result=mysql_query("select id_proyecto, desc_proyecto from cat_proyectos_o where partida = '0602' and activo = 1 order by id_proyecto", $connect);
			}
			elseif ($tip==13) 
			{
				//Partida 0603
				$result=mysql_query("select id_proyecto, desc_proyecto from cat_proyectos_o where partida = '0603' and activo = 1 order by id_proyecto", $connect);
			}

		
								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$id_proyecto=$row['id_proyecto'];
								$desc_proyecto=$row['desc_proyecto'];
								
								print("<option value=\"$id_proyecto\">$desc_proyecto</option>");
								}

			echo"</select>";

echo "		</td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td>";
echo "			<label for=\"cantidad\" class=\"spgrey\">Cantidad:</label>";
echo " 		</td>";
echo "		<td>";
echo "			<span class=\"spgreen\"><input type=\"text\" id=\"cantidad\" name\"cantidad\" required></span>";   // 
echo "		</td>";
echo "		</tr>";
echo "		<tr>";

echo "		<td>";

if($tip==5)
{
	echo "<label for=\"tipo_curso\" class=\"spgrey\">Tipo de equipo:</label>";
}
elseif($tip==10)
{
	echo "<label for=\"tipo_curso\" class=\"spgrey\">Actividad beneficiada:</label>";
}
elseif($tip==11)
{
	echo "<label for=\"tipo_curso\" class=\"spgrey\">Área deportiva:</label>";
}
elseif($tip==12)
{
	echo "<label for=\"tipo_curso\" class=\"spgrey\">Área deportiva:</label>";
}
elseif($tip==13)
{
	echo "<label for=\"tipo_curso\" class=\"spgrey\">Área deportiva:</label>";
}

//echo "		<label for=\"tipo_curso\" class=\"spgrey\">Asignar actividad: </label>";
echo "		</td>";
echo "		<td>";

if($tip==5)
{
echo "		<select name=\"conse_act\">";
			//$result=mysql_query("select conse_act, clave_act, actividad from cat_actividades_i where anio = 2016 and activo = 1 order by actividad", $connect);
			$result=mysql_query("select a.actividad, a.actividad_id from cat_act_equipo_area a where activo = 1 and tipo_proyecto_id = 2 and a.anio = 2015 and a.activo = 1 order by a.actividad");
								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$conse_act=$row['actividad_id'];
								$actividad=$row['actividad'];
								
								print("<option value=\"$conse_act\">$actividad</option>");
								}

			echo"</select>";
}
if ($tip==10)
{
	echo "      <select name=\"conse_act\">";
				$result=mysql_query("select conse_act, clave_act, actividad from cat_actividades_i where activo = 1 order by actividad");
				$totalregistros=mysql_num_rows($result);
				while($row=mysql_fetch_array($result))
				{
					$conse_act=$row['conse_act'];
					$clave_act=$row['clave_act'];
					$actividad=$row['actividad'];
					print("<option value=\"$conse_act\">$clave_act $actividad</option>");
				}
	echo "		</select>";
}
if ($tip==11)
{
	echo "		<select name=\"conse_act\">";
				$result=mysql_query("select a.actividad, a.actividad_id from cat_act_equipo_area a where activo = 1 and tipo_proyecto_id = 3 and a.anio = 2015 and a.activo = 1 order by a.actividad");
				$totalregistros=mysql_num_rows($result);
				while ($row=mysql_fetch_array($result)) 
				{
					$conse_act=$row['actividad_id'];
					$actividad=$row['actividad'];
					print("<option value=\"$conse_act\">$actividad</option>");
				}
	echo "		</select>";
}
if ($tip==12)
{
	echo "		<select name=\"conse_act\">";
				$result=mysql_query("select a.actividad, a.actividad_id from cat_act_equipo_area a where activo = 1 and tipo_proyecto_id = 4 and a.anio = 2015 and a.activo = 1 order by a.actividad");
				$totalregistros=mysql_num_rows($result);
				while ($row=mysql_fetch_array($result)) 
				{
					$conse_act=$row['actividad_id'];
					$actividad=$row['actividad'];
					print("<option value=\"$conse_act\">$actividad</option>");
				}
	echo "		</select>";
}
if ($tip==13)
{
	echo "		<select name=\"conse_act\">";
				$result=mysql_query("select a.actividad, a.actividad_id from cat_act_equipo_area a where activo = 1 and tipo_proyecto_id = 5 and a.anio = 2015 and a.activo = 1 order by a.actividad");
				$totalregistros=mysql_num_rows($result);
				while ($row=mysql_fetch_array($result)) 
				{
					$conse_act=$row['actividad_id'];
					$actividad=$row['actividad'];
					print("<option value=\"$conse_act\">$actividad</option>");
				}
	echo "		</select>";
}

echo "</td></tr>";
echo "<tr>";
echo "	<td>";
echo "		<label for=\"monto\" class=\"spgrey\">Monto de inversión:</label>";
echo "	</td>";
echo "	<td>";
echo "  	<span class=\"spgreen\"><input type=\"text\" id=\"monto\" name\"monto\" required></span>";
echo "	</td>";
echo "</tr>";
echo "<tr>";
echo "	<td>";
echo "		<label for=\"beneficios\" class=\"spgrey\">Beneficios esperados:</label>";
echo "	</td>";
echo "	<td>";
if($tip==5)
{
echo "		<select name=\"beneficios\">";
			//$result=mysql_query("select conse_act, clave_act, actividad from cat_actividades_i where anio = 2016 and activo = 1 order by actividad", $connect);
				$result=mysql_query("select beneficio_id, beneficio from cat_beneficios where tipo_proyecto_id = 2 and anio = 2015 and activo = 1 order by beneficio");
				$totalregistros=mysql_num_rows($result);
				//se recogen las consultas en un array y se muestran

				while($row=mysql_fetch_array($result))
				{
					$beneficio_id=$row['beneficio_id'];
					$beneficio=$row['beneficio'];
					print("<option value=\"$beneficio_id\">$beneficio</option>");
				}
echo"			</select>";
}
if ($tip==10)
{
	echo "      <select name=\"beneficios\">";
				$result=mysql_query("select beneficio_id, beneficio from cat_beneficios where tipo_proyecto_id = 1 and anio = 2015 and activo = 1 order by beneficio");
				$totalregistros=mysql_num_rows($result);
				while($row=mysql_fetch_array($result))
				{
					$beneficio_id=$row['beneficio_id'];
					$beneficio=$row['beneficio'];
					print("<option value=\"$beneficio_id\">$beneficio</option>");
				}
	echo "		</select>";
}
if ($tip==11)
{
	echo "		<select name=\"beneficios\">";
				$result=mysql_query("select beneficio_id, beneficio from cat_beneficios where tipo_proyecto_id = 3 and anio = 2015 and activo = 1 order by beneficio");
				$totalregistros=mysql_num_rows($result);
				while ($row=mysql_fetch_array($result)) 
				{
					$beneficio_id=$row['beneficio_id'];
					$beneficio=$row['beneficio'];
					print("<option value=\"$beneficio_id\">$beneficio</option>");
				}
	echo "		</select>";
}
if ($tip==12)
{
	echo "		<select name=\"beneficios\">";
				$result=mysql_query("select beneficio_id, beneficio from cat_beneficios where tipo_proyecto_id = 4 and anio = 2015 and activo = 1 order by beneficio");
				$totalregistros=mysql_num_rows($result);
				while ($row=mysql_fetch_array($result)) 
				{
					$beneficio_id=$row['beneficio_id'];
					$beneficio=$row['beneficio'];
					print("<option value=\"$beneficio_id\">$beneficio</option>");
				}
	echo "		</select>";
}
if ($tip==13)
{
	echo "		<select name=\"beneficios\">";
				$result=mysql_query("select beneficio_id, beneficio from cat_beneficios where tipo_proyecto_id = 5 and anio = 2015 and activo = 1 order by beneficio");
				$totalregistros=mysql_num_rows($result);
				while ($row=mysql_fetch_array($result)) 
				{
					$beneficio_id=$row['beneficio_id'];
					$beneficio=$row['beneficio'];
					print("<option value=\"$beneficio_id\">$beneficio</option>");
				}
	echo "		</select>";
}
echo "	</td>";
echo "</tr>";

//Información de cursos
echo "<tr>";
echo "	<td>";
echo "		<label for=\"cursos\" class=\"spgrey\">Cursos:</label>";
echo "	</td>";
echo "	<td>";
echo "  	<span class=\"spgreen\"><input type=\"text\" id=\"cursos\" name\"cursos\" required></span>";
echo "	</td>";
echo "	<td>";
echo "		<label for=\"num_grupos\" class=\"spgrey\">No. de grupos programados:</label>";
echo "	</td>";
echo "	<td>";
echo "  	<span class=\"spgreen\"><input type=\"text\" id=\"num_grupos\" name\"num_grupos\" required></span>";
echo "	</td>";
echo "</tr>";
echo "<tr>";
echo "	<td>";
echo "		<label for=\"num_usuarios\" class=\"spgrey\">No. de usuarios por grupo:</label>";
echo "	</td>";
echo "	<td>";
echo "  	<span class=\"spgreen\"><input type=\"text\" id=\"num_usuarios\" name\"num_usuarios\" required></span>";
echo "	</td>";
echo "	<td>";
echo "		<label for=\"total_usuarios\" class=\"spgrey\">Total de usuarios:</label>";
echo "	</td>";
echo "	<td>";
echo "  	<span class=\"spgreen\"><input type=\"text\" id=\"total_usuarios\" name\"total_usuarios\" required></span>";
echo "	</td>";
echo "</tr>";
echo "<hr>";
//Incremento de ingresos
echo "<tr>";
echo "	<td>";
echo "		<label for=\"inscripcion\" class=\"spgrey\">Ingresos por inscripción:</label>";
echo "	</td>";
echo "	<td>";
echo "  	<span class=\"spgreen\"><input type=\"text\" id=\"inscripcion\" name\"inscripcion\" required></span>";
echo "	</td>";
echo "	<td>";
echo "		<label for=\"recuperacion\" class=\"spgrey\">Cuotas de recuperación:</label>";
echo "	</td>";
echo "	<td>";
echo "  	<span class=\"spgreen\"><input type=\"text\" id=\"recuperacion\" name\"recueracion\" required></span>";
echo "	</td>";
echo "</tr>";
echo "<tr>";
echo "	<td>";
echo "		<label for=\"uso_espacio\" class=\"spgrey\">Ingresos por uso de espacio:</label>";
echo "	</td>";
echo "	<td>";
echo "  	<span class=\"spgreen\"><input type=\"text\" id=\"uso_espacio\" name\"uso_espacio\" required></span>";
echo "	</td>";
echo "	<td>";
echo "		<label for=\"total_ingresos\" class=\"spgrey\">Total:</label>";
echo "	</td>";
echo "	<td>";
echo "  	<span class=\"spgreen\"><input type=\"text\" id=\"total_ingresos\" name\"total_ingresos\" required></span>";
echo "	</td>";
echo "</tr>";


	$result=mysql_query("select status from obras where clave=$clave", $connect);
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
		
	if(!empty($status))
	{
		if($status==0)
			{
				echo "		<tr><td colspan=\"4\" align=\"center\">";
				echo "<input type=\"submit\" value=\"Continuar\" />";
				echo "		</td></tr>";
			}
			else
			{
				echo "<tr><td  colspan=\"4\" align=\"center\"><span class=\"spred\">El Plan Rector 2017 correspondiente al Area de Obra y Equipamiento ya se ha enviado a revisi&oacute;n ya no es posible realizar capturas!!!</span></td></tr>";
			}
	}
}

echo "</table>";
echo "</form>";

echo "   	</div>";//cajaareas 

echo "<br>";
//include "detalleo.php";
include "detalleox.php";

								}//if de jefe_o=1


echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>