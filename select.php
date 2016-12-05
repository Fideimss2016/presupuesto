<html> 
<head> 
<?php 
/*CONEXION CON EL SERVIDOR DE LA BASE DE DATOS*/ 
$serv = "localhost"; 
$nomb = "fideimss_ansama"; 
$contr="Ed4ns4m4"; 
$base="fideimss_presupuesto"; 
$conectar = MYSQL_CONNECT($serv,$nomb,$contr) OR DIE ("no se puede acceder al servidor") ; 
MYSQL_SELECT_DB($base) OR DIE ("no se puede acceder a la base de datos"); 


$cmarcas = MYSQL_QUERY("SELECT * FROM cat_actividades_i;"); //cargando tabla marcas 
$marca =array() ; //declaro los arrays que van a cargar los datos de los selects, este es el del select de las marcas 
$mov =array() ; //declaro los arrays que van a cargar los datos de los selects, este es el del select de las tipos 
$tip=-1;//le asigno un valor -1 al tipo para que no me descuadre con el resto de los valores de las ID de los tipos 
//lo llamé tip, para diferenciarlo de marcas 
if (!empty($_POST['select1'])){ 
/*Cuando entramos esta variable está vacia, así que si la rcogemos con el _POST, va a dar error, así que con este 
if digo que si el $_POST stá vacio, le asigne el valor -1 para que no cargue nada y no descuadre co las ID de 
los productos*/ 
$tip =$_POST['select1']; 
} 
?> 
</head> 
<body> 
<table border="0" align="center"> 
<tr> 
<td align="center"> 
<!--buscador por categorias--> 
<?php 
echo "<form name='form1' action='".$_SERVER['PHP_SELF']."' method='POST'>"; //le indico que me envie el formulario a esta página web 
echo " <select name='select1' size='1' onChange='this.form.submit()'>"; // Creamos el select en HTML como cualquier otro y le indicamos que envie el formulario al cambiar el valor por defecto 
echo " <option value='nada' selected>Seleccione una marca</option>"; // Dato por defecto al cargar 
while($marca=mysql_fetch_array($cmarcas)) //cargamos los datos con mysql_fetch 
{ 
if($marca[0]==$tip)//este if es para cuando carguemos de nuevo el formulario que ponga por defecto la marca seleccionada (para que no ponga "seleccione una marca" al al seleccionarlo, que si hemos elegido, Audi, que ponga Audi, al cmabiarse 
{ 
echo "<option value='".$marca[0]."' selected>".$marca[1]." ".$marca[2]."</option>"; 
} 
else 
{ 
echo "<option value='".$marca[0]."'>".$marca[1]." ".$marca[2]."</option>"; 
} 
} 
mysql_free_result($cmarcas) ; // Liberar memoria usada por consulta. 
?> 
</select> 
</form> 
</td> 
<td align="center"> 
<!--buscador moviles--> 
<form name="select2" action="mostrar_productos.php"> 
<select name="sec" size="1" onChange="this.form.submit()"> 
<option value="nada">MODELO</option> <!--Aqui hacemos el select2--> 
<?php 
$cmov = MYSQL_QUERY("SELECT * FROM cat_tipo_curso_i WHERE cvr='$tip';"); //Con esta consulta le indico que me cargue de todos los modelos, que hay de productos, me cargue los correspondientes a la marca (si os fijaies, carga la variable tip que es la que se envia en el formulario anterior 
while($mov=mysql_fetch_array($cmov))// muestra de los dartos 
{ 
echo "<option value='".$mov[0]."'>".$mov[1]."</option>"; 
} //FIN  
?> 
</select> 
</form> 
</td> 
</tr> 
</table> 
</body> 
</html>