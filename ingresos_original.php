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

				$results=mysql_query("select count(*) as cuantos from vobo where clave='$clave'", $connect);
				$totalregistros=mysql_num_rows($results);
				//echo "select count(*) as cuantos from vobo where clave='$clave'";
				while($row=mysql_fetch_array($results))
				{
				$cuantos=$row['cuantos'];

					if(!$cuantos)
					{
						$resultado = mysql_query("INSERT INTO vobo(clave) VALUES ('$clave')", $connect);
					}		
					else
					{
					}
				}



echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema $tipo_usuario</span></div>";

				$result=mysql_query("select jefe_i from vobo where clave='$clave'", $connect);
								//echo "select jefe_i from vobo where clave='$clave'";
								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$jefe_i=$row['jefe_i'];
								}


								if($jefe_i==4)
								{

											$result=mysql_query("select count(*) as exreg from ingresos where clave='$clave'", $connect);
											//echo "select count(*) as exreg from personal where clave='$clave'";

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
														include "detalle.php";

													}
								}

								else
								{


echo "    <h3>Captura de Ingresos del Presupuesto 2015</h3>";
echo "    <h2>Registro de Actividades</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 1</b> Capture los datos que a continuaci&oacute;n se le solicitan, el sistema realizara el c&aacute;lculo de cuotas conforme a los criterios de programaci&oacute;n y los datos recibidos";
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


$tip=-1;
if (!empty($_POST['conse_act'])){ 
$tips=$_POST['conse_act']; 
$separa_conse=explode(".", $tips);
$tip=$separa_conse[0];
$cvrs=$separa_conse[1];

}


$_SESSION['elimina']=$_REQUEST['elimina'];
$elimina=$_SESSION['elimina'];


if (isset($elimina)) {
$_SESSION['id_conse_ing']=$_REQUEST['id_conse_ing'];
$id_conse_ing=$_SESSION['id_conse_ing'];

$sqlEliminar = mysql_query("DELETE FROM ingresos WHERE id_conse_ing=$id_conse_ing and clave='$clave'", $connect) or die(mysql_error());

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
echo "		<label for=\"actividades\" class=\"spgrey\">Actividad:</label>";
echo "		</td>";
echo "		<td>";
echo"
			<select name=\"conse_act\" onChange='this.form.submit()'>
			<option value=\"0\">seleccione actividad</option>
			";
	
			$result=mysql_query("select conse_act,clave_act,actividad,id_tipo_act,cvr from cat_actividades_i order by clave_act", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$conse_act=$row['conse_act'];
								$clave_act=$row['clave_act'];
								$actividad=$row['actividad'];
								$id_tipo_act=$row['id_tipo_act'];
								$cvr=$row['cvr'];

									if($conse_act==$tip)
									{	
									 print("<option value=\"$conse_act.$cvr\" selected>$clave_act $actividad</option>");
									}
									else
									{
									 print("<option value=\"$conse_act.$cvr\">$clave_act $actividad</option>");
									}
								}

mysql_free_result($result) ;
			echo"</select>";
echo "		</td>";
echo "		</form>";

if($tip!=-1)
{
	
	if($tip==17){$liga="ingresos_cvr.php";}
	else{$liga="ingresos_1.php";}
	
echo "		<form action=$liga method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
echo "		<input type=\"hidden\" value=\"$tip\" name=\"conse_acts\">";
echo "		<td>";
echo "		<label for=\"tipo_curso\" class=\"spgrey\">Curso:</label>";
echo "		</td>";
echo "		<td>";
echo"		<select name=\"id_tipo_curso\">";
			
			/*
			if($tip==17)
			{
			$result=mysql_query("select id_tipo_curso, desc_tipo_curso from cat_tipo_curso_i where cvr=1 order by id_tipo_curso", $connect);
			}
			else if($tip==57 || $tip==54 || $tip==55 || $tip==56  || $tip==99 )
			{
			$result=mysql_query("select id_tipo_curso, desc_tipo_curso from cat_tipo_curso_i where cvr=2 order by id_tipo_curso", $connect);
			}
			else if($tip==49 || $tip==50 || $tip==51 || $tip==52 || $tip==53 || $tip==58 || $tip==59)
			{
			$result=mysql_query("select id_tipo_curso, desc_tipo_curso from cat_tipo_curso_i where cvr=2 order by id_tipo_curso", $connect);
			}
			else if($tip==6 || $tip==7 || $tip==8 || $tip==9 || $tip==10 || $tip==11 || $tip==12 || $tip==13 || $tip==14 || $tip==15 || $tip==16 || $tip==22 || $tip==23 || $tip==48)
			{
			$result=mysql_query("select id_tipo_curso, desc_tipo_curso from cat_tipo_curso_i where cvr=4 order by id_tipo_curso", $connect);
			}
			else
			{
			$result=mysql_query("select id_tipo_curso, desc_tipo_curso from cat_tipo_curso_i where cvr=3 order by id_tipo_curso", $connect);
			}
			*/
			
			$result=mysql_query("select id_tipo_curso, desc_tipo_curso from cat_tipo_curso_i where cvr=$cvrs order by id_tipo_curso", $connect);


								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$id_tipo_curso=$row['id_tipo_curso'];
								$desc_tipo_curso=$row['desc_tipo_curso'];
								
								print("<option value=\"$id_tipo_curso\">$desc_tipo_curso</option>");
								}

			echo"</select>";

echo "		</td>";
echo "		</tr>";
echo "		<tr>";
echo "		<td>";
echo "		<label for=\"tipo_curso\" class=\"spgrey\">Tipo de pago: </label>";
echo "		</td>";
echo "		<td>";

echo"		<select name=\"id_tipo_pago\">";
	

/*****/
			if($tip==17)
			{
			$result=mysql_query("select id_tipo_pago, desc_tipo_pago from cat_tipo_pago_i where id_tipo_pago in (1,3) order by id_tipo_pago", $connect);
			}
			else if($tip==57 || $tip==54 || $tip==55 || $tip==56  || $tip==99 )
			{
			$result=mysql_query("select id_tipo_pago, desc_tipo_pago from cat_tipo_pago_i where id_tipo_pago in (2) order by id_tipo_pago", $connect);
			}
			else if($tip==49 || $tip==50 || $tip==51 || $tip==52 || $tip==53 || $tip==54 || $tip==55 || $tip==56 || $tip==58 || $tip==59)
			{
			$result=mysql_query("select id_tipo_pago, desc_tipo_pago from cat_tipo_pago_i where id_tipo_pago in (2) order by id_tipo_pago", $connect);
			}
			else
			{
			$result=mysql_query("select id_tipo_pago, desc_tipo_pago from cat_tipo_pago_i where sale=1 order by id_tipo_pago", $connect);
			}
/*****/


								$totalregistros=mysql_num_rows($result);
								while($row=mysql_fetch_array($result))
								{
								$id_tipo_pago=$row['id_tipo_pago'];
								$desc_tipo_pago=$row['desc_tipo_pago'];
								
								print("<option value=\"$id_tipo_pago\">$desc_tipo_pago</option>");
								}

			echo"</select>";
echo "		</td>";
			if($tip==57)
			{
echo "		<td>";
echo "		<label for=\"instalacion\" class=\"spgrey\">Instalaciones: </label>";
echo "		</td>";
echo "		<td>";
echo " 		<select name=\"conse\">";
			$result=mysql_query("select conse, desc_nombre from instalaciones where clave='$clave' and  convenio='682527' order by conse", $connect);

								$totalregistros=mysql_num_rows($result);
								while($row=mysql_fetch_array($result))
								{
								$conse=$row['conse'];
								$desc_nombre=$row['desc_nombre'];
								
								print("<option value=\"$conse\">$desc_nombre</option>");
								}
			echo"</select>";
echo "		</td>";
			}
			else
			{
echo "		<td colspan=\"2\">&nbsp;</td>";			
			}			

echo "		</tr>";
echo "		<tr><td colspan=\"4\">&nbsp;</td></tr>";



	$result=mysql_query("select status from ingresos where clave=$clave", $connect);

	$totalregistros=mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran

		while($row=mysql_fetch_array($result))
		{
		$status=$row['status'];
		}
	
		
	if($status==0)
	{
	echo "		<tr><td colspan=\"4\" align=\"center\">";
	echo "<input type=\"submit\" value=\"Continuar\" />";
	echo "		</td></tr>";
	}
	else
	{
	echo "<tr><td  colspan=\"4\" align=\"center\"><span class=\"spred\">El Plan Rector 2015 correspondiente al area de Ingresos ya se ha enviado a revisi&oacute;n ya no es posible realizar capturas!!!</span></td></tr>";
	}

}
echo "</table>";
echo "</form>";

echo "   	</div>";//cajaareas 

echo "<br>";
include "detalle.php";

								}//if de jefe_i=1


echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>