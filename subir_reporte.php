<?php
session_start();
$host = 'ec2-54-152-28-9.compute-1.amazonaws.com';
$port = '5432';
$base_datos = 'd8g69ksvdvqrvd';
$usuario1 = 'vhbdotdoakagiu';
$pass = '12ad82ffe001d86c9779a92ccdd370602c87d9d937fd32c3444af002697d56a7';
$conexion = pg_connect("host=$host port=$port dbname=$base_datos user=$usuario1 password=$pass");


$R_Nombre_Digitado=$_POST['Nombre_Digitado'];
$R_Apellidos_Digitado=$_POST['Apellidos_Digitado'];
$R_Nro_Doc_Digitado=$_POST['Nro_Doc_Digitado']; 
$R_Tipo_Documento=$_POST['Tipo_Documento'];
$R_Edad_Digitado=$_POST['Edad_Digitado'];
$R_Sexo_Digitado=$_POST['Sexo_Digitado'];
$R_Barrios_Digitado=$_POST['Barrios_Digitado'];
$R_Direccion_Digitado=$_POST['Direccion_Digitado'];
$R_Fecha_digitado=$_POST['Fecha_digitado'];
$R_Hora_digitado=$_POST['Hora_digitado'];
$R_Delito_Digitado=$_POST['Delito_Digitado'];
$R_Modalidad_Digitado=$_POST['Modalidad_Digitado'];
$R_Denuncia=$_POST['Denuncia']; 
$R_Descripcion_digitado=$_POST['Descripcion_digitado']; 
$R_Lati=$_POST['lati']; 
$R_Lngi=$_POST['lngi']; 


//echo "lati: ".$R_Lati." | ";
//echo "lngi: ".$R_Lngi." | ";


$R_lat = isset($_POST['lat']) ? $_POST['lat'] : null;
$R_lng = isset($_POST['lng']) ? $_POST['lng'] : null;

$_SESSION['lat']=$R_lat;
$_SESSION['lng']=$R_lng;

/*
$sqlgidcomuna = "select gid from comunas where st_intersects(geom, ST_GeomFromText('POINT($R_Lngi $R_Lati)', 4326));";
$Consulta_gidcomuna = pg_query($conexion, $sqlgidcomuna);
if(pg_num_rows($Consulta_gidcomuna)>0){
	$gidcomuna=pg_fetch_object($Consulta_gidcomuna);
	$GIDC=$gidcomuna->gid;
	//echo $GIDC ;
}else{
echo "No hay coincidencia" ;}
    
$sqlgidbarrio = "select gid from barrios where st_intersects(geom, ST_GeomFromText('POINT($R_Lngi $R_Lati)', 4326));";
$Consulta_gidbarrio = pg_query($conexion, $sqlgidbarrio);
if(pg_num_rows($Consulta_gidbarrio)>0){
	$gidbarrio=pg_fetch_object($Consulta_gidbarrio);
	$GIDB=$gidbarrio->gid;
	//echo $GIDB ;
}else{
echo "No hay coincidencia" ;}
*/	
//echo "aquin estoy recuperando:		gidcomuna: ".$GIDC." | gidbarrio: ".$GIDB ;

	
$sql2 ="INSERT INTO hurtos(nombre, apellidos, tipo_doc, numero_doc, sexo, direccion, barrio, fecha_hurto, modo_del, modalidad, descripcion, denuncia, edad, geom, latitud, longitud) VALUES('$R_Nombre_Digitado','$R_Apellidos_Digitado', '$R_Tipo_Documento','$R_Nro_Doc_Digitado','$R_Sexo_Digitado','$R_Direccion_Digitado','$R_Barrios_Digitado','$R_Fecha_digitado','$R_Delito_Digitado','$R_Modalidad_Digitado','$R_Descripcion_digitado','$R_Denuncia','$R_Edad_Digitado',ST_GeomFromText('POINT($R_Lngi $R_Lati)', 4326),'$R_Lati','$R_Lngi');"; // Ingreso de registro en SQL (parametros de usuario)
$resultado_insert = pg_query($conexion, $sql2); // Se ejecuta la consulta en PostgreSQL con la conexión definida anteriormente




//echo "aquin estoy recuperando "."Latitud: ".$_SESSION['lat']." | Longitud: ".$_SESSION['lng'];
//echo "/ nombre: ".$R_Nombre_Digitado."/ apellidos: ".$R_Apellidos_Digitado."/ tipo_doc: ".$R_Tipo_Documento."/ numero_doc: ".$R_Nro_Doc_Digitado."/ sexo ".$R_Sexo_Digitado."/ direccion ".$R_Direccion_Digitado."/ barrio ".$R_Barrios_Digitado."/ fecha_hurto ".$R_Fecha_digitado."/ modo_del ".$R_Delito_Digitado."/ modalidad ".$R_Modalidad_Digitado."/ descripcion ".$R_Descripcion_digitado."/ denuncia ".$R_Denuncia."/ edad ".$R_Edad_Digitado;
header('Location: Identificado.php');


?>