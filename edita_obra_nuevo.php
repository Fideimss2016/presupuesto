<?php
	session_start();

	include("config.inc.php");
	$connect = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname, $connect);
	mysql_set_charset("utf-8");

	if(isset($_SESSION["usuario_sistema"])) 	{$usuario_sistema 	= $_SESSION["usuario_sistema"];}
	if(isset($_SESSION["clave"])) 				{$clave 			= $_SESSION["clave"];}
	if(isset($_SESSION["tipo_usuario"])) 		{$tipo_usuario 		= $_SESSION["tipo_usuario"];}
	if(isset($_SESSION["id_usuario"])) 			{$id_usuario 		= $_SESSION["id_usuario"];}
	if(isset($_SESSION["usu"])) 				{$usuario 			= $_SESSION["usu"];}

	if (isset($_REQUEST['id_conse_obra']))
	{
		$id_conse_obra = $_REQUEST['id_conse_obra'];
		$_SESSION["id_conse_obra"] = $id_conse_obra;
		include("config.inc.php");
		$query = "select o.*, p.conse_partidas from obras o left join cat_partidas_e p on p.clave_par = o.clave_par where activo = 1  and clave = '$clave' and id_conse_obra = $id_conse_obra";
		mysql_select_db($dbname);
		$result = mysql_query($query);
		while ($registro = mysql_fetch_array($result)) 
		{
			$conse_partidas 	= $registro['conse_partidas'];
			$tipo_proyecto_id 	= $registro['tipo_proyecto_id'];
			$tipo_gasto_id 		= $registro['tipo_gasto_id'];
			$tipo_equipo_id 	= $registro['tipo_equipo_id'];
			$clave_act 			= $registro['clave_act'];
			$actividad_id 		= $registro['actividad_id'];
			$clave_par 			= $registro['clave_par'];

			if ($clave_par == "0311" || $clave_par == "0601" || $clave_par == "0602" || $clave_par == "0603")
			{
				$clave_actividad = $actividad_id;
			}
			else if ($clave_par == "0501")
			{
				$clave_actividad = $clave_act;
			}

			$_SESSION["clave_actividad"] 	= $clave_actividad;
			$cantidad 						= $registro['cantidad'];
			$unidad 						= $registro['unidad'];
			$observaciones 					= $registro['observaciones'];
			$monto 							= $registro['monto'];
			$beneficio_id 					= $registro['beneficio_id'];
			$periodo 						= $registro['periodo'];
			$curso_id 						= $registro['curso_id'];
			$num_grupos 					= $registro['num_grupos'];
			$usuarios_grupo 				= $registro['usuarios_grupo'];
			$total_usuarios 				= $registro['total_usuarios'];
			$ingresos_inscripcion 			= $registro['ingresos_inscripcion'];
			$cuotas_recuperacion 			= $registro['cuotas_recuperacion'];
			$uso_espacio 					= $registro['uso_espacio'];
			$total_ingresos 				= $registro['total_ingresos'];
/*
echo "Partida: ".$conse_partidas."<br>";
echo "Proyecto: ".$tipo_proyecto_id."<br>";
echo "Gasto: ".$tipo_gasto_id."<br>";
echo "Equipo: ".$tipo_equipo_id."<br>";
echo "Clave Actividad: ".$clave_act."<br>";
echo "Actividad id: ".$actividad_id."<br>";
echo "Clave partida: ".$clave_par."<br>";

echo "Clave act: ".$clave_actividad."<br>";
echo "Cantidad: ".$cantidad."<br>";
echo "Unidad: ".$unidad."<br>";
echo "Descripción: ".$observaciones."<br>";
echo "Monto: ".$monto."<br>";
echo "Beneficio: ".$beneficio_id."<br>";
echo "Periodo: ".$periodo."<br>";
echo "Curso: ".$curso_id."<br>";
echo "Grupos: ".$num_grupos."<br>";
echo "Usuarios: ".$usuarios_grupo."<br>";
echo "Total de usuarios: ".$total_usuarios."<br>";
echo "Inscripciones: ".$ingresos_inscripcion."<br>";
echo "Cuotas: ".$cuotas_recuperacion."<br>";
echo "Espacios: ".$uso_espacio."<br>";
echo "Ingresos: ".$total_ingresos."<br>";*/
		}
	}

	function idpadre($nombre,$valor)
	{
		include("config.inc.php");
		$query = "select conse_partidas as tipo_proyecto_id, clave_par as partida, desc_par as tipo_proyecto from cat_partidas_e where obra = 1 order by clave_par";
		mysql_select_db($dbname);
		$result = mysql_query($query);
		echo "<select name='$nombre' id='$nombre' class='form-control' required>";
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
		echo "<select name='$nombre' id='$nombre' class='form-control' required>";
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
		echo "<select name='$nombre' id='$nombre' class='form-control' required>";
		echo "<option value=''>Selecciona un tipo de equipo...</option>";
		while($registro=mysql_fetch_array($result))
		{
			echo "<option value='".$registro["tipo_equipo_id"]."'";
			if ($registro["tipo_equipo_id"]==$valor) echo " selected";
			echo ">".utf8_encode($registro["tipo_equipo_requerido_trabajo"])."</option>\r\n";
		}
		echo "</select>";
	}
	function idactividad($nombre, $valor, $partida, $id_partida)
	{
		include("config.inc.php");
		if ($partida == "0311" || $partida == "0601" || $partida == "0602" || $partida == "0603")
		{
			$query = "select actividad_id, actividad from cat_act_equipo_area where activo = 1 and partida_e_id = '$id_partida' order by actividad";
		}
		else if ($partida == "0501")
		{
			$query = "select clave_act as actividad_id, actividad from cat_actividades_i where anio = 2016 and activo = 1 and clave_act <> 0 order by actividad";
		}

		mysql_select_db($dbname);
		$result=mysql_query($query);
		echo "<select name='$nombre' id='$nombre' class='form-control' required>";
		echo "<option value=''>Selecciona...</option>";
		while($registro=mysql_fetch_array($result))
		{
			echo "<option value='".$registro["actividad_id"]."'";
			if ($registro["actividad_id"]==$valor) echo "selected";
			echo ">".utf8_encode($registro["actividad"])."</option>\r\n";
		}
		echo "</select>";
	}
	function idcurso($nombre, $valor)
	{
		include("config.inc.php");
		$query="SELECT conse_act as actividad_id, actividad FROM cat_actividades_i where anio = 2016 and activo = 1 and conse_act <> 0 order by actividad";
		mysql_select_db($dbname);
		$result=mysql_query($query);
		echo "<select name='$nombre' id='$nombre' class='form-control' required>";
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
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utlf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width-device-width, initial-scale=1">
		<title>Captura de Obra y Adquisición del Presupuesto 2017</title>
		<meta name="author" content="Humberto Antonio Franco Tapia © 2016.">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/style.css" rel="stylesheet">
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
				$("#pidhijo").load('combobox_nuevo.php?buscar=hijos&tipo_proyecto_id='+tipo_proyecto_id);
				var tipo_gasto_id = $("#tipo_gasto_id").find(':selected').val();
				$("#pidnieto").html("<img src='loading.gif' />");
				$("#pidnieto").load('combobox_nuevo.php?buscar=nietos&tipo_gasto_id='+tipo_gasto_id);
				$("#pidactividad").html("<img src='loading.gif' />");
				$("#pidactividad").load('combobox_nuevo.php?buscar=actividad&tipo_proyecto_id='+tipo_proyecto_id);
			});
			$("#tipo_gasto_id").live("change",function(event)
			{
				var tipo_gasto_id = $(this).find(':selected').val();
				$("#pidnieto").html("<img src='loading.gif' />");
				$("#pidnieto").load('combobox_nuevo.php?buscar=nietos&tipo_gasto_id='+tipo_gasto_id);
			});
		});
		</script>
	</head>
	<body onload="javascript:OcultarTextBox(<?php echo $beneficio_id; ?>)">
        <div class="container-fluid">
	        <div class="row">
		        <div class="col-md-12">
			        <div class="row">
				    <div class="col-md-4">
					    <img alt="FIDEIMSS" src="../assets/images/fide.jpg">
				    </div>
				    <div class="col-md-8">
					    <h3>
                            <center>
						        Captura de Obra y Equipamiento Deportivo del Presupuesto 2017
                            </center>
					    </h3>
				    </div>
			    </div>
		    </div>
	    </div>
		<div class="row">
			<form name="form" method="POST" action="actualizar.php" enctype="multipart/form-data">
				<fieldset>
					<legend>Registro de Obra y Equipamiento Deportivo 2017</legend>
					<div class="form-group" id="pidpadre">
						<label class="col-md-4 control-label" for="tipo_proyecto_id" style="text-align: right">Tipo de proyecto</label>
						<div class="col-md-8">
							<?php idpadre("tipo_proyecto_id", $tipo_proyecto_id); ?>
						</div>
					</div>
					<div class="form-group" id="pidhijo">
						<label class="col-md-4 control-label" for="tipo_gasto_id" style="text-align: right">Tipo de gasto:</label>
						<div class="col-md-8">
							<?php idhijo("tipo_gasto_id", $tipo_gasto_id); ?>
						</div>
					</div>
					<div class="form-group" id="pidnieto">
						<label class="col-md-4 control-label" for="tipo_equipo_id" style="text-align: right">Tipo de trabajos:</label>
						<div class="col-md-8">
							<?php idnieto("tipo_equipo_id", $tipo_equipo_id); ?>
						</div>
					</div>
					<?php 
						if($clave_par == "0311")
						{
							echo "	<div class=\"form-group\" id=\"pidactividad\">
										<label class=\"col-md-4 control-label\" for=\"actividad_id\" style=\"text-align: right\">Tipo de equipo:</label>
										<div class=\"col-md-8\">"; ?>
											<?php idactividad("actividad_id", $clave_actividad, $clave_par, $conse_partidas); ?>
								 		</div>
									</div>
						<?php }
						else if ($clave_par == "0601" || $clave_par == "0602" || $clave_par == "0603")
						{
							echo "	<div class=\"form-group\" id=\"pidactividad\">
										<label class=\"col-md-4 control-label\" for=\"actividad_id\" style=\"text-align: right\">Area deportiva:</label>
										<div class=\"col-md-8\">"; ?>
											<?php idactividad("actividad_id", $clave_actividad, $clave_par, $conse_partidas); ?>
										</div>
									</div>
						<?php }
						else if ($clave_par == "0501")
						{
							echo "	<div class=\"form-group\" id=\"pidactividad\">
										<label class=\"col-md-4 control-label\" for=\"actividad_id\" style=\"text-align: right\">Actividad beneficiada:</label>
										<div class=\"col-md-8\">"; ?>
											<?php idactividad("actividad_id", $clave_actividad, $clave_par, $conse_partidas); ?>
										</div>
									</div>
						<?php } ?>
					<input type="hidden" name="id_conse_obra" value =<?php echo $id_conse_obra; ?>></input>
					<div class="col-md-12">&nbsp</div>
					<label class="col-md-3 control-label" for="cantidad" style="text-align: right">Cantidad</label>
                    <div class="col-md-3">
                    	<input id="cantidad" name="cantidad" class="form-control input-md" type="text" onkeypress="return numeros(event)" value=<?php echo $cantidad; ?> style="text-align: right" required>
                    </div>
                    <label class="col-md-3 control-label" for="unidad" style="text-align: right">Unidad</label>
                    <div class="col-md-3">
                    	<select id="unidad" name="unidad" class="form-control" required>
                            <?php
                            	$query = mysql_query("SELECT desc_unidades from cat_unidades order by desc_unidades", $connect);
                                while($registro = mysql_fetch_array($query))
                                {
									echo 	"<option value='".$registro["desc_unidades"]."'";
									if ($registro["desc_unidades"] == $unidad) echo "selected";
									echo ">".utf8_encode(strtoupper($registro["desc_unidades"]))."</option>\r\n";
                                }
                            ?>
                        </select>
                    </div>
					<div class="col-md-12">&nbsp</div>
                    <label class="col-md-4 control-label" for="observaciones" style="text-align: right">Descripción</label>
                    <div class="col-md-8">
                    	<input id="observaciones" name="observaciones" class="form-control input-md" type="text" value='<?php echo $observaciones; ?>' required>
                    </div>
                    <div class="col-md-12">&nbsp</div>
                    <label class="col-md-3 control-label" for="monto" style="text-align: right">Monto de inversión</label>
                    <div class="col-md-3">
                    	<input id="monto" name="monto" class="form-control input-md" type="text" onkeypress="return numeros(event)" style="text-align: right" value=<?php echo $monto; ?> required>
                    </div>
                    <br/>
					<label class="col-md-3 control-label" for="beneficio_id" style="text-align: right">Beneficios esperados</label>
                    <div class="col-md-3">
                    	<select id="beneficio_id" name="beneficio_id" class="form-control" onchange="javascript:OcultarTextBox(this);" required>
							<option value=''>Selecciona el beneficio...</option>
                            <?php
                            	$query = mysql_query("SELECT beneficio_id, beneficio from cat_beneficios order by beneficio", $connect);
                                while($registro = mysql_fetch_array($query))
                                {
									echo 	"<option value='".$registro["beneficio_id"]."'";
									if($registro['beneficio_id']  == $beneficio_id) echo "selected";
									echo ">".utf8_encode($registro["beneficio"])."</option>\r\n";
								}
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12">&nbsp</div>
					<label class="col-md-4 control-label" for="periodo" style="text-align: right">Periodo de recuperación</label>
                    <div class="col-md-8">
                    	<input id="periodo" name="periodo" class="form-control input-md" type="text" value='<?php echo $periodo; ?>' required>
                    </div>
					<div class="col-md-12">&nbsp</div>
                    <label class="col-md-4 control-label" for="curso_id" style="text-align: right">Cursos</label>
                    <div class="col-md-8">
                    	<select id="curso_id" name="curso_id" class="form-control" required>
                        	<option value=''>Selecciona el curso</option>
                            <?php
                            	$query = mysql_query("SELECT conse_act as curso_id, concat(clave_act, ' - ', actividad) as actividad from cat_actividades_i where activo = 1 and conse_act not in (0, 9999) order by actividad", $connect);
                                while($registro = mysql_fetch_array($query))
                                {
									echo 	"<option value='".$registro["curso_id"]."'";
									if($registro['curso_id'] == $curso_id) echo "selected";
									echo ">".utf8_encode($registro["actividad"])."</option>\r\n";
								}
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12">&nbsp</div>
                    <label class="col-md-3 control-label" for="num_grupos" style="text-align: right">Grupos programados</label>
                    <div class="col-md-3">
                    	<input id="num_grupos" name="num_grupos" class="form-control input-md" type="text" onkeypress="return numeros(event)" onkeyup=CalcUsuarios(this.form) style="text-align: right" value=<?php echo $num_grupos; ?> required>
                    </div>                          
                    <label class="col-md-3 control-label" for="usuarios_grupo" style="text-align: right">Usuarios por grupo</label>
                    <div class="col-md-3">
                    	<input id="usuarios_grupo" name="usuarios_grupo" class="form-control input-md" type="text" required onkeypress="return numeros(event)" onkeyup=CalcUsuarios(this.form) style="text-align: right" value=<?php echo $usuarios_grupo; ?> required>
                    </div>
                    <div class="col-md-12">&nbsp</div>
                    <label class="col-md-3 control-label" for="TotalCursos" style="text-align: right">Total de usuarios</label>
                    <div class="col-md-3">
                    	<input id="TotalCursos" name="TotalCursos" class="form-control input-md" type="text" style="text-align: right" value=<?php echo $total_usuarios; ?> readonly="" required>
                    </div>
                    <div class="col-md-12">&nbsp</div>
					<div id="ingresos" style="display:none;">
                    	<label class="col-md-3 control-label" for="ingresos_inscripcion" style="text-align: right">Ingresos por inscripción</label>
                        <div class="col-md-3">
                        	<input id="ingresos_inscripcion" name="ingresos_inscripcion" class="form-control input-md" type="text" value=<?php echo $ingresos_inscripcion; ?> onkeypress="return numeros(event)" onkeyup=CalcIngresos(this.form) style="text-align: right">
                        </div>                          
                        <label class="col-md-3 control-label" for="cuotas_recuperacion" style="text-align: right">Ingresos (cuotas de recuperación)</label>
                        <div class="col-md-3">
                        	<input id="cuotas_recuperacion" name="cuotas_recuperacion" class="form-control input-md" type="text" value=<?php echo $cuotas_recuperacion; ?> onkeypress="return numeros(event)" onkeyup=CalcIngresos(this.form) style="text-align: right">
                        </div>
	                    <div class="col-md-12">&nbsp</div>
						<label class="col-md-3 control-label" for="uso_espacio" style="text-align: right">Ingresos por uso de espacio</label>
            	        <div class="col-md-3">
                	    	<input id="uso_espacio" name="uso_espacio" class="form-control input-md" type="text" value=<?php echo $uso_espacio; ?> onkeypress="return numeros(event)" onkeyup=CalcIngresos(this.form) style="text-align: right">
                    	</div>                          
                        <label class="col-md-3 control-label" for="TotalIngresos" style="text-align: right">Total</label>
                        <div class="col-md-3">
                        	<input id="TotalIngresos" name="TotalIngresos" class="form-control input-md" value=<?php echo $total_ingresos; ?> readonly="" type="text">
	                    </div>
    	                <div class="col-md-3">
        	            	&nbsp
            	        </div>
                	    <div class="col-md-3">
                    		&nbsp
                        </div>
                    </div>
       				<div class="col-md-12">&nbsp</div>
                    <label class="col-md-4 control-label" for="archivo_presupuesto" style="text-align: right">Seleccione el documento del proyecto (Presupuesto / Cotización)</label>
                    <div class="col-md-8">
                    	<input id="archivo_presupuesto" name="archivo_presupuesto" class="input-file" type="file">
                    </div>
                    <br/>
                    <div class="col-md-12">
                    	<center><input type="submit" class="btn btn-primary" id="submit" name="submit" value="Actualizar"></center>
                    </div>
				</fieldset>
			</form>
        	</div>
        	<?php include("detalleo_nuevo.php"); ?>
    	</div>
    </body>
</html>