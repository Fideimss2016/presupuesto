<?php
	include "valida_seguridad.php";
	include "clases/variablesbd.php";
	echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";

	echo" <body>";
	echo "<div id=\"contenedor\">";
	echo "	<div id=\"contenido_cont\">";

	$usuario_sistema 	= $_SESSION["usuario_sistema"];
	$clave 				= $_SESSION["clave"];
	$tipo_usuario 		= $_SESSION["tipo_usuario"];

	echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema $tipo_usuario</span></div>";
	echo "    <h3>Captura Presupuesto 2017</h3>";

	echo "		<p class=\"spwhite\">";
	echo "		<b>Resumen de Capturas en el Sistema de Presupuesto 2017</b>";
	echo "		</p>";

	echo "		<div id=\"cajaareas\">";


	$connect=mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);

	echo" <body>";

	$celda 	= "#1a1a1a";
	$tabla 	= "#666666";
	$celda1 = "#666666";
	$c1 	= "#333333";


	/*INGRESOS*/

	echo "    <h2>Ingresos</h2>";

	echo "<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";


	$result=mysql_query("select distinct(i.clave_del),cd.desc_del from ingresos i,cat_delegaciones cd where i.clave_del=cd.clave_del order by i.clave_del", $connect);
	$totalregistros=mysql_num_rows($result);

	while($row=mysql_fetch_array($result))
	{
	$clave_del=$row['clave_del'];
	$desc_del=$row['desc_del'];

	echo "<tr><th scope=\"col\" bgcolor=\"$c1\" colspan=\"4\" align=\"left\"><span class=\"spgrey\">&nbsp;<b>$desc_del</b></th></tr>";

		$result1=mysql_query("select i.clave, sum(i.ingreso_total) as ingretot, i.status, cd.desc_uops, cd.pto2013 from ingresos i ,cat_delegaciones cd where i.clave_del=$clave_del and cd.clave=i.clave group by clave,status order by clave", $connect);
		$totalregistros=mysql_num_rows($result1);

		echo "<tr>
		      <td bgcolor=\"$celda\" align=\"left\"><span class=\"white\">Unidad Operativa</span></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Presupuesto 2016</span></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Ingreso</span></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Status</span></td>
		      </tr>";


		while($row=mysql_fetch_array($result1))
		{
		$clave=$row['clave'];
		$ingretot=$row['ingretot'];
		$status=$row['status'];
		$desc_uops=$row['desc_uops'];
		$pto2013=$row['pto2013'];


		$ingretot=round($ingretot,2);

		if($valcolor==0)
		{$color="spgreen"; $valcolor=1;}
		else
		{$color="spblue"; $valcolor=0;}


		echo "<tr>
		      <td bgcolor=\"$celda\" align=\"left\"><span class=\"$color\">$clave $desc_uops </span><a href=\"vcapturas.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver detalle</a></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " .number_format($pto2013,2) . "</span></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " .number_format($ingretot,2) . "</span></td>";
			if($status==0)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			else if($status==1)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			else if($status==2)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a></span></td>";
				}
			else if($status==3)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
		      echo "</tr>";
		}
	}

	echo "</table>";
	/*TERMINA INGRESOS*/

	echo "<br>";

	/*EGRESOS*/
	echo "    <h2>Egresos</h2>";
	echo "<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";


	$result=mysql_query("select distinct(e.clave_del),cd.desc_del from egresos e,cat_delegaciones cd where e.clave_del=cd.clave_del order by e.clave_del", $connect);
	$totalregistros=mysql_num_rows($result);

	while($row=mysql_fetch_array($result))
	{
	$clave_del=$row['clave_del'];
	$desc_del=$row['desc_del'];

	echo "<tr><th scope=\"col\" bgcolor=\"$c1\" colspan=\"3\" align=\"left\"><span class=\"spgrey\">&nbsp;<b>$desc_del</b></th></tr>";

		$result1=mysql_query("select e.clave, sum(e.total_gasto) as total_gasto, e.status, cd.desc_uops from egresos e ,cat_delegaciones cd where e.clave_del=$clave_del and cd.clave=e.clave group by clave,status order by clave", $connect);
		$totalregistros=mysql_num_rows($result1);

		echo "<tr>
		      <td bgcolor=\"$celda\" align=\"left\"><span class=\"white\">Unidad Operativa</span></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Egreso</span></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Status</span></td>
		      </tr>";


		while($row=mysql_fetch_array($result1))
		{
		$clave=$row['clave'];
		$total_gasto=$row['total_gasto'];
		$status=$row['status'];
		$desc_uops=$row['desc_uops'];

		$total_gasto=round($total_gasto,2);

		if($valcolor==0)
		{$color="spgreen"; $valcolor=1;}
		else
		{$color="spblue"; $valcolor=0;}


		echo "<tr>
		      <td bgcolor=\"$celda\" align=\"left\"><span class=\"$color\">$clave $desc_uops </span><a href=\"vcapturase.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver detalle</a></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " .number_format($total_gasto,2) . "</span></td>";
			if($status==0)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			else if($status==1)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			else if($status==2)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a></span></td>";
				}
			else if($status==3)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
		      echo "</tr>";
		}
	}

	echo "</table>";
	/*TERMINA EGRESOS*/

	echo "<br>";

	/*OBRA*/
	echo "    <h2>Obra y Equipo Deportivo</h2>";
	echo "<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";


	$result=mysql_query("select distinct(o.clave_del),cd.desc_del from obras o,cat_delegaciones cd where o.clave_del=cd.clave_del order by o.clave_del", $connect);
	$totalregistros=mysql_num_rows($result);

	while($row=mysql_fetch_array($result))
	{
	$clave_del=$row['clave_del'];
	$desc_del=$row['desc_del'];

	echo "<tr><th scope=\"col\" bgcolor=\"$c1\" colspan=\"3\" align=\"left\"><span class=\"spgrey\">&nbsp;<b>$desc_del</b></th></tr>";

		$result1=mysql_query("select o.clave, sum(o.monto) as monto, o.status, cd.desc_uops from obras o ,cat_delegaciones cd where o.clave_del='$clave_del' and cd.clave=o.clave group by o.clave,o.status order by o.clave", $connect);
		$totalregistros=mysql_num_rows($result1);

		echo "<tr>
		      <td bgcolor=\"$celda\" align=\"left\"><span class=\"white\">Unidad Operativa</span></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Gasto Obra</span></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Status</span></td>
		      </tr>";


		while($row=mysql_fetch_array($result1))
		{
		$clave=$row['clave'];
		$monto=$row['monto'];
		$status=$row['status'];
		$desc_uops=$row['desc_uops'];

		$monto=round($monto,2);

		if($valcolor==0)
		{$color="spgreen"; $valcolor=1;}
		else
		{$color="spblue"; $valcolor=0;}


		echo "<tr>
		      <td bgcolor=\"$celda\" align=\"left\"><span class=\"$color\">$clave $desc_uops </span><a href=\"vcapturasox.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver detalle</a></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " .number_format($monto,2) . "</span></td>";
			if($status==0)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			else if($status==1)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			else if($status==2)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a></span></td>";
				}
			else if($status==3)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}

		      echo "</tr>";
		}
	}

	echo "</table>";
	/*TERMINA OBRA*/

	/*PERSONAL*/
	echo "    <h2>Personal</h2>";
	echo "<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";


	$result=mysql_query("select distinct(p.clave_del),cd.desc_del from personal p,cat_delegaciones cd where p.clave_del=cd.clave_del order by p.clave_del", $connect);
	$totalregistros=mysql_num_rows($result);

	while($row=mysql_fetch_array($result))
	{
	$clave_del=$row['clave_del'];
	$desc_del=$row['desc_del'];

	echo "<tr><th scope=\"col\" bgcolor=\"$c1\" colspan=\"3\" align=\"left\"><span class=\"spgrey\">&nbsp;<b>$desc_del</b></th></tr>";

		$result1=mysql_query("select p.clave, sum(p.gas_anual) as gas_anual, p.status, cd.desc_uops from personal p,cat_delegaciones cd where p.clave_del='$clave_del' and cd.clave=p.clave group by p.clave order by p.clave", $connect);
		$totalregistros=mysql_num_rows($result1);

		echo "<tr>
		      <td bgcolor=\"$celda\" align=\"left\"><span class=\"white\">Unidad Operativa</span></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Gasto Personal</span></td>
		      </tr>";

		while($row=mysql_fetch_array($result1))
		{
		$clave=$row['clave'];
		$gas_anual=$row['gas_anual'];
		$status=$row['status'];
		$desc_uops=$row['desc_uops'];

		$monto=round($monto,2);

		if($valcolor==0)
		{$color="spgreen"; $valcolor=1;}
		else
		{$color="spblue"; $valcolor=0;}


		echo "<tr>
		      <td bgcolor=\"$celda\" align=\"left\"><span class=\"$color\">$clave $desc_uops </span><a href=\"vcapturasp.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver detalle</a></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " .number_format($gas_anual,2) . "</span></td>";
			/*
			if($status==0)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"vcapturasp.php?clave=$clave\" title=\"capturando registros\" target=\"_blank\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			else if($status==1)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"vcapturasp.php?clave=$clave\" title=\"programa en revision por el jefe de oficina\" target=\"_blank\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			else if($status==2)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"vcapturasp.php?clave=$clave\" title=\"en espera de autorizacion de fideimss\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a></span></td>";
				}

			else if($status==3)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"vcapturasp.php?clave=$clave\" title=\"programa aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			*/
		      echo "</tr>";
		}
	}

	echo "</table>";
	/*TERMINA PERSONAL*/




	echo "   	</div>";//cajaareas

	echo "<br>";

	echo "  </div>";//div contenido_cont
	echo "</div>";//div contenedor



	echo" </body>";
	echo" </html>";
?>