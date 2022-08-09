<?php
session_start();
$host = 'localhost';
$port = '5433';
$base_datos = 'hurtos';
$usuario1 = 'postgres';
$pass = 'p';
$conexion = pg_connect("host=$host port=$port dbname=$base_datos user=$usuario1 password=$pass");


$R_nombre=$_POST['nombre']; // Se guarda en una variable cada entrada definida en el formulario
$R_apellido=$_POST['apellido']; // Se guarda en una variable cada entrada definida en el formulario
$R_TipDoc=$_POST['tipo_documento']; // Se guarda en una variable cada entrada definida en el formulario
$R_numdoc=$_POST['numero_documento']; // Se guarda en una variable cada entrada definida en el formulario
$R_correo=$_POST['correo']; // Se guarda en una variable cada entrada definida en el formulario
$R_telefono=$_POST['telefono']; // Se guarda en una variable cada entrada definida en el formulario
$R_Sexo=$_POST['sexo']; // Se guarda en una variable cada entrada definida en el formulario
$R_FecNac=$_POST['fecha_nacimiento']; // Se guarda en una variable cada entrada definida en el formulario
$R_pass=$_POST['password']; // Se guarda en una variable cada entrada definida en el formulario (codificamos la contraseña en MD5)


$sql ="INSERT INTO usuarios(nombre, apellidos, tipo_doc,documento,correo,telefono,sexo,fecha_nac,contraseña) VALUES('$R_nombre', '$R_apellido','$R_TipDoc','$R_numdoc','$R_correo','$R_telefono', '$R_Sexo','$R_FecNac','$R_pass');"; // Ingreso de registro en SQL (parametros de usuario)
$resultado = pg_query($conexion, $sql); // Se ejecuta la consulta en PostgreSQL con la conexión definida anteriormente


$_SESSION['nombre']=$R_nombre;

//echo "nombre:".$R_nombre."/ apellido: ".$R_apellido."tipo_documento:".$R_TipDoc."numero_documento:".$R_numdoc."correo:".$R_correo."telefono:".$R_telefono."sexo:".$R_Sexo."fecha_nacimiento:".$R_FecNac."password:".$R_pass;
header('Location: Identificado.php');



?>