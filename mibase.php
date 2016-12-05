<?php
//include "valida_seguridad.php";
include "clases/variablesbd.php";


	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

echo" <body>";

$usuario_sistema=$_SESSION["usuario_sistema"];
$clave=$_SESSION["clave"];
$tipo_usuario=$_SESSION["tipo_usuario"];

				$results=mysql_query("show tables from $dbname", $connect);
				$totalregistros=mysql_num_rows($results);

				if (!$results) {
					echo "Error de BD, no se pudieron listar las tablas\n";
					echo 'Error MySQL: ' . mysql_error();
					exit;
				}
				
				while ($fila = mysql_fetch_row($results)) {
					echo "<h3>Tabla: {$fila[0]}</h3><br>";
					//echo "describe {$fila[0]}";
					$results1=mysql_query("describe {$fila[0]}", $connect);
					$totalregistros1=mysql_num_rows($results1);
						while ($filas = mysql_fetch_row($results1))
						{
						echo "<b>campos:</b> {$filas[0]} <b>tipo_dato:</b> {$filas[1]}<br>";
						}
					
				}

echo" </body>";
mysql_free_result($results);
?>

