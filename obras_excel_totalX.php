<?php
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];

$tgmonto0311 = 0;
$tgmonto0501 = 0;
$tgmonto0601 = 0;
$tgmonto0602 = 0;
$tgmonto0603 = 0;
$montot = 0;
$gtotal = 0;

include "clases/variablesbd.php";

$aux = "<?\n";
$aux = $aux . "header(\"Content-type: application/vnd.ms-excel\");\n";
$aux = $aux . "header(\"Content-Disposition: attachment; filename=excel.xls\");\n";
$aux = $aux . "?>\n";
$file = fopen('excel1.php', "w+");
if ($file) {
} else {
    die("fopen failed for $filename");
}
if (fwrite($file, "$aux \n") === false) {
    echo "No se puede escribir al archivo ($file)";
    exit;
}

$connect = mysql_connect("$host", "$user", "$passworks");
mysql_select_db("$dbname", $connect);
/*
$result = mysql_query("select desc_uops from cat_delegaciones where clave = '$clave'", $connect);
$totalregistros = mysql_num_rows($result);
while ($row = mysql_fetch_array($result))
{
$desc_uops = $row['desc_uops'];
}
 */

$celda = "#222";
$celda1 = "#333";
$celda2 = "#555";
$celdaf = "#fff";
$celdaf1 = "#F0F0F9";

$usuario_sistema = $_SESSION['usuario_sistema'];

echo " <link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";
echo " <meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" />";
echo "<body>";
echo "<center><h1><font color=\"#000\">Detalle de gastos registrados en sistema</font></h1></center>";
$aux = "<center><h4><font color=\"#000\">Detalle de gastos registradas en sistema</font></h4></center>";

//echo     "<center>";
echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"0\" cellspacing=\"1\">";
echo "  <tr>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Delegacion</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">UOPSI</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Tipo de Gasto/Bien</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Tipo de Equipo/Actividad/Area</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Descripcion del concepto</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Cantidad</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Unidad</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Total de Usuarios</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Total de Ingresos</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0311</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0501</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0601</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0602</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0603</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">TOTAL</span></th>";
echo "  </tr>";

//$aux = $aux."<center>";
$aux = $aux . "<table width=\"97%\" border=\"0\" bgcolor=\"#000000\" cellpadding=\"0\" cellspacing=\"1\">";
$aux = $aux . "<tr>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Delegacion</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">UOPSI</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Tipo de Gasto/Bien</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Tipo de Equipo/Actividad/Area</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Descripcion del concepto</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Cantidad</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Unidad</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Total de Usuarios</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Total de Ingresos</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0311</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0501</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0601</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0602</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0603</span></th>";
$aux = $aux . "<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">TOTAL</span></th>";
$aux = $aux . "</tr>";

$colorfila = 0;

