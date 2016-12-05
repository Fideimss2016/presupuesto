<?php
	class clases
	{
	    function validar_usuario($usu,$pas)
    	{
			include "variablesbd.php";
			$connect=mysql_connect("localhost","$dbname","$passworks");
			mysql_select_db("$dbname",$connect);

			$result=mysql_query("select u.id_usuario,u.usuario as usu,u.password as password1,u.md5 as passmd5,u.clave,u.id_usuario,u.nombre,u.ape_pat,u.ape_mat from usuarios u where u.usuario='$usu' and password=$pas and activo=1", $connect);
			$totalregistros=mysql_num_rows($result);
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
				$id_usuario=$row['id_usuario'];
				
				session_start();
				$_SESSION['edansama']=SI;
			}
		}
	}
?>
