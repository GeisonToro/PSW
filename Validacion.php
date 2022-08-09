<?php
session_start();
$host = 'ec2-54-152-28-9.compute-1.amazonaws.com';
$port = '5432';
$base_datos = 'd8g69ksvdvqrvd';
$usuario1 = 'vhbdotdoakagiu';
$pass = '12ad82ffe001d86c9779a92ccdd370602c87d9d937fd32c3444af002697d56a7';
$conexion = pg_connect("host=$host port=$port dbname=$base_datos user=$usuario1 password=$pass");


$usuario=$_POST['usuario'];
$clave=$_POST['password'];

$Validacion_User="SELECT documento,contraseña FROM public.usuarios WHERE documento='$usuario' AND contraseña='$clave'";
$consulta=pg_query($conexion,$Validacion_User);


if(pg_num_rows($consulta)>0){
    // print_r($todos_barrios);
    $_SESSION= null;
    $Consulta_nombre="SELECT nombre FROM public.usuarios WHERE documento='$usuario'";
    $Nombre_Obtenido=pg_query($conexion,$Consulta_nombre);
    
    while ($row = pg_fetch_object($Nombre_Obtenido)) {
        $_SESSION['Nombre_usuario']=$row->nombres_admin;
      }
    header('Location: Identificado.php');
}else{
    echo "<script>
        alert('Datos Incorrectos');
                window.location='Login.html'
                </script>";
}



?>