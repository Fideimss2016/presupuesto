<?php

include "valida_seguridad.php";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"jscripts/sddm.css\" >";

$tipo_usuario=$_SESSION['tipo_usuario'];

echo "<body bgcolor=\"#333\" background=\"imagenes/pat_menu.png\">";

echo "<div class=\"navbar\">";
echo "<div class=\"mainDiv\" >";
echo "<div class=\"topItem\" >Presupuesto 2016</div>";
echo "<div class=\"dropMenu\" >";
echo "	<div class=\"subMenu\" style=\"display:inline;\">";
if($tipo_usuario=='CAP')
{
echo "	    <div class=\"subItem\"><a href=\"ingresos.php\" target=\"mainFrame\">Captura de Ingresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"egresos.php\" target=\"mainFrame\">Captura de Egresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"obra.php\" target=\"mainFrame\">Captura de Obra y Equip.</a></div>";
echo "	    <div class=\"subItem\"><a href=\"personal.php\" target=\"mainFrame\">Captura de Personal</a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_css.php\" target=\"mainFrame\">Ver Resumen</a></div>";
}
else if($tipo_usuario=='ADM')
{
echo "	    <div class=\"subItem\"><a href=\"ingresos.php\" target=\"mainFrame\">Captura de Ingresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"egresos.php\" target=\"mainFrame\">Captura de Egresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"obra.php\" target=\"mainFrame\">Captura de Obra y Equip.</a></div>";
echo "	    <div class=\"subItem\"><a href=\"personal.php\" target=\"mainFrame\">Captura de Personal</a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_jud.php\" target=\"mainFrame\">Ver Resumen</a></div>";
echo "	    <div class=\"subItem\"><a href=\"reporte.php\" target=\"mainFrame\">Resumen por partidas</a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_adm.php\" target=\"mainFrame\">Detalle admin por Area</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_adm_1.php\" target=\"mainFrame\">Detalle admin</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"obras_excel_total.php\" target=\"mainFrame\">Total Obras</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_users.php\" target=\"mainFrame\">Usuarios activos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_users.php\" target=\"mainFrame\">Resumen por partidas</a></div>";
}
else if($tipo_usuario=='CON')
{
echo "	    <div class=\"subItem\"><a href=\"detalle_con.php\" target=\"mainFrame\">Detalle de Capturas</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen.php\" target=\"mainFrame\">Ver Resumen</a></div>";
}

else if($tipo_usuario=='CO1')
{
echo "	    <div class=\"subItem\"><a href=\"detalle_con.php\" target=\"mainFrame\">Detalle de Capturas</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen.php\" target=\"mainFrame\">Ver Resumen</a></div>";
}


else if($tipo_usuario=='JD1')
{
//echo "	    <div class=\"subItem\"><a href=\"ingresos.php\" target=\"mainFrame\">Captura de Ingresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_jud.php\" target=\"mainFrame\">Detalle de Capturas</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_jud.php\" target=\"mainFrame\">Ver Resumen</a></div>";
echo "	    <div class=\"subItem\"><a href=\"reporte.php\" target=\"mainFrame\">Resumen por partidas</a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_adm_1.php\" target=\"mainFrame\">Detalle General</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_user.php\" target=\"mainFrame\">Usuarios activos</a></div>";

}
else if($tipo_usuario=='JD2')
{
//echo "	    <div class=\"subItem\"><a href=\"egresos.php\" target=\"mainFrame\">Captura de Egresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_jud.php\" target=\"mainFrame\">Detalle de Capturas</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_jud.php\" target=\"mainFrame\">Ver Resumen</a></div>";
echo "	    <div class=\"subItem\"><a href=\"reporte.php\" target=\"mainFrame\">Resumen por partidas</a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_adm_1.php\" target=\"mainFrame\">Detalle General</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_user.php\" target=\"mainFrame\">Usuarios activos</a></div>";

}
else if($tipo_usuario=='JD3')
{
//echo "	    <div class=\"subItem\"><a href=\"obra.php\" target=\"mainFrame\">Captura de Obra y Equip.</a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_jud.php\" target=\"mainFrame\">Detalle de Capturas</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_jud.php\" target=\"mainFrame\">Ver Resumen</a></div>";
echo "	    <div class=\"subItem\"><a href=\"reporte.php\" target=\"mainFrame\">Resumen por partidas</a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_adm_1.php\" target=\"mainFrame\">Detalle General</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"obras_excel_total.php\" target=\"mainFrame\">Total Obras</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_user.php\" target=\"mainFrame\">Usuarios activos</a></div>";

}
else if($tipo_usuario=='JD4')
{
//echo "	    <div class=\"subItem\"><a href=\"obra.php\" target=\"mainFrame\">Captura de Obra y Equip.</a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_jud.php\" target=\"mainFrame\">Detalle de Capturas</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_jud.php\" target=\"mainFrame\">Ver Resumen</a></div>";
echo "	    <div class=\"subItem\"><a href=\"reporte.php\" target=\"mainFrame\">Resumen por partidas</a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_adm_1.php\" target=\"mainFrame\">Detalle General</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_user.php\" target=\"mainFrame\">Usuarios activos</a></div>";
}

else if($tipo_usuario=='SUP')
{
//echo "	    <div class=\"subItem\"><a href=\"obra.php\" target=\"mainFrame\">Captura de Obra y Equip.</a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_jud.php\" target=\"mainFrame\">Detalle de Capturas</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"detalle_adm_1.php\" target=\"mainFrame\">Detalle General</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_jud.php\" target=\"mainFrame\">Ver Resumen</a></div>";
echo "	    <div class=\"subItem\"><a href=\"reporte.php\" target=\"mainFrame\">Resumen por partidas</a></div>";
echo "	    <div class=\"subItem\"><a href=\"obras_excel_total.php\" target=\"mainFrame\">Total Obras</a></a></div>";
echo "	    <div class=\"subItem\"><a href=\"resumen_users.php\" target=\"mainFrame\">Usuarios activos</a></div>";
}

