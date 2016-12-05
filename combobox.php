<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
//	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\">";
	include 'config.inc.php';

	if ($_GET[buscar]=="hijos")
	{
		$consulta="select tipo_gasto_id, tipo_gasto from cat_tipo_gasto WHERE anio = 2015 and partida_e_id='".mysql_real_escape_string(intval($_GET["tipo_proyecto_id"]))."' order by tipo_gasto";
		mysql_select_db($dbname);
		$todos=mysql_query($consulta);
		
		if($_GET["tipo_proyecto_id"]=="10")//Bienes muebles 0501
		{
			echo "<label class=\"col-md-4 control-label\" for=\"tipo_proyecto_id\">Tipo de bien</label><select name='tipo_gasto_id' id='tipo_gasto_id' class='form-control' required>";
			echo "<option value=''>Selecciona un bien</option>";
		}
		elseif($_GET["tipo_proyecto_id"]=="5")//Mantenimiento de equipo 0311
		{
			echo "<label class=\"col-md-4 control-label\" for=\"tipo_proyecto_id\">Tipo de gasto</label><select name='tipo_gasto_id' id='tipo_gasto_id' class='form-control' required>";
			echo "<option value=''>Selecciona un tipo de gasto...</option>";
		}
		elseif($_GET["tipo_proyecto_id"]=="11")//Obra pública 0601
		{
			echo "<label class=\"col-md-4 control-label\" for=\"tipo_proyecto_id\">Tipo de gasto</label><select name='tipo_gasto_id' id='tipo_gasto_id' class='form-control' required>";
			echo "<option value=''>Selecciona un tipo de gasto...</option>";
		}
		elseif($_GET["tipo_proyecto_id"]=="12")//Mantenimiento de inmuelbes 0602
		{
			echo "<label class=\"col-md-4 control-label\" for=\"tipo_proyecto_id\">Tipo de gasto</label><select name='tipo_gasto_id' id='tipo_gasto_id' class='form-control' required>";
			echo "<option value=''>Selecciona un tipo de gasto...</option>";
		}
		elseif($_GET["tipo_proyecto_id"]=="13")//Mantenimiento de instalaciones hidráulicas 0603
		{
			echo "<label class=\"col-md-4 control-label\" for=\"tipo_proyecto_id\">Tipo de gasto</label><select name='tipo_gasto_id' id='tipo_gasto_id' class='form-control' required>";
			echo "<option value=''>Selecciona un tipo de gasto...</option>";
		}

		while($registro=mysql_fetch_array($todos))
		{
			// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
			// Imprimo las opciones del select
			echo "<option value='".$registro["tipo_gasto_id"]."'";
			if ($registro["tipo_gasto_id"]==$valoractual) echo " selected";
			echo ">".utf8_encode($registro["tipo_gasto"])."</option>";
		}
		echo "</select>";
	}

	if ($_GET[buscar]=="nietos")
	{
		$consulta="select partida_e_id from cat_tipo_gasto where tipo_gasto_id=".mysql_real_escape_string(intval($_GET["tipo_gasto_id"]));
		mysql_select_db($dbname);
		$todos=mysql_query($consulta);
		while($registro=mysql_fetch_array($todos))
		{
			$tipproy=$registro["partida_e_id"];
		}

		$consulta="select tipo_equipo_id, tipo_equipo_requerido_trabajo from cat_tipo_equipo_requerido_trabajos WHERE tipo_gasto_id='".mysql_real_escape_string(intval($_GET["tipo_gasto_id"]))."' and activo = 1 order by tipo_equipo_requerido_trabajo";
		mysql_select_db($dbname);
		$todos=mysql_query($consulta);
		
		// Comienzo a imprimir el select
		if($tipproy=="10")
		{
			echo "<label class=\"col-md-4 control-label\" for=\"tipo_proyecto_id\">Equipo requerido</label><select name='tipo_equipo_id' id='tipo_equipo_id' class='form-control' required>";
			echo "<option vaue=''>Selecciona el equipo requerido</option>";
		}
		elseif($tipproy=="5")
		{
			echo "<label class=\"col-md-4 control-label\" for=\"tipo_proyecto_id\">Servicio requerido</label><select name='tipo_equipo_id' id='tipo_equipo_id' class='form-control' required>";
			echo "<option vaue=''>Selecciona el servicio requerido</option>";
		}
		elseif($tipproy=="11" || $tipproy == "12" || $tipproy == "13")
		{
			echo "<label class=\"col-md-4 control-label\" for=\"tipo_proyecto_id\">Tipo de trabajos</label><select name='tipo_equipo_id' id='tipo_equipo_id' class='form-control' required>";
			echo "<option vaue=''>Selecciona el trabajo requerido</option>";
		}
			
		while($registro=mysql_fetch_array($todos))
		{
			// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
			// Imprimo las opciones del select
			echo "<option value='".$registro["tipo_equipo_id"]."'";
			if ($registro["tipo_equipo_id"]==$valoractual) echo " selected";
			echo ">".utf8_encode($registro["tipo_equipo_requerido_trabajo"])."</option>";
		}
		echo "</select>";
	}

	if ($_GET[buscar]=="actividad")
	{
		if(mysql_real_escape_string($_GET["tipo_proyecto_id"]=="10"))
		{
			$consulta="SELECT conse_act as actividad_id, actividad FROM cat_actividades_i where activo = 1 order by actividad;";
			mysql_select_db($dbname);
			$todos=mysql_query($consulta);
			echo "<label class=\"col-md-4 control-label\" for=\"tipo_proyecto_id\">Actividad beneficiada</label><select name='actividad_id' id='actividad_id' class='form-control' required>";
			echo "<option value=''>Selecciona la actividad</option>";
		}
		elseif(mysql_real_escape_string($_GET["tipo_proyecto_id"]=="5"))
		{
			$consulta="SELECT actividad_id, actividad FROM cat_act_equipo_area where activo = 1 and partida_e_id = '".mysql_real_escape_string(intval($_GET["tipo_proyecto_id"]))."' order by actividad;";
			mysql_select_db($dbname);
			$todos=mysql_query($consulta);
			echo "<label class=\"col-md-4 control-label\" for=\"tipo_proyecto_id\">Tipo de equipo</label><select name='actividad_id' id='actividad_id' class='form-control' required>";
			echo "<option value=''>Selecciona el equipo</option>";
		}
		elseif(mysql_real_escape_string($_GET["tipo_proyecto_id"]=="11") || mysql_real_escape_string($_GET["tipo_proyecto_id"]=="12") || mysql_real_escape_string($_GET["tipo_proyecto_id"]=="13"))
		{
			$consulta="SELECT actividad_id, actividad FROM cat_act_equipo_area where activo = 1 and partida_e_id = '".mysql_real_escape_string(intval($_GET["tipo_proyecto_id"]))."' order by actividad;";
			mysql_select_db($dbname);
			$todos=mysql_query($consulta);
			echo "<label class=\"col-md-4 control-label\" for=\"tipo_proyecto_id\">Area deportiva</label><select name='actividad_id' id='actividad_id' class='form-control' required>";
			echo "<option value=''>Selecciona el área deportiva</option>";
		}

		while($registro=mysql_fetch_array($todos))
		{
			echo "<option value='".$registro["actividad_id"]."'";
			if($registro["actividad_id"]==$valoractual) echo " selected";
			echo ">".utf8_encode($registro["actividad"])."</option>";
		}
	}
?>