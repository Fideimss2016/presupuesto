<?php
include "valida_seguridad.php";
include "clases/variablesbd.php";
echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";

	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

echo" <body>";

$_SESSION['clave']=$_REQUEST['clave'];
$clave=$_SESSION["clave"];

$celda="#1a1a1a";
$tabla="#666";
$celda1="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura Presupuesto 2017</h3>";

echo "		<p class=\"spwhite\">";
echo "		<b>Resumen de Capturas en el Sistema de Presupuesto 2017</b>";
echo "		</p>";

echo "		<div id=\"cajaareas\">";

$result=mysql_query("select desc_del,desc_uops from cat_delegaciones where clave='$clave'", $connect);
$totalregistros=mysql_num_rows($result);

while($row=mysql_fetch_array($result))
{
$desc_del=$row['desc_del'];
$desc_uops=$row['desc_uops'];
}

echo "<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "<tr><th scope=\"col\" bgcolor=\"$c1\" colspan=\"4\" align=\"left\"><span class=\"spwhite\">&nbsp;<b>$desc_del $desc_uops</b></th></tr>";
echo "  <tr>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Personal</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Categoria</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Actividad</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Metas</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Plan de Trabajo</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Cronograma de Trabajo</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Status</b></th>";
echo "  </tr>";


			$result=mysql_query("select p.conse_categoria,p.id_emp,p.clave_act,p.clave_par, cpe.desc_par, p.status, cai.actividad, cc.desc_categoria, p.nombre, p.ape_pat, p.ape_mat,p.id_conse_personal
			from personal p, cat_partidas_e cpe, cat_actividades_i cai, cat_categoria cc
			where clave='$clave' and cpe.clave_par=p.clave_par and cai.clave_act=p.clave_act and cc.conse_categoria=p.conse_categoria order by conse_categoria", $connect);

			$totalregistros=mysql_num_rows($result);
			$valcolor==0;
			while($row=mysql_fetch_array($result))
			{
			$conse_categoria=$row['conse_categoria'];
			$id_emp=$row['id_emp'];
			$clave_act=$row['clave_act'];
			$clave_par=$row['clave_par'];
			$conse_categoria=$row['conse_categoria'];
			$desc_par=$row['desc_par'];
			$status=$row['status'];
			$actividad=$row['actividad'];
			$desc_categoria=$row['desc_categoria'];
			$nombre=$row['nombre'];
			$ape_pat=$row['ape_pat'];
			$ape_mat=$row['ape_mat'];
			$id_conse_personal=$row['id_conse_personal'];

	if ($colorfila==0)
	{
	   	$color= "#efefef";
	   	$colorfila=1;
	}
	else
	{
	   	$color="#fff";
	   	$colorfila=0;
    }


			if($valcolor==0)
			{$color="spgreen"; $valcolor=1;}
			else
			{$color="spblue"; $valcolor=0;}

			$resultm=mysql_query("select m.status as status_meta
			from metas m
			where clave='$clave' and m.id_emp=$id_emp", $connect);

			$totalregistros=mysql_num_rows($resultm);
			$valcolor==0;
			while($row=mysql_fetch_array($resultm))
			{
			$status_meta=$row['status_meta'];
			}


			echo "  <tr>";
			echo "    <td bgcolor=\"$celda\"><span class=$color>$nombre $ape_pat $ape_mat</span></td>";
			echo "    <td bgcolor=\"$celda\"><span class=$color>$desc_categoria</span></td>";
			echo "    <td bgcolor=\"$celda\"><span class=$color>$actividad</span></td>";

			if($status==0)
			{
						if($status_meta==0)
						{
						echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color>
								  <a href=\"metas.php?id_emp=$id_emp&&clave=$clave\" title=\"capturar metas\"><img src=\"capturar.png\" width=\"20\" height=\"20\" /></a>
								  </span></td>";
						}
						else if($status_meta==4)
						{
						echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color>
								  <a href=\"metasc.php?id_emp=$id_emp&&clave=$clave\" title=\"meta capturada\"><img src=\"capturado.png\" width=\"20\" height=\"20\" /></a>
								  </span></td>";
						}

						$result1=mysql_query("select count(*) as cuantos
						from plan p
						where p.clave='$clave' and p.id_emp=$id_emp", $connect);

						$totalregistros=mysql_num_rows($result1);
						$valcolor==0;
						while($row=mysql_fetch_array($result1))
						{
						$cuantos=$row['cuantos'];
						}

						echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color>
								  <a href=\"plan.php?id_emp=$id_emp&&clave=$clave\" title=\"capturar plan de trabajo\"><img src=\"capturar.png\" width=\"20\" height=\"20\" /></a>
								  <span class=\"spwhite\">$cuantos</span></td>";


						$result2=mysql_query("select count(*) as cuantos1
						from programa p
						where p.clave='$clave' and p.id_emp=$id_emp", $connect);

						$totalregistros=mysql_num_rows($result2);
						$valcolor==0;
						while($row=mysql_fetch_array($result2))
						{
						$cuantos1=$row['cuantos1'];
						}


						echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color>
								  <a href=\"programa.php?id_emp=$id_emp&&clave=$clave\" title=\"capturar programa\"><img src=\"capturar.png\" width=\"20\" height=\"20\" /></a>
								  </span><span class=\"spwhite\">$cuantos1</span></td>";
			}
			else if($status==1)
			{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
			}
				else if($status==2)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a></span></td>";
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a></span></td>";
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a></span></td>";
				}
				else if($status==3 || $status==5)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"programa aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"programa aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"programa aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}

				if($status==0)
				{
			echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"personal.php?elimina=SI&&id_conse_personal=$id_conse_personal&&clave=$clave\" title=\"eliminar registro\"><img src=\"tache.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else if($status==1)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else if($status==2)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
				}
				else if($status==3 || $status==5)
				{
					if($tipo_usaurio='ADM')
					{
			echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"personal.php?elimina=SI&&id_conse_personal=$id_conse_personal&&clave=$clave\" title=\"eliminar registro\"><img src=\"tache.png\" width=\"20\" height=\"20\" /></a></span></td>";
					}
					else
					{
						echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"programa aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
					}


				}
			echo "  </tr>";
			$gtotal+=$monto;
			}

echo "</table>";
echo "<br>";

echo" </body>";
echo" </html>";

?>