<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Carga de Archivos</title>

        <meta name="author" content="Humberto Antonio Franco Tapia © 2016.">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">

    </head>
    <body>
        <div class="container-fluid">
	        <div class="row">
            <?php
                session_start();
                include("config.inc.php");
                $connect = mysql_connect($dbhost, $dbuser, $dbpass);
                mysql_select_db($dbname, $connect);
                
                if(isset($_POST['regresar']))
                {
                    $clave  = $_SESSION['clave'];
                    header("Location: obra_nuevo.php?clave=$clave");
                }
                else
                {
                    if (isset($_FILES['archivo_foto']['name']))
                    {
                        if ($_FILES['archivo_foto']["error"] > 0)
                        {
                            echo "Error: ".$_FILES['archivo_foto']['error']."<br/>";
                        }
                        else
                        {
                            $id                 = $_SESSION['id'];
                            $clave              = $_SESSION["clave"];
                            $ruta               = "fotos/";
                            $tipo_archivo       = $_FILES['archivo_foto']['type'];
                            $nombre_archivo     = $clave."_".$id."_".$_FILES['archivo_foto']['name'];
                            $nombre_original    = $_FILES['archivo_foto']['name'];
                            $extension          = end(explode(".", $_FILES['archivo_foto']['name']));
                            $usuario            = $_SESSION['usuario'];
                            $descripcion        = $_REQUEST['descripcion'];
                            $descripcion        = "$descripcion";
                            $size_file          = $_FILES['archivo_foto']['size'];

                /*
                echo "id: ".$id."<br>";
                echo "clave: ".$clave."<br>";
                echo "ruta: ".$ruta."<br>";
                echo "tipo: ".$tipo_archivo."<br>";
                echo "nombre: ".$nombre_archivo."<br>";
                echo "archivo original: ".$nombre_original."<br>";
                echo "ext: ".$extension."<br>";
                echo "usuario: ".$usuario."<br>";
                echo "descripcion: ".$descripcion."<br>";
                */
                            if (($extension == "jpg" || $extension == "png" || $extension == "jpeg") && $size_file <= 1024000)
                            {
                                move_uploaded_file($_FILES['archivo_foto']['tmp_name'], $ruta.$nombre_archivo);

                                $insFoto = mysql_query("insert into fotos (id_conse_obra, ruta, nombre_archivo, nombre_original, tipo_archivo, extension, usuario, descripcion) values 
                                ($id, '$ruta', '$nombre_archivo', '$nombre_original', '$tipo_archivo', '$extension', '$usuario', '$descripcion')", $connect) or die ("Error: ".mysql_error());

                                header ("Location: cargar_fotos.php?id=$id&&clave=$clave");
                            }
                            else
                            {
                                echo "<div class=\"form-group\">";
                                echo "<div class=\"col-md-12\">";
                                echo "<center><h1>El archivo es mayor a 1 Mb o no es imagen (jpg, png)</h1></center>";
                                echo "<center><a href=\"cargar_fotos.php?id=$id&&clave=$clave\" id=\"regresar\" name=\"regresar\" class=\"btn btn-warning\">Regresar</a></center>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                    }
                }
            ?>
            </div>
        </div>
    </body>
</html>