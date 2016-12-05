<?php
	include "clases/variablesbd.php";
	if ($_POST["usu"] && $_POST["contrasena"])
	{
		$_SESSION['usu'] 		= $_REQUEST['usu'];
		$_SESSION['contrasena'] = $_REQUEST['contrasena'];
		
		$usu 					= $_SESSION['usu'];
		$contrasena 			= $_SESSION['contrasena'];

		$connect = mysql_connect("$host","$user","$passworks");
		mysql_select_db("$dbname",$connect);
		$result = mysql_query("select u.id_usuario,u.usuario as usu,u.password as password1,u.md5 as passmd5,u.clave,u.id_usuario,u.nombre,u.ape_pat,u.ape_mat, u.tipo_usuario from usuarios u 
		where u.usuario='$usu' and password='$contrasena' and activo=1", $connect);
		$totalregistros = mysql_num_rows($result);
		while($row = mysql_fetch_array($result))
		{
			$usu 			= $row['usu'];
			$password1 		= $row['password1'];
			$passmd5 		= $row['passmd5'];
			$clave 			= $row['clave'];
			$id_usuario 	= $row['id_usuario'];
			$nombre 		= $row['nombre'];
			$ape_pat 		= $row['ape_pat'];
			$ape_mat 		= $row['ape_mat'];
			$id_usuario 	= $row['id_usuario'];
			$tipo_usuario 	= $row['tipo_usuario'];
		}
		if($id_usuario)
		{
			session_start();
			$_SESSION['edansama'] 			= "SI";
			$_SESSION['usuario_sistema'] 	= "$nombre $ape_pat $ape_mat";
			$_SESSION['usu'] 				= "$usu";
			$_SESSION['clave'] 				= "$clave";
			$_SESSION['tipo_usuario'] 		= "$tipo_usuario";
			header ("Location: index.php");

			$results = mysql_query("select count(*) as cuantos from vobo where clave='$clave'", $connect);
			$totalregistros = mysql_num_rows($results);
			echo "select count(*) as cuantos from vobo where clave='$clave'";
			while($row = mysql_fetch_array($results))
			{
				$cuantos = $row['cuantos'];
			}
		}
		else
		{
			header("Location: login.php?errorusuario=si");
		}

		mysql_free_result($result);
	}
	else
	{
		header("Location: login.php?errorusuario=si");
	}
?>