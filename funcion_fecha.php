<?php
function DiasHabiles($inicio,$termino) 
{ 
list($dia,$mes,$year) = explode("-",$inicio); 
$ini = mktime(0, 0, 0, $mes , $dia, $year); 

list($diaf,$mesf,$yearf) = explode("-",$termino); 
$fin = mktime(0, 0, 0, $mesf , $diaf, $yearf); 

	$r = 1; 
	while($ini <= $fin) 
		{ 
		$ini = mktime(0, 0, 0, $mes , $dia+$r, $year); 
		$newArray[] .=$ini;  
		$r++; 
		} 
		return $newArray; 
}


function Evalua($arreglo) 
{ 
$feriados        = array( 
'1-1',  //  Año Nuevo (irrenunciable) 
'3-3',  //  Se recorre por el dia de la constitucion politica
'17-3',  //  Se recorre por el natalicio de Don Benito Juarez
'17-4',  //  Semana santa
'18-4',  //  Semana santa
'1-5',  //  Día Nacional del Trabajo (irrenunciable) 
'10-5',  //  Día de las Madres
'15-9',  //  Día de nuestra independencia nacional 
'16-9',  //  Día de nuestra independencia nacional 
'17-11',  //  Se recorre por el dia de la revoluciom
'25-12',  //  Natividad del Señor y Mi cumpleaños (feriado religioso) (irrenunciable) 
); 

$j= count($arreglo); 

for($i=0;$i<=$j;$i++) 
{ 
$dia = $arreglo[$i]; 

        $fecha = getdate($dia); 
            $feriado = $fecha['mday']."-".$fecha['mon']; 
                    if($fecha["wday"]==0 or $fecha["wday"]==6) 
                    { 
                        $dia_ ++; 
                    } 
                        elseif(in_array($feriado,$feriados)) 
                        {    
                            $dia_++; 
                        } 
} 
$rlt = $j - $dia_; 
return $rlt; 
}

function Semanas($inicio,$termino)
{
$difsemanas = date("W",strtotime($inicio))-date("W",strtotime($termino));  
return $difsemanas;
}
?>