<?php
include "clases/variablesbd.php";
$host="localhost";
$user="root";
$passworks="";
$dbname="fideimss_presupuesto";

session_start();

//if ($_POST["usu"]&& $_POST["contrasena"])
//{
	$_SESSION['usu']=$_REQUEST['usu'];
	$_SESSION['contrasena']=$_REQUEST['contrasena'];
	
	$usu=$_SESSION['usu'];
	$contrasena=$_SESSION['contrasena'];

	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

	//consultas
	$result=mysql_query("select u.id_usuario,u.usuario as usu,u.password as password1,u.md5 as passmd5,u.clave,u.id_usuario,u.nombre,u.ape_pat,u.ape_mat, u.tipo_usuario
						 from usuarios u where u.usuario='$usu' and password='$contrasena' and activo=1", $connect);

	$totalregistros=mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran

		while($row=mysql_fetch_array($result))
		{
		$usu=$row['usu'];
		$password1=$row['password1'];
		$passmd5=$row['passmd5'];
		$clave=$row['clave'];
		$id_usuario=$row['id_usuario'];
		$nombre=$row['nombre'];
		$ape_pat=$row['ape_pat'];
		$ape_mat=$row['ape_mat'];
		//$id_usuario=$row['id_usuario'];
		$tipo_usuario=$row['tipo_usuario'];
		}
		if($id_usuario)
		{
		//echo "valido? " . $_SESSION['edansama']="SI";
		session_start();
		//$_SESSION['edansama']="SI";
		$_SESSION['usuario_sistema']="$nombre $ape_pat $ape_mat";
		$_SESSION['usu']="$usu";
		$_SESSION['clave']="$clave";
		$_SESSION['tipo_usuario']="$tipo_usuario";
		$_SESSION['id_usuario'] = "$id_usuario";
		header ("Location: index.php");
		
				$results=mysql_query("select count(*) as cuantos from vobo where clave='$clave'", $connect);
				$totalregistros=mysql_num_rows($results);
				echo "select count(*) as cuantos from vobo where clave='$clave'";
				while($row=mysql_fetch_array($results))
				{
				$cuantos=$row['cuantos'];

					if($cuantos)
					{
					//echo "SIMON";	
					}		
					else
					{
					//echo "natch";	
					}
				}
		}
		//else
		//{
		////header("Location: login.php?errorusuario=si");
		//header("Location: login.php?errorusuario=si");
		//}

mysql_free_result($result);
//}
//else
//{
//header("Location: login.php?errorusuario=si");
//}

?>