$resulttot = mysql_query("SELECT DISTINCT (clave_del) FROM obras ORDER BY clave_del", $connect);
$totalregistrostot = mysql_num_rows($resulttot);
while ($row = mysql_fetch_array($resulttot)) { //empieza conteo de clave_del
    $clave_del = $row['clave_del'];
    $gmonto0311 = 0;
    $gmonto0501 = 0;
    $gmonto0601 = 0;
    $gmonto0602 = 0;
    $gmonto0603 = 0;
    /*
    $resulttot = mysql_query("select distinct (clave) from obras order by clave", $connect);
    $totalregistrostot = mysql_num_rows($resulttot);
    while ($row = mysql_fetch_array($resulttot))
    {
    $gmonto0311 = 0;
    $gmonto0501 = 0;
    $gmonto0601 = 0;
    $gmonto0602 = 0;
    $gmonto0603 = 0;
     */
    $resulttot1 = mysql_query("SELECT DISTINCT (clave) FROM obras WHERE clave_del = '$clave_del' ORDER BY clave", $connect);
    $totalregistrostot1 = mysql_num_rows($resulttot1);
    while ($row = mysql_fetch_array($resulttot1)) { //empieza conteo de clave_del
        $clave = $row['clave'];
        $result = mysql_query("SELECT COUNT(clave_del) as tre FROM obras WHERE clave_del = '$clave_del'", $connect);
        $totalregistros = mysql_num_rows($result);
        while ($row = mysql_fetch_array($result)) {
            $tre = $row['tre'];
        }
        $result = mysql_query("select count(*) as cuantos from obras o where o.clave = '$clave'", $connect);
        $totalregistros = mysql_num_rows($result);
        while ($row = mysql_fetch_array($result)) {
            $cuantos = $row['cuantos'];
        }
        $cuantos = $cuantos + 1;
        $result = mysql_query("select o.id_conse_obra, o.id_proyecto, cd.desc_uops, cd.desc_del from obras o, cat_delegaciones cd where o.clave = '$clave' and cd.clave=o.clave order by id_conse_obra", $connect);
        $totalregistros = mysql_num_rows($result);
        $valcolor = 0;
        while ($row = mysql_fetch_array($result)) { //datos
            $id_conse_obra = $row['id_conse_obra'];
            $id_proyecto = $row['id_proyecto'];
            $desc_uops = $row['desc_uops'];
            $desc_del = $row['desc_del'];
            if ($colorfila == 0) {
                $color = "#ffffff";
                $colorfila = 1;
            } else {
                $color = "#efefef";
                $colorfila = 0;
            }
            echo "  <tr>";
            echo "    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_del</span></td>";
            echo "    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_uops</span></td>";
            echo "    <td align=\"left\" bgcolor=$color valign=\"top\" colspan=\"11\"><span class=\"spgreen\"></span></td>";
            echo "  </tr>";

            $aux = $aux . "  <tr>";
            $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_del</span></td>";
            $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_uops</span></td>";
            $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\" colspan=\"11\"><span class=\"spgreen\"></span></td>";
            $aux = $aux . "  </tr>";

            //$result = mysql_query("select o.monto as monto0311, o.observaciones as problematica, o.cantidad, o.unidad from obras o where o.clave = '$clave' and clave_par = '0311'", $connect);
            $result = mysql_query("select o.monto as monto0311, g.tipo_gasto, e.tipo_equipo_requerido_trabajo, o.observaciones as problematica, o.cantidad, o.unidad, o.total_usuarios, o.total_ingresos
            from obras o left join cat_tipo_gasto g on g.tipo_gasto_id = o.tipo_gasto_id left join cat_tipo_equipo_requerido_trabajos e on e.tipo_equipo_id = o.tipo_equipo_id where o.clave = '$clave'
            and clave_par = '0311'", $connect);
            $totalregistros = mysql_num_rows($result);
            $valcolor = 0;
            while ($row = mysql_fetch_array($result)) {
                $monto0311 = $row['monto0311'];
                $tipo_gasto = $row['tipo_gasto'];
                if ($tipo_gasto != "") {$tipo_gasto = utf8_encode($tipo_gasto);}
                $tipo_equipo = $row['tipo_equipo_requerido_trabajo'];
                if ($tipo_equipo != "") {$tipo_equipo = utf8_encode($tipo_equipo);}
                $problematica = $row['problematica'];
                if ($problematica == "") {$problematica = " ";} else { $problematica = utf8_encode($problematica);}
                $cantidad = $row['cantidad'];
                $unidad = $row['unidad'];
                $total_usuarios = $row['total_usuarios'];
                $total_ingresos = $row['total_ingresos'];

                echo "  <tr>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_gasto</span></td>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_equipo</span></td>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">" . number_format($total_usuarios, 2) . "</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">" . number_format($total_ingresos, 2) . "</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0311, 2) . "</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "  </tr>";
                $gmonto0311 += $monto0311;

                $aux = $aux . "  <tr>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_gasto</span></td>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_equipo</span></td>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_usuarios</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_ingresos</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0311, 2) . "</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "  </tr>";
            }

            //$result = mysql_query("select o.monto as monto0501, o.observaciones as problematica, o.cantidad, o.unidad from obras o where o.clave = '$clave' and clave_par = '0501'", $connect);
            $result = mysql_query("select o.monto as monto0501, g.tipo_gasto, e.tipo_equipo_requerido_trabajo, o.observaciones as problematica, o.cantidad, o.unidad, o.total_usuarios, o.total_ingresos
            from obras o left join cat_tipo_gasto g on g.tipo_gasto_id = o.tipo_gasto_id left join cat_tipo_equipo_requerido_trabajos e on e.tipo_equipo_id = o.tipo_equipo_id where o.clave = '$clave'
            and clave_par = '0501'", $connect);
            $totalregistros = mysql_num_rows($result);
            $valcolor = 0;
            while ($row = mysql_fetch_array($result)) {
                $monto0501 = $row['monto0501'];
                $tipo_gasto = $row['tipo_gasto'];
                if ($tipo_gasto != "") {$tipo_gasto = utf8_encode($tipo_gasto);}
                $tipo_equipo = $row['tipo_equipo_requerido_trabajo'];
                if ($tipo_equipo != "") {$tipo_equipo = utf8_encode($tipo_equipo);}
                $problematica = $row['problematica'];
                if ($problematica == "") {$problematica = " ";} else { $problematica = utf8_encode($problematica);}
                $cantidad = $row['cantidad'];
                $unidad = $row['unidad'];
                $total_usuarios = $row['total_usuarios'];
                $total_ingresos = $row['total_ingresos'];

                echo "  <tr>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_gasto</span></td>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_equipo</span></td>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_usuarios</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_ingresos</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0501, 2) . "</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "  </tr>";
                $gmonto0501 += $monto0501;

                $aux = $aux . "  <tr>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_gasto</span></td>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_equipo</span></td>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_usuarios</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_ingresos</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0501, 2) . "</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "  </tr>";
            }

            //$result = mysql_query("select o.monto as monto0601, o.observaciones as problematica, o.cantidad, o.unidad from obras o where o.clave = '$clave' and clave_par = '0601'", $connect);
            $result = mysql_query("select o.monto as monto0601, g.tipo_gasto, e.tipo_equipo_requerido_trabajo, o.observaciones as problematica, o.cantidad, o.unidad, o.total_usuarios, o.total_ingresos
            from obras o left join cat_tipo_gasto g on g.tipo_gasto_id = o.tipo_gasto_id left join cat_tipo_equipo_requerido_trabajos e on e.tipo_equipo_id = o.tipo_equipo_id where o.clave = '$clave'
            and clave_par = '0601'", $connect);
            $totalregistros = mysql_num_rows($result);
            $valcolor = 0;
            while ($row = mysql_fetch_array($result)) {
                $monto0601 = $row['monto0601'];
                $tipo_gasto = $row['tipo_gasto'];
                if ($tipo_gasto != "") {$tipo_gasto = utf8_encode($tipo_gasto);}
                $tipo_equipo = $row['tipo_equipo_requerido_trabajo'];
                if ($tipo_equipo != "") {$tipo_equipo = utf8_encode($tipo_equipo);}
                $problematica = $row['problematica'];
                if ($problematica == "") {$problematica = " ";} else { $problematica = utf8_encode($problematica);}
                $cantidad = $row['cantidad'];
                $unidad = $row['unidad'];
                $total_usuarios = $row['total_usuarios'];
                $total_ingresos = $row['total_ingresos'];

                echo "  <tr>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_gasto</span></td>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_equipo</span></td>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_usuarios</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_ingresos</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0601, 2) . "</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "  </tr>";
                $gmonto0601 += $monto0601;

                $aux = $aux . "  <tr>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_gasto</span></td>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_equipo</span></td>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_usuarios</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_ingresos</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0601, 2) . "</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "  </tr>";
            }

            //$result = mysql_query("select o.monto as monto0602, o.observaciones as problematica, o.cantidad, o.unidad from obras o where o.clave = '$clave' and clave_par = '0602'", $connect);
            $result = mysql_query("select o.monto as monto0602, g.tipo_gasto, e.tipo_equipo_requerido_trabajo, o.observaciones as problematica, o.cantidad, o.unidad, o.total_usuarios, o.total_ingresos
            from obras o left join cat_tipo_gasto g on g.tipo_gasto_id = o.tipo_gasto_id left join cat_tipo_equipo_requerido_trabajos e on e.tipo_equipo_id = o.tipo_equipo_id where o.clave = '$clave'
            and clave_par = '0602'", $connect);
            $totalregistros = mysql_num_rows($result);
            $valcolor = 0;
            while ($row = mysql_fetch_array($result)) {
                $monto0602 = $row['monto0602'];
                $tipo_gasto = $row['tipo_gasto'];
                if ($tipo_gasto != "") {$tipo_gasto = utf8_encode($tipo_gasto);}
                $tipo_equipo = $row['tipo_equipo_requerido_trabajo'];
                if ($tipo_equipo != "") {$tipo_equipo = utf8_encode($tipo_equipo);}
                $problematica = $row['problematica'];
                if ($problematica == "") {$problematica = " ";} else { $problematica = utf8_encode($problematica);}
                $cantidad = $row['cantidad'];
                $unidad = $row['unidad'];
                $total_usuarios = $row['total_usuarios'];
                $total_ingresos = $row['total_ingresos'];

                echo "  <tr>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_gasto</span></td>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_equipo</span></td>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_usuarios</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_ingresos</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0602, 2) . "</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "  </tr>";
                $gmonto0602 += $monto0602;

                $aux = $aux . "  <tr>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_gasto</span></td>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_equipo</span></td>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_usuarios</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_ingresos</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0602, 2) . "</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "  </tr>";
            }

            //$result = mysql_query("select o.monto as monto0603, o.observaciones as problematica, o.cantidad, o.unidad from obras o where o.clave = '$clave' and clave_par = '0603'", $connect);
            $result = mysql_query("select o.monto as monto0603, g.tipo_gasto, e.tipo_equipo_requerido_trabajo, o.observaciones as problematica, o.cantidad, o.unidad, o.total_usuarios, o.total_ingresos
            from obras o left join cat_tipo_gasto g on g.tipo_gasto_id = o.tipo_gasto_id left join cat_tipo_equipo_requerido_trabajos e on e.tipo_equipo_id = o.tipo_equipo_id where o.clave = '$clave'
            and clave_par = '0603'", $connect);
            $totalregistros = mysql_num_rows($result);
            $valcolor = 0;
            while ($row = mysql_fetch_array($result)) {
                $monto0603 = $row['monto0603'];
                $tipo_gasto = $row['tipo_gasto'];
                if ($tipo_gasto != "") {$tipo_gasto = utf8_encode($tipo_gasto);}
                $tipo_equipo = $row['tipo_equipo_requerido_trabajo'];
                if ($tipo_equipo != "") {$tipo_equipo = utf8_encode($tipo_equipo);}
                $problematica = $row['problematica'];
                if ($problematica == "") {$problematica = " ";} else { $problematica = utf8_encode($problematica);}
                $cantidad = $row['cantidad'];
                $unidad = $row['unidad'];
                $total_usuarios = $row['total_usuarios'];
                $total_ingresos = $row['total_ingresos'];

                echo "  <tr>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_gasto</span></td>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_equipo</span></td>";
                echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_usuarios</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_ingresos</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0603, 2) . "</span></td>";
                echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                echo "  </tr>";
                $gmonto0603 += $monto0603;

                $aux = $aux . "  <tr>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_gasto</span></td>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_equipo</span></td>";
                $aux = $aux . "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_usuarios</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_ingresos</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0603, 2) . "</span></td>";
                $aux = $aux . "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
                $aux = $aux . "  </tr>";
            }

            $gtotal += $montot;
        }

        $gmontot = $gmonto0311 + $gmonto0501 + $gmonto0601 + $gmonto0602 + $gmonto0603;

    } // termina clave
    echo "  <tr>";
    echo "    <td align=\"right\" bgcolor=$celda1 colspan=\"9\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
    echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0311, 2) . "</span></td>";
    echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0501, 2) . "</span></td>";
    echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0601, 2) . "</span></td>";
    echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0602, 2) . "</span></td>";
    echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0603, 2) . "</span></td>";
    echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmontot, 2) . "</span></td>";
    echo "  </tr>";

    $aux = $aux . "  <tr>";
    $aux = $aux . "    <td align=\"right\" bgcolor=\"#efefef\" colspan=\"9\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
    $aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0311, 2) . "</span></td>";
    $aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0501, 2) . "</span></td>";
    $aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0601, 2) . "</span></td>";
    $aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0602, 2) . "</span></td>";
    $aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0603, 2) . "</span></td>";
    $aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmontot, 2) . "</span></td>";
    $aux = $aux . "  </tr>";

    $tgmonto0311 += $gmonto0311;
    $tgmonto0501 += $gmonto0501;
    $tgmonto0601 += $gmonto0601;
    $tgmonto0602 += $gmonto0602;
    $tgmonto0603 += $gmonto0603;

    $tgmontot = $tgmonto0311 + $tgmonto0501 + $tgmonto0601 + $tgmonto0602 + $tgmonto0603;

} // termina clave_del

