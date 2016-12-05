<?php
	include("config.inc.php");

	session_start();

	$usuario_sistema =		$_SESSION['usuario_sistema'];
	$usuario = 				$_SESSION['usu'];
	$clave = 				$_SESSION['clave'];
	$tipo_usuario = 		$_SESSION['tipo_usuario'];
	$id_usuario = 			$_SESSION['id_usuario'];



	$tipo_proyecto_id = 	$_POST["tipo_proyecto_id"];
	$tipo_gasto_id = 		$_POST["tipo_gasto_id"];
	$tipo_equipo_id = 		$_POST["tipo_equipo_id"];
	$cantidad = 			$_POST["cantidad"];
	$actividad_id = 		$_POST["actividad_id"];
	$monto = 				$_POST["monto"];
	$beneficio_id = 		$_POST["beneficio_id"];
	$periodo = 				$_POST["periodo"];


	$cuotas_recuperacion =	$_POST["cuotas_recuperacion"];
	$uso_espacio =			$_POST["uso_espacio"];

	$observaciones =		$_POST["observaciones"];
	$curso_id	=			$_POST["curso_id"];
	
	$num_grupos =			$_POST["num_grupos"];
	$usuarios_grupo =		$_POST["usuarios_grupo"];
	$total_usuarios =		$num_grupos * $usuarios_grupo;

	$ingresos_inscripcion =	$_POST["ingresos_inscripcion"];
	$cuotas_recuperacion =	$_POST["cuotas_recuperacion"];
	$uso_espacio =			$_POST["uso_espacio"];
	$total_ingresos =		$ingresos_inscripcion + $cuotas_recuperacion + $uso_espacio;

	$clave_actividad = 0;

	if($tipo_proyecto_id==10)
	{
		$clave_act = $actividad_id;
		$connect=mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db($dbname, $connect);
		$query=mysql_query("select clave_act from cat_actividades_i where conse_act = '$clave_act'", $connect);
		
		$total=mysql_num_rows($query);
		while($row=mysql_fetch_array($query))
		{
			$clave_actividad = $row["clave_act"];
		}
		$actividad_id = 0;
	}
	elseif($tipo_proyecto_id!=10)
	{
		$clave_actividad = 0;
	}

	$clave_del=substr($clave, 0, 2);
	$clave_uops = substr($clave, 2, 3);
	$id_proyecto = 0;
	$tipo_proy="";
	$status= "3";

	if($tipo_proyecto_id==10)
	{
		$c1=0;
		$c2=0;
		$c3=0;
		$c4=0;
		$c5=1;
		$c6=0;
	}
	elseif($tipo_proyecto_id==5)
	{
		$c1=1;
		$c2=0;
		$c3=0;
		$c4=0;
		$c5=0;
		$c6=0;
	}
	elseif($tipo_proyecto_id==11)
	{
		$c1=0;
		$c2=0;
		$c3=1;
		$c4=0;
		$c5=0;
		$c6=0;
	}
	elseif($tipo_proyecto_id==12)
	{
		$c1=0;
		$c2=0;
		$c3=0;
		$c4=1;
		$c5=0;
		$c6=0;
	}
	elseif($tipo_proyecto_id==13)
	{
		$c1=0;
		$c2=1;
		$c3=0;
		$c4=0;
		$c5=0;
		$c6=0;
	}

	if($beneficio_id!=3)
	{
		$ingresos_inscripcion = 0;
		$cuotas_recuperacion = 0;
		$uso_espacio = 0;
		$total_ingresos = 0;
	}

	$connect = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname, $connect);
	$query = mysql_query("select clave_par from cat_partidas_e where conse_partidas = '$tipo_proyecto_id' and obra = 1", $connect);
	$total = mysql_num_rows($query);
	while($row = mysql_fetch_array($query))
	{
		$clave_par = $row['clave_par'];
	}
	mysql_free_result($query);


	//$anio = date("Y", strtotime(getdate()));
	$anio = date("Y");

/*	Debugging Code
	echo 	"Usuario del sistema: ".$usuario_sistema."<br>";
	echo 	"Usuario: ".$usuario."<br>";
	echo 	"Clave: ".$clave."<br>";
	echo 	"Tipo de usuario: ".$tipo_usuario."<br>";
	echo 	"Id Usuario: ".$id_usuario."<br>";

	echo 	"Tipo proyecto id: ".$tipo_proyecto_id."<br>";
	echo 	"Tipo gasto id: ".$tipo_gasto_id."<br>";
	echo 	"Tipo equipo id: ".$tipo_equipo_id."<br>";
	echo 	"Cantidad: ".$cantidad."<br>";
	echo 	"Actividad_id: ".$actividad_id."<br>";
	echo 	"Clave actividad: ".$clave_actividad."<br>";
	echo 	"Monto: ".$monto."<br>";
	echo 	"Beneficio id: ".$beneficio_id."<br>";
	echo 	"Periodo: ".$periodo."<br>";
	echo 	"observaciones: ".$observaciones."<br>";

	echo 	"Cursos ID: ".$curso_id."<br>";
	echo 	"Num. grupos: ".$num_grupos."<br>";
	echo 	"Usuarios x grupo: ".$usuarios_grupo."<br>";
	echo 	"Total usuarios: ".$total_usuarios."<br>";

	echo 	"Inscripción: ".$ingresos_inscripcion."<br>";
	echo 	"Cuotas recuperación: ".$cuotas_recuperacion."<br>";
	echo 	"Uso de espacio: ".$uso_espacio."<br>";
	echo 	"Total de ingresos: ".$total_ingresos."<br>";
	echo 	"C1: ".$c1."<br>";
	echo 	"C2: ".$c2."<br>";
	echo 	"C3: ".$c3."<br>";
	echo 	"C4: ".$c4."<br>";
	echo 	"C5: ".$c5."<br>";
	echo 	"C6: ".$c6."<br>";
	echo 	"Año: ".$anio;
*/

	$connect=mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname, $connect);
	$query="insert into obras (clave, clave_del, clave_uops, clave_act, nom_proyecto, id_proyecto, tipo_proy, clave_par, monto, anio_fiso, problematica, objetivo, componentes, beneficios, riesgos, fecha_cap, id_usuario, usr_id, vobo, status, observaciones, c1, c2, c3, c4, c5, c6, origen_del_gasto, cantidad, unidad, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, total_gastoo, activo, tipo_proyecto_id, tipo_gasto_id, tipo_equipo_id, actividad_id, beneficio_id, curso_id, num_grupos, usuarios_grupo, total_usuarios, ingresos_inscripcion, cuotas_recuperacion, uso_espacio, total_ingresos) values ('$clave', '$clave_del', '$clave_uops', '$clave_actividad', '', '', '', '$clave_par', '$monto', '$anio', '', '', '', '', '', current_timestamp(), '$usuario', '$id_usuario', 0, '$status', '$observaciones', '$c1', '$c2', '$c3', '$c4', '$c5', '$c6', '', '$cantidad', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '$tipo_proyecto_id', '$tipo_gasto_id', '$tipo_equipo_id', '$actividad_id', '$beneficio_id', '$curso_id', '$num_grupos', '$usuarios_grupo', '$total_usuarios', '$ingresos_inscripcion', '$cuotas_recuperacion', '$uso_espacio', '$total_ingresos')";
	$resultado = mysql_query($query, $connect) or die("No se pudo registrar. ".mysql_error());

	header ("Location: obra_nuevo.php");

?>