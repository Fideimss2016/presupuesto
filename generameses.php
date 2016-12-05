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


echo " <table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";

//="disabled";
for($emp;$emp<=$mes1;$emp++)
{
	if ($emp==1){echo "     <th colspan=\"2\" scope=\"col\" width=\"10%\"><span class=\"spgreen\">ENERO</span></th>";}else{}
	if ($emp==2){echo "     <th colspan=\"2\" scope=\"col\" width=\"10%\"><span class=\"spgreen\">FEBRERO</span></th>";}else{}
	if ($emp==3){echo "     <th colspan=\"2\" scope=\"col\" width=\"10%\"><span class=\"spgreen\">MARZO</span></th>";}else{}
	if ($emp==4){echo "     <th colspan=\"2\" scope=\"col\" width=\"10%\"><span class=\"spgreen\">ABRIL</span></th>";}else{}
	if ($emp==5){echo "     <th colspan=\"2\" scope=\"col\" width=\"10%\"><span class=\"spgreen\">MAYO</span></th>";}else{}
	if ($emp==6){echo "     <th colspan=\"2\" scope=\"col\" width=\"10%\"><span class=\"spgreen\">JUNIO</span></th>";}else{}
}
echo "   </tr>";

echo "   <tr>";
for($emp1;$emp1<=$mes1;$emp1++)
{
	if ($emp1==1){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"8px\"><span class=\"spblue\">NDH</span></td>";
	}else{}
	if ($emp1==2){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">NDH</span></td>";
	}else{}
	if ($emp1==3){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">NDH</span></td>";
	}else{}
	if ($emp1==4){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">NDH</span></td>";
	}else{}
	if ($emp1==5){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">NDH</span></td>";
	}else{}
	if ($emp1==6){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">NDH</span></td>";
	}else{}
}
echo "   </tr>";
echo "   <tr>";

for($emp2;$emp2<=$mes1;$emp2++)
{

	if ($emp2==1){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh1\" name=\"dh1\" min=\"0\" max=\"10000\" required></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh1\" name=\"ndh1\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes1\" value=\"1\">";
	}else{}
	if ($emp2==2){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh2\" name=\"dh2\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh2\" name=\"ndh2\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes2\" value=\"2\">";
	}else{}
	if ($emp2==3){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh3\" name=\"dh3\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh3\" name=\"ndh3\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes3\" value=\"3\">";
	}else{}
	if ($emp2==4){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh4\" name=\"dh4\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh4\" name=\"ndh4\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes4\" value=\"4\">";
	}else{}
	if ($emp2==5){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh5\" name=\"dh5\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh5\" name=\"ndh5\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes5\" value=\"5\">";
	}else{}
	if ($emp2==6){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh6\" name=\"dh6\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh6\" name=\"ndh6\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes6\" value=\"6\">";
	}else{}
}// FOR MES


echo "   </tr>";
echo " </table>";

echo "<br \>";
/**SEGUNDO SEMESTRE**/
echo " <table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";

//="disabled";
for($emp3;$emp3<=$mes1;$emp3++)
{
	if ($emp3==7){echo "     <th colspan=\"2\" scope=\"col\"><span class=\"spgreen\">JULIO</span></th>";}else{}
	if ($emp3==8){echo "     <th colspan=\"2\" scope=\"col\"><span class=\"spgreen\">AGOSTO</span></th>";}else{}
	if ($emp3==9){echo "     <th colspan=\"2\" scope=\"col\"><span class=\"spgreen\">SEPTIEMBRE</span></th>";}else{}
	if ($emp3==10){echo "     <th colspan=\"2\" scope=\"col\"><span class=\"spgreen\">OCTUBRE</span></th>";}else{}
	if ($emp3==11){echo "     <th colspan=\"2\" scope=\"col\"><span class=\"spgreen\">NOVIEMBRE</span></th>";}else{}
	if ($emp3==12){echo "     <th colspan=\"2\" scope=\"col\"><span class=\"spgreen\">DICIEMBRE</span></th>";}else{}
}
echo "   </tr>";

echo "   <tr>";
for($emp4;$emp4<=$mes1;$emp4++)
{
	if ($emp4==7){
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"108px\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" width=\"108px\"><span class=\"spblue\">NDH</span></td>";
	}else{}
	if ($emp4==8){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">NDH</span></td>";
	}else{}
	if ($emp4==9){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">NDH</span></td>";
	}else{}
	if ($emp4==10){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">NDH</span></td>";
	}else{}
	if ($emp4==11){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">NDH</span></td>";
	}else{}
	if ($emp4==12){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">DH</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\">NDH</span></td>";
	}else{}
}
echo "   </tr>";
echo "   <tr>";

for($emp5;$emp5<=$mes1;$emp5++)
{
	if ($emp5==7){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh7\" name=\"dh7\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh7\" name=\"ndh7\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes7\" value=\"7\">";
	}else{}
	if ($emp5==8){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh8\" name=\"dh8\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh8\" name=\"ndh8\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes8\" value=\"8\">";
	}else{}
	if ($emp5==9){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh9\" name=\"dh9\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh9\" name=\"ndh9\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes9\" value=\"9\">";
	}else{}
	if ($emp5==10){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh10\" name=\"dh10\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh10\" name=\"ndh10\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes10\" value=\"10\">";
	}else{}
	if ($emp5==11){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh11\" name=\"dh11\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh11\" name=\"ndh11\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes11\" value=\"11\">";
	}else{}
	if ($emp5==12){
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"dh12\" name=\"dh12\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><input type=\"number\" id=\"ndh12\" name=\"ndh12\"  min=\"0\" max=\"10000\" required ></td>";
	echo "     <input type=\"hidden\" name=\"mes12\" value=\"12\">";
	}else{}
}// FOR MES

echo "   </tr>";
echo " </table>";


/****/


} // la funcion





?>