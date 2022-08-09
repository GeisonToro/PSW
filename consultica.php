<?php
session_start();
$host = 'ec2-54-152-28-9.compute-1.amazonaws.com';
$port = '5432';
$base_datos = 'd8g69ksvdvqrvd';
$usuario1 = 'vhbdotdoakagiu';
$pass = '12ad82ffe001d86c9779a92ccdd370602c87d9d937fd32c3444af002697d56a7';
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