echo "	</div>";
echo "</div>";
//echo "</div>";

echo "<br>";

if($tipo_usuario=='CAP')
{

echo "<div class=\"topItem\" >Instructivos de uso</div>";
echo "<div class=\"dropMenu\" >";
echo "	<div class=\"subMenu\" style=\"display:inline;\">";
echo "	    <div class=\"subItem\"><a href=\"ingresos.pdf\" target=\"_blank\">Ingresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"egresos.pdf\" target=\"_blank\">Egresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"obras.pdf\" target=\"_blank\">Obra y Equipamiento</a></div>";
echo "	    <div class=\"subItem\"><a href=\"personal.pdf\" target=\"_blank\">Personal</a></div>";
echo "	</div>";
echo "</div>";
}

if($tipo_usuario=='CON')
{

echo "<div class=\"topItem\" >Instructivos de uso</div>";
echo "<div class=\"dropMenu\" >";
echo "	<div class=\"subMenu\" style=\"display:inline;\">";
echo "	    <div class=\"subItem\"><a href=\"ingresos.pdf\" target=\"_blank\">Ingresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"egresos.pdf\" target=\"_blank\">Egresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"obras.pdf\" target=\"_blank\">Obra y Equipamiento</a></div>";
echo "	    <div class=\"subItem\"><a href=\"personal.pdf\" target=\"_blank\">Personal</a></div>";
echo "	</div>";
echo "</div>";
}

if($tipo_usuario=='CO1')
{

echo "<div class=\"topItem\" >Instructivos de uso</div>";
echo "<div class=\"dropMenu\" >";
echo "	<div class=\"subMenu\" style=\"display:inline;\">";
echo "	    <div class=\"subItem\"><a href=\"ingresos.pdf\" target=\"_blank\">Ingresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"egresos.pdf\" target=\"_blank\">Egresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"obras.pdf\" target=\"_blank\">Obra y Equipamiento</a></div>";
echo "	    <div class=\"subItem\"><a href=\"personal.pdf\" target=\"_blank\">Personal</a></div>";
echo "	</div>";
echo "</div>";
}

if($tipo_usuario=='JD1')
{

echo "<div class=\"topItem\" >Instructivos de uso</div>";
echo "<div class=\"dropMenu\" >";
echo "	<div class=\"subMenu\" style=\"display:inline;\">";
echo "	    <div class=\"subItem\"><a href=\"ingresos.pdf\" target=\"_blank\">Ingresos</a></div>";
//echo "	    <div class=\"subItem\"><a href=\"egresos.pdf\" target=\"_blank\">Egresos</a></div>";
//echo "	    <div class=\"subItem\"><a href=\"obras.pdf\" target=\"_blank\">Obra y Equipamiento</a></div>";
//echo "	    <div class=\"subItem\"><a href=\"personal.pdf\" target=\"_blank\">Personal</a></div>";
echo "	</div>";
echo "</div>";
}

if($tipo_usuario=='JD2')
{

echo "<div class=\"topItem\" >Instructivos de uso</div>";
echo "<div class=\"dropMenu\" >";
echo "	<div class=\"subMenu\" style=\"display:inline;\">";
//echo "	    <div class=\"subItem\"><a href=\"ingresos.pdf\" target=\"_blank\">Ingresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"egresos.pdf\" target=\"_blank\">Egresos</a></div>";
//echo "	    <div class=\"subItem\"><a href=\"obras.pdf\" target=\"_blank\">Obra y Equipamiento</a></div>";
//echo "	    <div class=\"subItem\"><a href=\"personal.pdf\" target=\"_blank\">Personal</a></div>";
echo "	</div>";
echo "</div>";
}

if($tipo_usuario=='JD3')
{

echo "<div class=\"topItem\" >Instructivos de uso</div>";
echo "<div class=\"dropMenu\" >";
echo "	<div class=\"subMenu\" style=\"display:inline;\">";
//echo "	    <div class=\"subItem\"><a href=\"ingresos.pdf\" target=\"_blank\">Ingresos</a></div>";
//echo "	    <div class=\"subItem\"><a href=\"egresos.pdf\" target=\"_blank\">Egresos</a></div>";
echo "	    <div class=\"subItem\"><a href=\"obras.pdf\" target=\"_blank\">Obra y Equipamiento</a></div>";
//echo "	    <div class=\"subItem\"><a href=\"personal.pdf\" target=\"_blank\">Personal</a></div>";
echo "	</div>";
echo "</div>";
}

if($tipo_usuario=='JD4')
{
echo "<div class=\"topItem\" >Instructivos de uso</div>";
echo "<div class=\"dropMenu\" >";
echo "	<div class=\"subMenu\" style=\"display:inline;\">";
//echo "	    <div class=\"subItem\"><a href=\"ingresos.pdf\" target=\"_blank\">Ingresos</a></div>";
//echo "	    <div class=\"subItem\"><a href=\"egresos.pdf\" target=\"_blank\">Egresos</a></div>";
//				echo "	    <div class=\"subItem\"><a href=\"obras.pdf\" target=\"_blank\">Obra y Equipamiento</a></div>";
echo "	    <div class=\"subItem\"><a href=\"personal.pdf\" target=\"_blank\">Personal</a></div>";
echo "	</div>";
echo "</div>";
}





echo "</div>";




echo "<script type=\"text/javascript\" src=\"jscripts/xpmenuv21.js\"></script>";
echo "</div>";

echo "</body>";
echo "</html>";
?>