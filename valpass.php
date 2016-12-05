<?php
	include("config.inc.php");
	if(!empty($_GET["user"]))
	{
		$user = $_GET["user"];
	}
	if(!empty($_GET["pass"]))
	{
		$pass = $_GET["pass"];
	}
	$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("No se puede conectar");
	
	mysql_select_db($dbname, $connect) or die ("No se encuentra la BD");
	
	$query = "select id_usuario, clave, nombre, ape_pat, ape_mat, tipo_usuario from usuarios where usuario = '$user' and password = '$pass'";
	$result = mysql_query($query, $connect);

	$totalregs = mysql_num_rows($result);

	while ($row=mysql_fetch_array($result))
	{
		$id_usuario = $row['id_usuario'];
		$clave = $row['clave'];
		$nombre = $row['nombre'];
		$ape_pat = $row['ape_pat'];
		$ape_mat = $row['ape_mat'];
		$tipo_usuario = $row['tipo_usuario'];
	}
	mysql_free_result($result);

	mysql_close($connect);

	session_start();

	if($id_usuario)
	{
		$_SESSION['edansama']="SI";
		$_SESSION['usuario_sistema']="$nombre $ape_pat $ape_mat";
		$_SESSION['usuario']="$user";
		$_SESSION['clave']="$clave";
		$_SESSION['tipo_usuario']="$tipo_usuario";
		$_SESSION['id_usuario']="$id_usuario";

		header ("Location: obra_nuevo.php");
	}
?>