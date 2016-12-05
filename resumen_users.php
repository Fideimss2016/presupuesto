<?php

session_start();
$clave=$_SESSION["clave"];

include "clases/variablesbd.php";

	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

$celda="#222222";
$celda1="#333333";
$celda2="#555555";
$celdaf="#ffffff";
$celdaf1="#F0F0F9";


//$_SESSION['usuario_sistema']="$nombre $ape_pat $ape_mat";
$usuario_sistema=$_SESSION['usuario_sistema'];
$tipo_usuario=$_SESSION['tipo_usuario'];

if (!isset($_REQUEST['activar']))
{
//echo "webs";
}
else
{

$activar=$_REQUEST['activar'];
$clacam=$_REQUEST['clave'];

	//echo "UPDATE usuarios SET activo=$activar WHERE clave='$clacam'";

		$sqlUpdate = mysql_query("UPDATE usuarios SET activo=$activar 
							  	  WHERE clave='$clacam'", $connect) or die(mysql_error());

						if($sqlUpdate){echo "<span class=\"spblue\">Se ha registrado el cambio en el status del usuario correctamente!!!</span>";}
						else{echo "<span class=\"spred\">Error !!!</span>";}
}

echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";

echo "<body>";

echo "<center><h1><font color=\"#000\">Usuarios activos para el Ejercicio 2017</font></h1></center>";

echo "<center>";
echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
echo"  <tr>";
echo"     <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">#</span></th>";
echo"     <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">CLAVE</span></th>";
echo"     <th bgcolor=$celda scope=\"col\" colsapn=\"2\"><span class=\"titulo_small\">UNIDAD OPERATIVA</span></th>";
echo"     <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">DELEGACION</span></th>";
echo"     <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">NOMBRE</span></th>";
echo"   </tr>";

$colorfila=0;

$result=mysql_query("SELECT u.nombre, u.ape_pat, u.ape_mat, u.clave, ca.desc_uops, ca.desc_del 
					 FROM usuarios u, cat_delegaciones ca 
					 WHERE u.activo =1 
					 AND u.tipo_usuario =  'CAP'
					 AND ca.clave=u.clave
					 ORDER BY u.clave", $connect);
								
$totalregistros=mysql_num_rows($result);
							
							$ga=1;	
							while($row=mysql_fetch_array($result))
							{
							$nombre=$row['nombre'];
							$ape_pat=$row['ape_pat'];
							$ape_mat=$row['ape_mat'];
							$desc_uops=$row['desc_uops'];
							$desc_del=$row['desc_del'];
							$clave=$row['clave'];
							
							
										if ($colorfila==0)
										{
											$color= "#efefef";
											$colorfila=1;
										}
										else
										{
											$color="#ffffff";
											$colorfila=0;
										}
							
										echo"   <tr>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">$ga</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">$clave</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$desc_uops</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\"><a href=\"resumen_users.php?activar=0&&clave=$clave\">desactivar</a></span></td>";
										echo"     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$desc_del</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$nombre $ape_pat $ape_mat</span></td>";
										echo"   </tr>";
										$ga++;
								}//while clabe

echo "</table>";
echo "<br><br>";
echo "</center>";

echo "<center><h1><font color=\"#000\">Usuarios inactivos para el Ejercicio 2017</font></h1></center>";

echo "<center>";
echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
echo"  <tr>";
echo"     <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">#</span></th>";
echo"     <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">CLAVE</span></th>";
echo"     <th bgcolor=$celda scope=\"col\" colspan=\"2\"><span class=\"titulo_small\">UNIDAD OPERATIVA</span></th>";
echo"     <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">DELEGACION</span></th>";
echo"     <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">NOMBRE</span></th>";
echo"   </tr>";

$colorfila=0;

$result=mysql_query("SELECT u.nombre, u.ape_pat, u.ape_mat, u.clave, ca.desc_uops, ca.desc_del 
					 FROM usuarios u, cat_delegaciones ca 
					 WHERE u.activo =0 
					 AND u.tipo_usuario =  'CAP'
					 AND ca.clave=u.clave
					 ORDER BY u.clave", $connect);
								
$totalregistros=mysql_num_rows($result);
							
							$ga=1;	
							while($row=mysql_fetch_array($result))
							{
							$nombre=$row['nombre'];
							$ape_pat=$row['ape_pat'];
							$ape_mat=$row['ape_mat'];
							$desc_uops=$row['desc_uops'];
							$desc_del=$row['desc_del'];
							$clave=$row['clave'];
							
							
										if ($colorfila==0)
										{
											$color= "#efefef";
											$colorfila=1;
										}
										else
										{
											$color="#ffffff";
											$colorfila=0;
										}
							
										echo"   <tr>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">$ga</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">$clave</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$desc_uops</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\"><a href=\"resumen_users.php?activar=1&&clave=$clave\">activar</a></span></td>";
										echo"     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$desc_del</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$nombre $ape_pat $ape_mat</span></td>";
										echo"   </tr>";
										$ga++;
								}//while clabe

echo "</table>";
echo "<br><br>";
echo "</center>";


echo "</body>";
echo "</html>";
?>