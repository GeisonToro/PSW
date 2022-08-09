<?php
session_start();
$host = 'localhost';
$port = '5433';
$base_datos = 'hurtos';
$usuario1 = 'postgres';
$pass = 'p';
$conexion = pg_connect("host=$host port=$port dbname=$base_datos user=$usuario1 password=$pass");

/*
if($conexion)
{
	
	echo "se conecto correctamente";
}
else{
	echo "ha ocurrido un error";
}
*/

$query="SELECT *  FROM hurtos";
$consulta=pg_query($conexion,$query);
/*
if($consulta){
	
	echo "se conecto correctamente";
}
else{
	echo "ha ocurrido un error";
}
*/

$datos= array();

while($registro=pg_fetch_array($consulta,null, PGSQL_NUM)){
	$datosBD[]=$registro;
	};
	
$json=json_encode($datosBD);
//echo $json;



















?>