echo "  <tr>";
echo "    <td align=\"right\" bgcolor=$celda1 colspan=\"9\"><span class=\"titulo_small\">Gran Total: &nbsp;</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0311, 2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0501, 2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0601, 2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0602, 2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0603, 2) . "</span></td>";
echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmontot, 2) . "</span></td>";
echo "  </tr>";
echo "</table>";

$aux = $aux . "  <tr>";
$aux = $aux . "    <td align=\"right\" bgcolor=\"#efefef\" colspan=\"9\"><span class=\"titulo_small\">Gran Total: &nbsp;</span></td>";
$aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0311, 2) . "</span></td>";
$aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0501, 2) . "</span></td>";
$aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0601, 2) . "</span></td>";
$aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0602, 2) . "</span></td>";
$aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0603, 2) . "</span></td>";
$aux = $aux . "    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmontot, 2) . "</span></td>";
$aux = $aux . "  </tr>";
$aux = $aux . "</table>";

fwrite($file, "$aux \n");
fclose($file);

print("<tr><td bgcolor=\"#efefef\" ><span class=\"textoformulario\"><b>Proceso Completo&nbsp;<a href=\"excel1.php\" class=\"small_link\">Abrir archivo</a></td></tr>");
echo "</center>";
echo "</body>";
echo "</html>";
