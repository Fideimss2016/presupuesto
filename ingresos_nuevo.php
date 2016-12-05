<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Captura de Ingresos del Presupuesto 2017</title>

        <meta name="author" content="Humberto Antonio Franco Tapia © 2016.">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#clave_act").change(function(event)
                {
                    var clave_act = $(this).find(':selected').val();
                    $("#pidcurso").html("<img src='loading.gif' />");
                    $("#pidcurso").load('combobox_ingresos.php?buscar=cursos&clave_act=' + clave_act);

                    $("#pidtipopago").html("<img src='loading.gif' />");
                    $("#pidtipopago").load('combobox_ingresos.php?buscar=tipopago&clave_act=' + clave_act);

                    $("#pidinstalaciones").html("<img src='loading.gif' />");
                    $("#pidinstalaciones").load('combobox_ingresos.php?buscar=instalaciones&clave_act=' + clave_act);
                });
            });
        </script>
    </head>
    <body>
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
		    <div class="col-md-12">
			    <form role="form" action="guardar.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Registro de Obra y Equipamiento Deportivo 2017</legend>
                        <div class="form-group" id="pidactividad">
                            <label class="col-md-4 control-label" for="clave_act" style="text-align: right">Actividad</label>
                            <div class="col-md-8">
                                <?php
                                     include("config.inc.php");
                                    $connect = mysql_connect($dbhost, $dbuser, $dbpass);
                                    mysql_select_db($dbname, $connect);
                                    mysql_set_charset("utf-8");
                                    $query = mysql_query("SELECT conse_act, clave_act, actividad, id_tipo_act, cvr from cat_actividades_i where activo = 1 order by clave_act", $connect);
                                    $totRegs = mysql_num_rows($query);
                                    while($actividad = mysql_fetch_array($query))
                                    {
                                        $clave_act = $actividad['clave_act'];
                                        $actividad = $actividad['actividad'];
                                        $id_tipo_act = $actividad['id_tipo_act'];
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group" id="pidcurso">
                            <div class="col-md-12">&nbsp</div>
                        </div>
                        <div class="form-group" id="pidtipopago">
                            <div class="col-md-12">&nbsp</div>
                        </div>
                        <div class="form-group" id="pidinstalaciones">
                            <div class="col-md-12">&nbsp</div>
                        </div>