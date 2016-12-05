<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include 'config.inc.php';

	if ($_GET[buscar] == "cursos")
	{
		$consulta = "select id_tipo_curso, desc_tipo_curso from cat_tipo_curso_i WHERE id_tipo_curso in (select tipo_curso_id from t_clave_act_curso where clave_act = '".mysql_real_escape_string(intval($_GET["actividad_id"]))."' order by desc_tipo_curso";
		mysql_select_db($dbname);
		$todos = mysql_query($consulta);
		
		echo "	<div class=\"form-group\" id=\"pidcurso\">
					<label class=\"col-md-4 control-label\" for=\"curso_id\" style=\"text-align: right\">Curson</label>
					<div class=\"col-md-8\">
						<select name='curso_id' id='curso_id' class='form-control' required>";
		echo "				<option value=''>Selecciona un curso</option>";
		while($registro = mysql_fetch_array($todos))
		{
			echo "			<option value='".$registro["tipo_gasto_id"]."'";
			if ($registro["tipo_gasto_id"] == $valoractual) echo " selected";
			echo ">".utf8_encode($registro["tipo_gasto"])."</option>";
		}
		echo "			</select>
					</div>
				</div>";
	}

	if ($_GET[buscar] == "tipopago")
	{
		$consulta = "select id_tipo_pago, desc_tipo_pago from cat_tipo_pago_i where id_tipo_pago in (select tipo_pago_id from t_clave_act_tipo_pago where clave_act = '".mysql_real_escape_string(intval($_GET["actividad_id"]))."' order by desc_tipo_pago";
		mysql_select_db($dbname);
		$todos = mysql_query($consulta);
		while($registro = mysql_fetch_array($todos))
		{
			echo "	<div class=\"form-group\" id=\"pidtipopago\">
						<label class=\"col-md-4 control-label\" for=\"tipo_equipo_id\" style=\"text-align: right\">Equipo requerido</label>
						<div class=\"col-md-8\">
							<select name='tipo_equipo_id' id='tipo_equipo_id' class='form-control' required>";
			echo "				<option vaue=''>Selecciona el equipo requerido</option>";
		}
		echo "				</select>
						</div>
					</div>";
	}

	if ($_GET[buscar]=="instalaciones")
	{
		if (mysql_real_escape_string(intval($_GET['instalacion']) == 1))
		{
			$consulta="select conse, desc_nombre from instalaciones where clave='".mysql_real_escape_string($_GET["clave"])."' and  convenio='682527' order by conse;";
			mysql_select_db($dbname);
			$todos=mysql_query($consulta);
			echo "	<div class=\"form-group\" id=\"pidinstalaciones\">
						<label class=\"col-md-4 control-label\" for=\"instalaciones_id\" style=\"text-align: right\">Instalación</label>
						<div class=\"col-md-8\">
							<select name='instalaciones_id' id='instalaciones_id' class='form-control' required>";
			echo "				<option value=''>Selecciona la instalación</option>";

			while($registro=mysql_fetch_array($todos))
			{
				echo "<option value='".$registro["actividad_id"]."'";
				if($registro["actividad_id"]==$valoractual) echo " selected";
				echo ">".utf8_encode($registro["actividad"])."</option>";
			}
			echo " 				</select>
							</div>
						</div>";
		}
	}
?>