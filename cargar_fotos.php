<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Carga de Fotografías</title>

        <meta name="author" content="Humberto Antonio Franco Tapia © 2016.">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">

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
						        Carga de Fotografías
                            </center>
					    </h3>
				    </div>
			    </div>
		    </div>
	    </div>
	    <div class="row">
		    <div class="col-md-12">
			    <form role="form" action="guardar_foto.php" method="POST" enctype="multipart/form-data">
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="archivo_foto">
                            Seleccione imagen para cargar al sistema
                        </label>
                        <input type="file" class="form-control" id="archivo_foto" name="archivo_foto">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">
                            Descripción de la imagen
                        </label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                        <br/>
                        <br/>
                        <center>
                            <input type="submit" class="btn btn-primary" id="guardar" name="guardar" value="Guardar imagen"/>
                            <input type="submit" class="btn btn-success" id="regresar" name="regresar" value="Regresar"/>    
                        </center>
                    </div>
                    <div class="carousel slide" data-ride="carousel">
                    <?php
                    session_start();

                    if(isset($_REQUEST['id']))
                    {
                        $clave                  = $_REQUEST["clave"];
                        $_SESSION["clave"]      = $clave;
                        $id                     = $_REQUEST["id"];
                        $_SESSION["id"]         = $id;
                        $usuario                = $_SESSION["usuario"];
                    }

                	include("config.inc.php");
                    $connect = mysql_connect($dbhost, $dbuser, $dbpass);
                    mysql_select_db($dbname, $connect);

                    if (isset($id))
                    {
                        $query  = mysql_query("select count(id_conse_obra) as registros from fotos where id_conse_obra = $id and activo = 1", $connect);
                        $tot_regs = mysql_num_rows($query);
                        while($dato = mysql_fetch_array($query))
                        {
                            $registros = $dato['registros'];
                        }

                        if ($registros > 0)
                        {
                            $fotos  = mysql_query("select fotos_id, ruta, nombre_archivo, nombre_original, descripcion from fotos where id_conse_obra = $id and activo = 1", $connect);
                            $tot_fotos = mysql_num_rows($fotos);
                            while ($dat = mysql_fetch_array($fotos))
                            {
                                $fotos_id           = $dat['fotos_id'];
                                $ruta               = $dat['ruta'];
                                $nombre_archivo     = $dat['nombre_archivo'];
                                $nombre_original    = $dat['nombre_original'];
                                $descripcion        = $dat['descripcion'];

                                echo "<div id=\"imagen_$fotos_id\"><center><img src=\"$ruta$nombre_archivo\" class=\"img-responsive\" width=\"300px\" height=\"150\"/><br/>
                                $descripcion<br/></center></div>";
                                echo "<div></div>";
                            }
                        }
                    }
                    ?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
