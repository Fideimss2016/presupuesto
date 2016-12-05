<?php


function Horas($mes,$mes1)
{

$resmes=$mes1-$mes;
$totmes=$resmes+1;

$celda="#1a1a1a";
$tabla="#666";
$emp=$mes;
$emp1=$mes;
$emp2=$mes;
$emp3=$mes;
$emp4=$mes;
$emp5=$mes;


echo " <table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";

//$status="disabled";
for($emp;$emp<=$mes1;$emp++)
{
	if ($emp==1){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">ENERO</span></th>";}else{}
	if ($emp==2){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">FEBRERO</span></th>";}else{}
	if ($emp==3){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">MARZO</span></th>";}else{}
	if ($emp==4){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">ABRIL</span></th>";}else{}
	if ($emp==5){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">MAYO</span></th>";}else{}
	if ($emp==6){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">JUNIO</span></th>";}else{}
}
echo "   </tr>";

echo "   <tr>";
for($emp1;$emp1<=$mes1;$emp1++)
{
	if ($emp1==1){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
	if ($emp1==2){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
	if ($emp1==3){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
	if ($emp1==4){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
	if ($emp1==5){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
	if ($emp1==6){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
}
echo "   </tr>";
echo "   <tr>";

for($emp2;$emp2<=$mes1;$emp2++)
{

	if ($emp2==1){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh1\" name=\"dh1\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
	if ($emp2==2){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh2\" name=\"dh2\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
	if ($emp2==3){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh3\" name=\"dh3\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
	if ($emp2==4){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh4\" name=\"dh4\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
	if ($emp2==5){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh5\" name=\"dh5\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
	if ($emp2==6){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh6\" name=\"dh6\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
}// FOR MES

echo "   </tr>";
echo " </table>";

echo "<br \>";
/**SEGUNDO SEMESTRE**/
echo " <table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";

//$status="disabled";
for($emp3;$emp3<=$mes1;$emp3++)
{
	if ($emp3==7){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">JULIO</span></th>";}else{}
	if ($emp3==8){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">AGOSTO</span></th>";}else{}
	if ($emp3==9){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">SEPTIEMBRE</span></th>";}else{}
	if ($emp3==10){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">OCTUBRE</span></th>";}else{}
	if ($emp3==11){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">NOVIEMBRE</span></th>";}else{}
	if ($emp3==12){echo "     <th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">DICIEMBRE</span></th>";}else{}
}
echo "   </tr>";

echo "   <tr>";
for($emp4;$emp4<=$mes1;$emp4++)
{
	if ($emp4==7){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
	if ($emp4==8){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
	if ($emp4==9){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
	if ($emp4==10){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
	if ($emp4==11){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
	if ($emp4==12){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">Horas</span></td>";
	}else{}
}
echo "   </tr>";
echo "   <tr>";

for($emp5;$emp5<=$mes1;$emp5++)
{
	if ($emp5==7){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh7\" name=\"dh7\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
	if ($emp5==8){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh8\" name=\"dh8\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
	if ($emp5==9){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh9\" name=\"dh9\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
	if ($emp5==10){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh10\" name=\"dh10\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
	if ($emp5==11){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh11\" name=\"dh11\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
	if ($emp5==12){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh12\" name=\"dh12\" min=\"0\" max=\"100\" required $status></td>";
	}else{}
}// FOR MES

echo "   </tr>";
echo " </table>";


/****/

	
} // la funcion




?>