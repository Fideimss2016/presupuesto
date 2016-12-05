<?php
	/*
	$usuario_sistema = "Humberto Antonio Franco Tapia";
	$clave="99000";
	$tipo_usuario="ADM";
	*/
	session_start();

	if(isset($_SESSION["usuario_sistema"]))
	{
		$usuario_sistema = $_SESSION["usuario_sistema"];
	}
	if(isset($_SESSION["clave"]))
	{
		$clave = $_SESSION["clave"];
	}
	if(isset($_SESSION["tipo_usuario"]))
	{
		$tipo_usuario = $_SESSION["tipo_usuario"];
	}
	if(isset($_SESSION["id_usuario"]))
	{
		$id_usuario = $_SESSION["id_usuario"];
	}
	if(isset($_SESSION["usuario"]))
	{
		$usuario = $_SESSION["usuario"];
	}

	if (isset($_REQUEST['id_conse_obra']))
	{
		$id_conse_obra = $_REQUEST['id_conse_obra'];
		$_SESSION["id_conse_obra"] = $id_conse_obra;
		include("config.inc.php");
		$query = "select * from obras where activo = 1 and clave = '$clave' and id_conse_obra = '$id_conse_obra'";
		mysql_select_db($dbname);
		$result = mysql_query($query);
		while ($registro = mysql_fetch_array($result)) 
		{
			$tipo_proyecto_id = $registro['tipo_proyecto_id'];
			$tipo_gasto_id = $registro['tipo_gasto_id'];
			$tipo_equipo_id = $registro['tipo_equipo_id'];
			$clave_act = $registro['clave_act'];
			$actividad_id = $registro['actividad_id'];
//			echo $clave_act;
//			echo $actividad_id;
			if ($actividad_id == 0 && $clave_act!= 0)
			{
				$clave_actividad = $clave_act;
			}
			elseif ($actividad_id != 0 && $clave_act == 0)
			{
				$clave_actividad = $actividad_id;
			}
			$_SESSION["clave_actividad"] = $clave_actividad;
			$cantidad = $registro['cantidad'];
			$unidad = $registro['unidad'];
			$observaciones = $registro['observaciones'];
			$monto = $registro['monto'];
			$beneficio_id = $registro['beneficio_id'];
			$periodo = $registro['periodo'];
			$curso_id = $registro['curso_id'];
			$num_grupos = $registro['num_grupos'];
			$usuarios_grupo = $registro['usuarios_grupo'];
			$total_usuarios = $registro['total_usuarios'];
			$ingresos_inscripcion = $registro['ingresos_inscripcion'];
			$cuotas_recuperacion = $registro['cuotas_recuperacion'];
			$uso_espacio = $registro['uso_espacio'];
			$total_ingresos = $registro['total_ingresos'];
		}
	}

	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\">";
	//echo "	<div align=\"right\"><span clas=\"blue\">Bienvenido $usuario_sistema $tipo_usuario</span></div>";
	//echo "	<input type=\"hidden\" name=\"usuario_sistema\" value=\"$usuario_sistema\">";
	//echo "	<input type=\"hidden\" name=\"clave\" value=\"$clave\">";
	//echo "	<input type=\"hidden\" name=\"tipo_usuario\" value=\"$tipo_usuario\">";

	function idpadre($nombre,$valor)
	{
		include("config.inc.php");
		//$query = "SELECT tipo_proyecto_id, partida, tipo_proyecto from cat_tipo_proyecto where anio = 2015 and activo = 1 order by partida";
		$query = "select conse_partidas as tipo_proyecto_id, clave_par as partida, desc_par as tipo_proyecto from cat_partidas_e where obra = 1 order by clave_par";
		mysql_select_db($dbname);
		$result = mysql_query($query);
		echo "<select name='$nombre' id='$nombre'>";
		echo "<option value=''>Selecciona un tipo de proyecto...</option>";
		while($registro=mysql_fetch_array($result))
		{
			echo "<option value='".$registro["tipo_proyecto_id"]."'";
			if ($registro["tipo_proyecto_id"]==$valor) echo " selected";
			echo ">".$registro["partida"]." ".utf8_encode($registro["tipo_proyecto"])."</option>\r\n";
		}
		echo "</select>";
	}

	function idhijo($nombre,$valor)
	{
		include("config.inc.php");
		$query = "SELECT tipo_gasto_id, tipo_gasto FROM cat_tipo_gasto where anio = 2015 and activo = 1 order by tipo_gasto";
		mysql_select_db($dbname);
		$result = mysql_query($query);
		echo "<select name='$nombre' id='$nombre'>";
		echo "<option value=''>Selecciona un tipo de gasto...</option>";
		while($registro=mysql_fetch_array($result))
		{
			echo "<option value='".$registro["tipo_gasto_id"]."'";
			if ($registro["tipo_gasto_id"]==$valor) echo " selected";
			echo ">".utf8_encode($registro["tipo_gasto"])."</option>\r\n";
		}
		echo "</select>";
	}

	function idnieto($nombre,$valor)
	{
		include("config.inc.php");
		$query = "SELECT tipo_equipo_id, tipo_equipo_requerido_trabajo FROM cat_tipo_equipo_requerido_trabajos where anio = 2015 and activo = 1 order by tipo_equipo_requerido_trabajo";
		mysql_select_db($dbname);
		$result = mysql_query($query);
		echo "<select name='$nombre' id='$nombre'>";
		echo "<option value=''>Selecciona un tipo de equipo...</option>";
		while($registro=mysql_fetch_array($result))
		{
			echo "<option value='".$registro["tipo_equipo_id"]."'";
			if ($registro["tipo_equipo_id"]==$valor) echo " selected";
			echo ">".utf8_encode($registro["tipo_equipo_requerido_trabajo"])."</option>\r\n";
		}
		echo "</select>";
	}
	function idactividad($nombre, $valor)
	{
		include("config.inc.php");
		$query="SELECT conse_act as actividad_id, concat(clave_act, '     ', actividad) as actividad FROM cat_actividades_i where anio = 2016 and activo = 1 order by actividad";
		mysql_select_db($dbname);
		$result=mysql_query($query);
		echo "<select name='$nombre' id='$nombre'>";
		echo "<option value=''>Selecciona...</option>";
		while($registro=mysql_fetch_array($result))
		{
			echo "<option value='".$registro["actividad_id"]."'";
			if ($registro["actividad_id"]==$valor) echo "selected";
			echo ">".utf8_encode($registro["actividad"])."</option>\r\n";
		}
		echo "</select>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Captura de Obra y Adquisición del Presupuesto 2016</title>
	<script type="text/javascript" src="jquery.js"></script>

	<script type="text/javascript">
		function OcultarTextBox(beneficio_id){
			element = document.getElementById("ingresos");
			if (document.getElementById("beneficio_id").value==3) {
				element.style.display='block';
			} else {
				element.style.display='none';
			}
		}
	</script>

	<script type="text/javascript">
		function numeros(e){
			key = e.keyCode || e.which;
			tecla = String.fromCharCode(key).toLowerCase();
			letras = "0123456789";
			especiales = [8, 37, 39, 46];

			tecla_especial = false
			for(var i in especiales){
				if(key == especiales[i]){
					tecla_especial = true;
					break;
				}
			}
			if(letras.indexOf(tecla)==-1 && !tecla_especial)
				return false;
		}
	</script>

	<script type="text/javascript">
		function CalcUsuarios(form){
			form.TotalCursos.value = form.num_grupos.value * form.usuarios_grupo.value;
			return;			
		}
	</script>

	<script type="text/javascript">
		function CalcIngresos(form){
			form.TotalIngresos.value = parseInt(form.ingresos_inscripcion.value) + parseInt(form.cuotas_recuperacion.value) + parseInt(form.uso_espacio.value);
			return;
		}
	</script>

	<script type="text/javascript">
	$(document).ready(function() {
		/* COMBOBOX */
		$("#tipo_proyecto_id").change(function(event)
		{
			var tipo_proyecto_id = $(this).find(':selected').val();
			$("#pidhijo").html("<img src='loading.gif' />");
			$("#pidhijo").load('combobox.php?buscar=hijos&tipo_proyecto_id='+tipo_proyecto_id);
			var tipo_gasto_id = $("#tipo_gasto_id").find(':selected').val();
			$("#pidnieto").html("<img src='loading.gif' />");
			$("#pidnieto").load('combobox.php?buscar=nietos&tipo_gasto_id='+tipo_gasto_id);
			$("#pidactividad").html("<img src='loading.gif' />");
			$("#pidactividad").load('combobox.php?buscar=actividad&tipo_proyecto_id='+tipo_proyecto_id);
		});
		$("#tipo_gasto_id").live("change",function(event)
		{
			var tipo_gasto_id = $(this).find(':selected').val();
			$("#pidnieto").html("<img src='loading.gif' />");
			$("#pidnieto").load('combobox.php?buscar=nietos&tipo_gasto_id='+tipo_gasto_id);
		});
	});
	</script>

	<link rel="stylesheet" type="text/css" href="contenido.css">
</head>
	<body>
		<!--<div id="contenedor">-->
			<div id="contenido_cont">
				<h3>Captura de Obra y Equipamiento Deportivo del Presupuesto 2016</h3>
				<h2>Registro de Obra y Equipamiento Deportivo</h2>
				<!--
				<p class="spwhite">
					<b>Paso 1</b>
					"Capture los datos que a continuación se le solicitan"
				</p>
			-->
				<div id="cajaareas">
					<form name="form1" method="post" action="actualizar.php">
					<fieldset>
						<p><label class="spgrey">Tipo de proyecto:</label><?php idpadre("tipo_proyecto_id", $tipo_proyecto_id); ?></p>
						<p id="pidhijo"><label class="spgrey">Tipo de gasto:</label><?php idhijo("tipo_gasto_id", $tipo_gasto_id); ?></p>
						<p id="pidnieto"><label class="spgrey">Tipo de trabajos:</label><?php idnieto("tipo_equipo_id", $tipo_equipo_id); ?></p>
						<p id="pidactividad"><label class="spgrey">Actividad beneficiada:</label><?php idactividad("actividad_id", $clave_actividad); ?></p>
						<table>
							<tr>
								<td>
									<input type="hidden" name="id_conse_obra" value =<?php echo $id_conse_obra; ?></input>
								</td>
								<td>
									<label for="cantidad" class="spgrey">Cantidad:</label>
								</td>
								<td>
									<input type="text" name="cantidad" id="cantidad" onkeypress="return numeros(event)" value=<?php echo $cantidad; ?>></input>
								</td>
								<td>
									<label for="unidad" class="spgrey">Unidad:</label>
								</td>
								<td>
									<select name="unidad" id="unidad">
										<?php
											include("config.inc.php");
											$query = "Select desc_unidades from cat_unidades desc_unidades";
											mysql_select_db($dbname);
											$result = mysql_query($query);
											echo "<option value=''></option>";
											while ($registro = mysql_fetch_array($result))
											{
												if ($registro['desc_unidades'] == $unidad)
												{
													echo "<option selected= 'selected' value = '".$registro["desc_unidades"]."'";
													echo ">".utf8_encode(strtoupper($registro["desc_unidades"]))."</option>\r\n";
												}
												else
												{
													echo "<option value='".$registro["desc_unidades"]."'";
													echo ">".utf8_encode(strtoupper($registro["desc_unidades"]))."</option>\r\n";
												}
											}
											echo "</select>";
										?>
								</td>
							</tr>
							<tr>
								<td>
										<label for="observaciones" class="spgrey">Descripción:</label>
								</td>
								<td>
										<!--<input type="text" name="observaciones" size="80" value=?php echo $observaciones; ?>></input>-->
										<input type="text" name="observaciones" value=<?php echo $observaciones; ?>>
								</td>
							</tr>
							<tr>
								<td>
									<label for="monto" class="spgrey">Monto de inversión:</label>
								</td>
								<td>
									<input type="text" name="monto" onkeypress="return numeros(event)" value=<?php echo number_format($monto, 2, '.', ','); ?>></input>
								</td>
							</tr>
							<tr>
								<td>
									<label for="beneficio_id" class="spgrey">Beneficios esperados:</label>
								</td>
								<td>
									<select name="beneficio_id" id="beneficio_id" onchange="javascript:OcultarTextBox(this);" required>
									<!--	
										<option value=''>Selecciona el tipo de beneficio...</option>
										<option value='1'>Atención a quejas de usuarios</option>
										<option value='2'>Atención de observaciones</option>
										<option value='3'>Incremento de ingresos</option>
										<option value='4'>Mejora de imagen</option>
										<option value='5'>Prevención de accidentes</option>
									-->
									<?php
										include("config.inc.php");
										$query = "select beneficio_id, beneficio from cat_beneficios where activo = 1 order by beneficio_id";
										mysql_select_db($dbname);
										$result = mysql_query($query);
										echo "<option value=''></option>";
										while ($registro = mysql_fetch_array($result))
										{
											if($registro['beneficio_id'] == $beneficio_id)
											{
												echo "<option selected ='selected' value = '".$registro['beneficio_id']."'";
												echo ">".utf8_encode($registro['beneficio'])."</option>\r\n";
											}
											else
											{
												echo "<option value='".$registro['beneficio_id']."'";
												echo ">".utf8_encode($registro['beneficio'])."</option>\r\n";
											}
										}
										echo "</select>";
									?>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<label for="periodo" class="spgrey">Periodo de recuperacion:</label>
								</td>
								<td>
									<!--<input type="text" name="periodo" id="periodo" size="60" value=?php echo $periodo; ?>></input>-->
									<input type="text" name="periodo" id="periodo" value=<?php echo $periodo; ?>></input>
								</td>
							</tr>
							<tr>
								<td>
									<p id="pidcursos"><label class="spgrey">Cursos:</label>
								</td>
								<td>
									<select name="curso_id" id="curso_id" required>
										<?php
											include("config.inc.php");
											$query = "Select conse_act as curso_id, clave_act, actividad from cat_actividades_i where activo = 1 order by actividad";
											mysql_select_db($dbname);
											$result = mysql_query($query);
											echo "<option value=''>Selecciona un curso...</option>";
											while ($registro = mysql_fetch_array($result))
											{
												echo "<option value='".$registro["curso_id"]."'";
												echo ">".utf8_encode($registro["actividad"])."</option>\r\n";
											}
											echo "</select>";
										?>
								</td>
							</tr>
							<tr>
								<td>
									<label class="spgrey" for="num_grupos">No. de grupos programados:</label>
								</td>
								<td>
									<input id="num_grupos" name="num_grupos" type="text" onkeypress="return numeros(event)" onkeyup=CalcUsuarios(this.form) value=<?php echo $num_grupos; ?>></input>
								</td>
							<tr>
							</tr>
								<td>
									<label class="spgrey" for="usuarios_grupo">No. de usuarios por grupo:</label>
								</td>
								<td>
									<input id="usuarios_grupo" name="usuarios_grupo" type="text" onkeypress="return numeros(event)" onkeyup=CalcUsuarios(this.form) value=<?php  echo $usuarios_grupo; ?>></input>
								</td>
							</tr>
							<tr>
								<td>
									<label class="spgrey" for="TotalCursos">Total de usuarios:</label>
								</td>
								<td>
									<input type="text" name="TotalCursos" id="TotalCursos" value=<?php echo $total_usuarios; ?> readonly=""></input>
								</td>
							</tr>
						</table>
						<div id="ingresos" style="display:none;">
							<table>
								<tr>
									<td>
										<label class="spgrey" for="ingresos_inscripcion">Ingresos por inscripción:</label>
									</td>
									<td>
										<input id="ingresos_inscripcion" name="ingresos_inscripcion" type="text" onkeypress="return numeros(event)" onkeyup=CalcIngresos(this.form) value=<?php echo number_format($ingresos_inscripcion, 2, '.', ','); ?>></input>
									</td>
									<td>
										<label class="spgrey" for="cuotas_recuperacion">Ingresos cuotas de recuperación:</label>  
									</td>
									<td>
										<input id="cuotas_recuperacion" name="cuotas_recuperacion" type="text" onkeypress="return numeros(event)" onkeyup=CalcIngresos(this.form) value=<?php echo number_format($cuotas_recuperacion, 2, '.', ','); ?>></input>
									</td>
								</tr>
								<tr>
									<td>
										<label class="spgrey" for="uso_espacio">Ingresos por uso de espacio:</label>
									</td>
									<td>
										<input id="uso_espacio" name="uso_espacio" type="text" onkeypress="return numeros(event)" onkeyup=CalcIngresos(this.form) value=<?php echo number_format($uso_espacio, 2, '.',','); ?>></input>
									</td>
									<td>
										<label class="spgrey" for="TotalIngresos">Total:</label>
									</td>
									<td>
										<input type="text" name="TotalIngresos" id="TotalIngresos" readonly="" value=<?php echo number_format($total_ingresos, 2, '.', ','); ?>></label>
									</td>
								</tr>
							</table>
						</div>
						<p align="center"><input type="submit" name="submit" value="Actualizar"/></p>
					</fieldset>
				</form>
			</div>
			</div>
			<?php include("detalleo_nuevo.php"); ?>
		<!--</div>-->
	</body>
</html>