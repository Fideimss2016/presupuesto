<?php 
echo" <html>";
echo" <head>";
echo" <title>Presupuesto 2016</title>";
echo" </head>";
include "top.html";

echo" <center>";
echo" <body>";
echo" <h1> .:Presupuesto 2016:. </h1>";
echo" <h3><font color=\"#cc0000\"> Sistema cerrado para usuarios de captura </font></h3>";

if ($_GET["errorusuario"]=="si")
{
echo" <font color=\"red\"><b>Datos incorrectos</b></font>";
}
else
{
echo" Introduce tu nombre de usuario y contrase&ntilde;a";
}
echo" <form action=\"autentication.php\" method=\"POST\">";

echo" <table border=\"0\">";
echo" <tr><td>Nombre de usuario:</td><td><input name=\"usu\" size=\"25\" value=\"\"/></td></tr>";
echo" <tr><td>Contrase&ntilde;a:</td><td><input name=\"contrasena\" size=\"25\" type=\"password\"/></td></tr>";
echo" <tr><td/><td><input type=\"submit\" value=\"Iniciar de sesi&oacute;n\"/></td></tr>";
echo" </table>";
echo" </form>";
echo" </body>";
echo" </center>";
echo" </html>";
?>