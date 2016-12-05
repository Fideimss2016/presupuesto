<?php
	session_start();
	include "valida_seguridad.php";
	include "clases/variablesbd.php";

/*	$clave = "99000";
	$_SESSION['usuario_sistema'] = "Humberto Franco";
	$_SESSION['tipo_usuario']  = "ADM";
	*/
	echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";

	//conexion a la base de datos
	$connect = mysql_connect("$host","$user","$passworks") or die("No se puede conectar");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

	echo" <body>";
	echo "<div id=\"contenedor\">";
	echo "	<div id=\"contenido_cont\">";

	$usuario_sistema = $_SESSION["usuario_sistema"];
	$clave = $_SESSION["clave"];
	$tipo_usuario = $_SESSION["tipo_usuario"];

	echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema $tipo_usuario</span></div>";
	$result = mysql_query("select jefe_p from vobo where clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$jefe_p = $row['jefe_p'];
	}
	if($jefe_p == 1)
	{
	$result = mysql_query("select count(*) as exreg from personal where clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$exreg = $row['exreg'];
	}
	if($exreg == 0)
	{
		echo "<center><h1>M&oacute;dulo cerrado!...</h1></center>";
	}
	else
	{
		echo "<center><h1>Este m&oacute;dulo se ha cerrado por que ya cuenta con Vobo!...</h1></center>";
		include "detallep.php";
	}
}
else
{
	echo "    <h3>Captura de Personal del Presupuesto 2017</h3>";
	echo "    <h2>Registro de Personal</h2>";
									
	echo "		<p class=\"spwhite\">";
	echo "		<b>Paso 1</b> Seleccione los datos para el instructor";
	echo "		</p>";

	echo "		<div id=\"cajaareas\">";
				
	$result = mysql_query("select desc_uops, desc_del,acceso from cat_delegaciones where clave = '$clave'", $connect) or die("No se puede realizar la consulta.");
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
		$acceso = $row['acceso'];
	}

	$tip = -1;
	if (!empty($_POST['conse_partidas']))
	{ 
		$tip = $_POST['conse_partidas']; 
	}

	if (isset($_REQUEST['elimina']))
	{
		$_SESSION['elimina'] = $_REQUEST['elimina'];
		$elimina = $_SESSION['elimina'];
	}

	if (isset($elimina))
	{
		$_SESSION['id_conse_personal'] = $_REQUEST['id_conse_personal'];
		$id_conse_personal = $_SESSION['id_conse_personal'];
		$sqlEliminar = mysql_query("DELETE FROM personal WHERE id_conse_personal = $id_conse_personal and clave = '$clave'", $connect) or die(mysql_error());

		if($sqlEliminar)
		{
			$sqlEliminar1 = mysql_query("DELETE FROM metas WHERE id_emp = $id_conse_personal and clave = '$clave'", $connect) or die(mysql_error());
			$sqlEliminar2 = mysql_query("DELETE FROM programa WHERE id_emp = $id_conse_personal and clave = '$clave'", $connect) or die(mysql_error());
			$sqlEliminar3 = mysql_query("DELETE FROM plan WHERE id_emp = $id_conse_personal and clave = '$clave'", $connect) or die(mysql_error());
			echo "<span class=\"spred\">Registro eliminado</span><br>";
		}
		else
		{
			echo "<span class=\"spred\">Error al eliminar el registro!!!</span><br>";
		}	
	}
	echo "		<label for=\"uopsi\">Unidad Operativa: <b>$desc_uops</b></label><br><br>";

	//echo "select conse_partidas, clave_par, desc_par from cat_partidas_e where personal=1 and acceso in ($acceso) order by clave_par";
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
		
	$result = mysql_query("select conse_partidas, clave_par, desc_par from cat_partidas_e where personal=1 and acceso in ($acceso) order by clave_par", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$conse_partidas = $row['conse_partidas'];
		$clave_par = $row['clave_par'];
		$desc_par = $row['desc_par'];
		if($conse_partidas == $tip)
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

	if($tip != -1)
	{
		echo "		<form action=\"personal_1X.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
		echo "		<input type=\"hidden\" value=\"$tip\" name=\"conse_partida\">";
		echo "		<td>";
		echo "		<label for=\"tipo_curso\" class=\"spgrey\">Asignar actividad: </label>";
		echo "		</td>";
		echo "		<td>";

		$_SESSION["instructor"] = $tip;

		if($tip == 1)
		{
			echo "		<select name=\"conse_act\">";
			$result = mysql_query("select conse_act, clave_act, actividad from cat_actividades_i where clave_act!=0 and activo = 1 order by conse_act", $connect);
			$totalregistros = mysql_num_rows($result);
			//se recogen las consultas en un array y se muestran
			while($row = mysql_fetch_array($result))
			{
				$conse_act = $row['conse_act'];
				$clave_act = $row['clave_act'];
				$actividad = $row['actividad'];
									
				print("<option value=\"$conse_act\">$clave_act $actividad</option>");
			}
			echo"</select>";
		}	
		//else if ($tip==44) 
		else if ($tip == 2)
		{
			echo "		<select name=\"conse_act\">";
			$result = mysql_query("select conse_act, clave_act, actividad from cat_actividades_i where clave_act=47106", $connect);
			$totalregistros = mysql_num_rows($result);
			//se recogen las consultas en un array y se muestran
			while($row = mysql_fetch_array($result))
			{
				$conse_act = $row['conse_act'];
				$clave_act = $row['clave_act'];
				$actividad = $row['actividad'];
									
				print("<option value=\"$conse_act\">$clave_act $actividad</option>");
			}
			echo"</select>";
		}
		echo "		</td>";
		echo "		</tr>";

		echo "		<tr>";

		echo "		<td>";
		echo "		<label for=\"tipo_curso\" class=\"spgrey\">Categor&iacute;a: </label>";
		echo "		</td>";
		echo "		<td>";
		if($tip == 1)
		{
			echo "		<select name=\"conse_categoria\">";
			$result = mysql_query("select conse_categoria, desc_categoria from cat_categoria where cvr=0 order by conse_categoria", $connect);
			$totalregistros = mysql_num_rows($result);
			//se recogen las consultas en un array y se muestran
			while($row = mysql_fetch_array($result))
			{
				$conse_categoria = $row['conse_categoria'];
				$desc_categoria = $row['desc_categoria'];

				print("<option value=\"$conse_categoria\">$desc_categoria</option>");
			}
			echo"</select>";
		}

		//else if($tip==44)
		else if ($tip == 2)
		{
			echo "		<select name=\"conse_categoria\">";
			$result = mysql_query("select conse_categoria, desc_categoria from cat_categoria where cvr=1", $connect);
			$totalregistros = mysql_num_rows($result);
			//se recogen las consultas en un array y se muestran
			while($row = mysql_fetch_array($result))
			{
				$conse_categoria = $row['conse_categoria'];
				$desc_categoria = $row['desc_categoria'];
									
				print("<option value=\"$conse_categoria\">$desc_categoria</option>");
			}
			echo"</select>";
		}

		echo "		</td>";
		echo "		</tr>";

		$result = mysql_query("select status from personal where clave=$clave", $connect);
		if($result)
		{
			$totalregistros = mysql_num_rows($result);
			while($row=mysql_fetch_array($result))
			{
				$status=$row['status'];
			}
		}
			
		if($status == 0 || $status == 5 || $status == 10)
		{
			echo "		<tr><td colspan=\"4\" align=\"center\">";
			echo "<input type=\"submit\" value=\"Continuar\" />";
			echo "		</td></tr>";
		}
		else
		{
			echo "<tr><td  colspan=\"4\" align=\"center\"><span class=\"spred\">El Plan Rector 2017 correspondiente al Area de Personal ya se ha enviado a revisi&oacute;n ya no es posible realizar capturas!!!</span></td></tr>";
		}
	}
	echo "</table>";
	echo "</form>";

	echo "   	</div>";//cajaareas 

	echo "<br>";
	include "detallep.php";
									}//if de jefe_p=1
	echo "  </div>";//div contenido_cont
	echo "</div>";//div contenedor

	echo" </body>";
	echo" </html>";
?>