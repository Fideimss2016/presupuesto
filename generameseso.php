<?php


function Meses($mes,$mes1)
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

$vale= "onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\"";

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
for($emp2;$emp2<=$mes1;$emp2++)
{

	if ($emp2==1){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"enero\" name=\"enero\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required value=\"0\"></td>";
	}else{}
	if ($emp2==2){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"febrero\" name=\"febrero\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"0\"></td>";
	}else{}
	if ($emp2==3){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"marzo\" name=\"marzo\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"0\"></td>";
	}else{}
	if ($emp2==4){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"abril\" name=\"abril\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"0\"></td>";
	}else{}
	if ($emp2==5){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"mayo\" name=\"mayo\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"0\"></td>";
	}else{}
	if ($emp2==6){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"junio\" name=\"junio\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"0\"></td>";
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

for($emp5;$emp5<=$mes1;$emp5++)
{
	if ($emp5==7){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"julio\" name=\"julio\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"0\"></td>";
	}else{}
	if ($emp5==8){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"agosto\" name=\"agosto\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"0\"></td>";
	}else{}
	if ($emp5==9){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"septiembre\" name=\"septiembre\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"0\"></td>";
	}else{}
	if ($emp5==10){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"octubre\" name=\"octubre\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required value=\"0\"></td>";
	}else{}
	if ($emp5==11){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"noviembre\" name=\"noviembre\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"0\"></td>";
	}else{}
	if ($emp5==12){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"diciembre\" name=\"diciembre\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"0\"></td>";
	}else{}
}// FOR MES

echo "   </tr>";
echo " </table>";


/****/

	
} // la funcion




?>