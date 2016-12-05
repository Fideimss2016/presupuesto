<?php
	include("config.inc.php");
	$usuario_sistema = 	$_SESSION["usuario_sistema"];
	$clave = 			$_SESSION["clave"];
	$tipo_usuario = 	$_SESSION["tipo_usuario"];
	$tipo_proyecto_id = $_POST["tipo_proyecto_id"];
	$tipo_gasto_id = 	$_POST["tipo_gasto_id"];
	$tipo_equipo_id = 	$_POST["tipo_equipo_id"];
	$cantidad = 		$_POST["cantidad"];
	$actividad_area = 	$_POST["actividad_area"];
	$monto = 			$_POST["monto"];
	$beneficios_id = 	$_POST["beneficios_id"];
	$periodo = 			$_POST["periodo"];

	$connect=mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname);
	$query="insert into test_obra (tipo_proyecto_id, tipo_gasto_id, tipo_equipo_id, usuario_sistema, clave, tipo_usuario, cantidad, actividad_area, monto, beneficios_id, periodo, fecha_registro) values ('$tipo_proyecto_id', '$tipo_gasto_id', '$tipo_equipo_id', '$usuario_sistema', '$clave', '$tipo_usuario', '$cantidad', '$actividad_area', '$monto', '$beneficios_id', '$periodo', current_timestamp())";
	mysql_query($query, $connect) or die("No se pudo registrar.");
?>