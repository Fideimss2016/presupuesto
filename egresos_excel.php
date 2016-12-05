<?php
	session_start();
	$_SESSION['clave']=$_REQUEST['clave'];
	$clave = $_SESSION["clave"];
	$tipo_usuario = $_SESSION["tipo_usuario"];

	include "clases/variablesbd.php";

	$aux = "<?\n";
	$aux = $aux."header(\"Content-type: application/vnd.ms-excel\");\n";
	$aux = $aux."header(\"Content-Disposition: attachment; filename=excel.xls\");\n";
	$aux = $aux."?>\n";
	$file = fopen('excel1.php',"w+");
	if ( $file )
	{

	}
	else
	{
	  die( "fopen failed for $filename" ) ;
	}
	if (fwrite($file,"$aux \n") === FALSE)
	{
	  echo "No se puede escribir al archivo ($file)";
	  exit;
	}

	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);

	$celda = "#222";
	$celda1 = "#333";
	$celda2 = "#555";
	$celdaf = "#fff";
	$celdaf1 = "#F0F0F9";

	$usuario_sistema = $_SESSION['usuario_sistema'];

	$aux = "<center><h4><font color=\"#000\">Presupuesto De Egresos Ejercicio 2017</font></h4></center>";

	$aux = $aux."<center>";
	$aux = $aux."<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
	$aux = $aux."  <tr>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Delegacion</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">UOPSI</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Partida</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Categoria / Gasto</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Actividad</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Contrato</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Enero</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Febrero</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Marzo</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Abril</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Mayo</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Junio</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Julio</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Agosto</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Septiembre</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Octubre</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Noviembre</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Diciembre</span></th>";
	$aux = $aux."    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Total</span></th>";
	$aux = $aux."  </tr>";

	$colorfila = 0;

	/*personal*/
	$resultp = mysql_query("select p.id_conse_personal,p.clave_act,p.clave_par,p.cantidad,ci.actividad,cp.desc_par,
		p.conse_categoria,p.ene,p.feb,p.mar,p.abr,p.may,p.jun,p.jul,p.ago,p.sep,p.oct,p.nov,p.dic,cc.desc_categoria,cc.subtotal,p.status,p.meses,cd.desc_uops, cd.desc_del,p.gas_anual,p.cvr
		from personal p, cat_actividades_i ci, cat_partidas_e cp, cat_categoria cc, cat_delegaciones cd
		where p.clave='$clave' and cd.clave=p.clave and ci.clave_act=p.clave_act and cp.clave_par=p.clave_par and cc.conse_categoria=p.conse_categoria order by clave_par, id_conse_personal", $connect);
	$totalregistros = mysql_num_rows($resultp);
	$valcolor = 0;
	while($row = mysql_fetch_array($resultp))
	{
		$id_conse_personal = $row['id_conse_personal'];
		$clave_act = $row['clave_act'];
		$clave_par = $row['clave_par'];
		$cantidad = $row['cantidad'];
		$actividad = $row['actividad'];
		$desc_par = $row['desc_par'];
		$ene = $row['ene'];
		$feb = $row['feb'];
		$mar = $row['mar'];
		$abr = $row['abr'];
		$may = $row['may'];
		$jun = $row['jun'];
		$jul = $row['jul'];
		$ago = $row['ago'];
		$sep = $row['sep'];
		$oct = $row['oct'];
		$nov = $row['nov'];
		$dic = $row['dic'];
		$desc_categoria = $row['desc_categoria'];
		$subtotal = $row['subtotal'];
		$status = $row['status'];			
		$meses = $row['meses'];			
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
		$gas_anual = $row['gas_anual'];
		$cvr = $row['cvr'];

		if ($colorfila == 0)
		{
		   	$color = "#efefef";
		   	$colorfila = 1;
		}
		else
		{
		   	$color = "#ffffff";
		   	$colorfila = 0;
	    }

		if($ene == 1){$enero = $subtotal;}else{$enero = 0;}
		if($feb == 1){$febrero = $subtotal;}else{$febrero = 0;}
		if($mar == 1){$marzo = $subtotal;}else{$marzo = 0;}
		if($abr == 1){$abril = $subtotal;}else{$abril = 0;}
		if($may == 1){$mayo = $subtotal;}else{$mayo = 0;}
		if($jun == 1){$junio = $subtotal;}else{$junio = 0;}
		if($jul == 1){$julio = $subtotal;}else{$julio = 0;}
		if($ago == 1){$agosto = $subtotal;}else{$agosto = 0;}
		if($sep == 1){$septiembre = $subtotal;}else{$septiembre = 0;}
		if($oct == 1){$octubre = $subtotal;}else{$octubre = 0;}
		if($nov == 1){$noviembre = $subtotal;}else{$noviembre = 0;}
		if($dic == 1){$diciembre = $subtotal;}else{$diciembre = 0;}

		$total_gastop = $enero + $febrero + $marzo + $abril + $mayo + $junio + $julio + $agosto + $septiembre + $octubre + $noviembre + $diciembre;

		$aux=$aux."  <tr>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$desc_del</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$desc_uops</span></td>";
		$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$clave_par $desc_par</span></td>";
		$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$desc_categoria</span></td>";
		if ($clave_act!="0")
		{
			$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$clave_act $actividad</span></td>";
		}
		else
		{
			$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$actividad</span></td>";
		}
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$meses meses</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($enero,2) . "</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($febrero,2) . "</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($marzo,2) . "</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($abril,2) . "</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($mayo,2) . "</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($junio,2) . "</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($julio,2) . "</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($agosto,2) . "</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($septiembre,2) . "</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($octubre,2) . "</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($noviembre,2) . "</span></td>";
		$aux=$aux."    <td align=\"right\" bgcolor=$color><span class=\"spgreen\"> " . number_format($diciembre,2) . "</span></td>";

		if($cvr == 1)
		{
			$aux = $aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($gas_anual,2) . "</span></td>";
			$total_gastop = $gas_anual;
		}
		else
		{
			$aux = $aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($total_gastop,2) . "</span></td>";	
		}

		$aux = $aux."  </tr>";

		$genero += $enero;
		$gfebrero += $febrero;
		$gmarzo += $marzo;
		$gabril += $abril;
		$gmayo += $mayo;
		$gjunio += $junio;
		$gjulio += $julio;
		$gagosto += $agosto;
		$gseptiembre += $septiembre;
		$goctubre += $octubre;
		$gnoviembre += $noviembre;
		$gdiciembre += $diciembre;
		$gingretot += $total_gastop;
	}				
	/*termina personal*/

	/*egresos*/
	$result = mysql_query("select e.id_conse_egresos,e.clave_act,e.clave_par,e.cantidad,e.unidad,e.total_gasto,ci.actividad,cp.desc_par,
		e.origen_del_gasto,e.enero,e.febrero,e.marzo,e.abril,e.mayo,e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre,cd.desc_uops, cd.desc_del
		from egresos e, cat_actividades_i ci, cat_partidas_e cp, cat_delegaciones cd
		where e.clave='$clave' and cd.clave=e.clave and ci.clave_act=e.clave_act and cp.clave_par=e.clave_par order by clave_par", $connect);
	$totalregistros = mysql_num_rows($result);
	$valcolor = 0;
	while($row = mysql_fetch_array($result))
	{
		$id_conse_egresos = $row['id_conse_egresos'];
		$clave_act = $row['clave_act'];
		$clave_par = $row['clave_par'];
		$cantidad = $row['cantidad'];
		$unidad = $row['unidad'];			
		$total_gasto = $row['total_gasto'];
		$actividad = $row['actividad'];
		$desc_par = $row['desc_par'];
		$status = $row['status'];
		$origen_del_gasto = $row['origen_del_gasto'];
		$enero = $row['enero'];
		$febrero = $row['febrero'];
		$marzo = $row['marzo'];
		$abril = $row['abril'];
		$mayo = $row['mayo'];
		$junio = $row['junio'];
		$julio = $row['julio'];
		$agosto = $row['agosto'];
		$septiembre = $row['septiembre'];
		$octubre = $row['octubre'];
		$noviembre = $row['noviembre'];
		$diciembre = $row['diciembre'];
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];

		if ($colorfila == 0)
		{
		   	$color = "#efefef";
		   	$colorfila = 1;
		}
		else
		{
		   	$color = "#ffffff";
		   	$colorfila = 0;
	    }

		$aux=$aux."  <tr>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$desc_del</span></td>";
		$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$desc_uops</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$clave_par $desc_par</span></td>";
		$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$origen_del_gasto</span></td>";
		if($clave_act != "0")
		{
			$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$clave_act $actividad</span></td>";
		}
		else
		{
			$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$actividad</span></td>";
		}
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$cantidad $unidad</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($enero,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($febrero,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($marzo,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($abril,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($mayo,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($junio,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($julio,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($agosto,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($septiembre,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($octubre,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($noviembre,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($diciembre,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($total_gasto,2) . "</span></td>";
		$aux=$aux."  </tr>";

		$genero += $enero;
		$gfebrero += $febrero;
		$gmarzo += $marzo;
		$gabril += $abril;
		$gmayo += $mayo;
		$gjunio += $junio;
		$gjulio += $julio;
		$gagosto += $agosto;
		$gseptiembre += $septiembre;
		$goctubre += $octubre;
		$gnoviembre += $noviembre;
		$gdiciembre += $diciembre;
		$gingretot += $total_gasto;
	}			
	/*terrmina egresos*/

	/*obras*/
	/*
	$resulto = mysql_query("select o.id_conse_obra,o.clave_act,o.clave_par,o.cantidad,o.unidad,o.total_gastoo,ci.actividad,cp.desc_par,
		o.origen_del_gasto,o.enero,o.febrero,o.marzo,o.abril,o.mayo,o.junio,o.julio,o.agosto,o.septiembre,o.octubre,o.noviembre,o.diciembre,cd.desc_uops, cd.desc_del
		from obras o, cat_actividades_i ci, cat_partidas_e cp, cat_delegaciones cd 
		where o.clave='$clave' and cd.clave=o.clave and ci.clave_act=o.clave_act and cp.clave_par=o.clave_par order by clave_par", $connect);
	*/
	$resulto = mysql_query("select o.id_conse_obra, o.clave_act, o.clave_par, o.cantidad, o.unidad, o.monto as total_gastoo, a.actividad, p.desc_par, o.status, o.observaciones as origen_del_gasto, o.enero, o.febrero, o.marzo, 
		o.abril, o.mayo, o.junio, o.julio, o.agosto, o.septiembre, o.octubre, o.noviembre, o.diciembre, d.desc_uops, d.desc_del from obras o left join cat_partidas_e p on p.clave_par = o.clave_par 
		left join cat_actividades_i a on a.conse_act = o.curso_id left join cat_delegaciones d on d.clave = o.clave where o.clave = '$clave' order by o.clave_par", $connect);

	$totalregistroso = mysql_num_rows($resulto);
	$valcolor = 0;
	while($row=mysql_fetch_array($resulto))
	{
		$id_conse_obra=$row['id_conse_obra'];
		$clave_act=$row['clave_act'];
		$clave_par=$row['clave_par'];
		$cantidad=$row['cantidad'];
		$unidad=$row['unidad'];			
		$total_gastoo=$row['total_gastoo'];
		$actividad=$row['actividad'];
		$desc_par=$row['desc_par'];
		$status=$row['status'];
		$origen_del_gasto=$row['origen_del_gasto'];
		$enero=$row['enero'];
		$febrero=$row['febrero'];
		$marzo=$row['marzo'];
		$abril=$row['abril'];
		$mayo=$row['mayo'];
		$junio=$row['junio'];
		$julio=$row['julio'];
		$agosto=$row['agosto'];
		$septiembre=$row['septiembre'];
		$octubre=$row['octubre'];
		$noviembre=$row['noviembre'];
		$diciembre=$row['diciembre'];
		$desc_uops=$row['desc_uops'];
		$desc_del=$row['desc_del'];
				
		if ($colorfila==0)
		{
		   	$color= "#efefef";
	   		$colorfila=1;
		}
		else
		{
	   		$color="#ffffff";
		   	$colorfila=0;
	    }

		$aux=$aux."  <tr>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$desc_del</span></td>";
		$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$desc_uops</span></td>";
		$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$clave_par $desc_par</span></td>";
		$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$origen_del_gasto</span></td>";
		if($clave_act!="0")
		{
			$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$clave_act $actividad</span></td>";
		}
		else
		{
			$aux=$aux."    <td align=\"left\" bgcolor=$color><span class=\"spgreen\">$actividad</span></td>";
		}
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\">$cantidad $unidad</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($enero,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($febrero,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($marzo,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($abril,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($mayo,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($junio,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($julio,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($agosto,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($septiembre,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($octubre,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($noviembre,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($diciembre,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($total_gastoo,2) . "</span></td>";
		$aux=$aux."  </tr>";

		$genero+=$enero;
		$gfebrero+=$febrero;
		$gmarzo+=$marzo;
		$gabril+=$abril;
		$gmayo+=$mayo;
		$gjunio+=$junio;
		$gjulio+=$julio;
		$gagosto+=$agosto;
		$gseptiembre+=$septiembre;
		$goctubre+=$octubre;
		$gnoviembre+=$noviembre;
		$gdiciembre+=$diciembre;
		$gingretot+=$total_gastoo;
	}			

	/*termina obras*/

	$aux=$aux."  <tr>";
	$aux=$aux."    <td align=\"right\" bgcolor=$celda colspan=\"6\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($genero,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gfebrero,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmarzo,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gabril,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmayo,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gjunio,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gjulio,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gagosto,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gseptiembre,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($goctubre,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gnoviembre,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gdiciembre,2) . "</span></td>";
	$aux=$aux."    <td align=\"center\" bgcolor=$celda><span class=\"titulo_small\"> " . number_format($gingretot,2) . "</span></td>";
	$aux=$aux."  </tr>";

	print("<tr><td bgcolor=\"#efefef\" ><span class=\"textoformulario\"><b>Proceso Completo&nbsp;<a href=\"excel1.php\" class=\"small_link\">Abrir archivo</a></td></tr>");

	$aux=$aux."</table>";
	fwrite($file,"$aux \n");
	fclose($file);
?>