<?php session_start(); ?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" />
	
	<script src="js/jquery-3.4.1.js"></script>  <!-- plugin jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js"></script>
	<title>Reporte hurtos en Santiago de Cali</title>
	
	<style>
	
	*{	
		padding: 0% ;
		margin: 0% 0%;		
	}
	
	html, body{
	height:100% ;
	width:100% vw;
	}
	
	#total{
	height:100% ;
	width:100% ;
	}
	
	#titulo{
	color:white; 
	font-size: 250%;
	font-family: Arial;
	font-weight: Bold;
	}
	
	#texto{
	color:white; 
	font-family: Arial;
	font-size: 100%;
	}
	
	#img{
	width:100%;
	height:100%;}
	
	#datos{
	position:relative;
	float:center;
	width:40%;
	height:100%;
	background-color:black;
	top:-95%;
	border-radius:38px;
	outline: 3px solid grey;
	outline-offset: -14px;
	left:35%;}
	
	#boton{
	background-color:#1E90FF;
	border-color:#1E90FF;
	color:white;
	width:40%;
	font-size: 100%;
	border-radius:7px;
	align:"center";
	cursor: pointer;
	}

	.campos {
    border-radius: 5px;
	border: 0;
	background-color:#4F4F4F;
	width:70%;
	height:10%;
    }

	.seleccion {
    border-radius: 5px;
	border: 0;
	background-color:white;
	width:70%;
	height:10%;
    }

	#contenedor {
 	display: flex;
  	flex-direction: row;
  	flex-wrap: wrap;
	}

#contenedor > div {
  width: 50%;
}
	</style>
	
	</head>	
	<body bgcolor="grey">
	<form class="formulario" id="formulario" action="subir_reporte.php" method="POST">
		<div id="total" style="z-index:0">
				<div id="img" style="z-index:1">
				</div>

				<div id="datos" style="z-index:1">
				<br><br><p align="center" id="titulo">REPORTAR</p>


				<div id="contenedor">
  				<div>
					<br><p align="center" id="texto">Nombre<br>
					<input type="text" class="campos" id="Nombre_Digitado" placeholder="Nombre" name="Nombre_Digitado">



					<br><p align="center" id="texto">Número de documento<br>
					<input type="text" id="Nro_Doc_Digitado" placeholder="Número de documento" class="campos" name="Nro_Doc_Digitado">

					<br><p align="center" id="texto">Edad<br>
					<input type="text" id="Edad_Digitado" placeholder="Edad" class="campos" name="Edad_Digitado">

					<br><p align="center" id="texto">Barrio<br>
					<input type="text" id="Barrios_Digitado" placeholder="Barrio" class="campos" name="Barrios_Digitado">

					<br><p align="center" id="texto">Fecha<br>
					<input class="seleccion" type="date" name="Fecha_digitado">

					<p align="center" id="texto">Tipo delito<br name="Delito_Digitado">
					<select class="seleccion"  name="Delito_Digitado" id="Delito_Digitado">
					<option value="H. Personas">Hurto a personas</option>
					<option value="H. Residencias">Hurto a residencias</option>
					<option value="H. Automotores">Hurto a automotores</option>
					<option value="H. Motocicletas">Hurto a motocicletas</option>
					<option value="H. E. Financieras">Hurto a entidades financieras</option>
					<option value="H. E. Comerciales">Hurto a entidades comerciales</option>
					</select>

					<br><br><p align="center" id="texto">¿Realizo la denuncia?<br name="Denuncia_Digitado">
				</div>
				<div>
					<br><p align="center" id="texto">Apellidos<br>
					<input type="text" id="Apellidos_Digitado" placeholder="Apellidos" class="campos" name="Apellidos_Digitado">

					<p align="center" id="texto">Tipo de documento<br name="Tipo_Documento_Digitado">
					<select class="seleccion"  name="Tipo_Documento" id="Tipo_Documento">
					<option value="CC">Cédula de ciudadanía </option>
					<option value="TI">Tarjeta de identidad</option>
					<option value="DE">Tipo de documento extranjero</option>
					<option value="Otros">Otros</option>
					</select>

					<p align="center" id="texto">Sexo<br name="Sexo_Digitado">
					<select class="seleccion"  name="Sexo_Digitado" id="Sexo_Digitado">
					<option value="Femenino">Femenino</option>
					<option value="Masculino">Masculino</option>
					<option value="Otro">Otro</option>
					</select>

					<br><p align="center" id="texto">Dirección<br>
					<input type="text" id="Direccion_Digitado" placeholder="Dirección" class="campos" name="Direccion_Digitado">

					<br><p align="center" id="texto">Hora<br>
					<input class="seleccion" type="time" name="Hora_digitado">



					<p align="center" id="texto">Modalidad<br name="Modalidad_Digitado">
					<select class="seleccion" name="Modalidad_Digitado" id="Modalidad_Digitado">
					<option value="Raponazo">Raponazo</option>
					<option value="Cosquilleo">Cosquilleo</option>
					<option value="Arma blanca">Arma blanca</option>
					<option value="Arma de fuego">Arma de fuego</option>
					<option value="Otro">Otro</option>
					</select>


					<br><br><select class="seleccion" name="Denuncia" id="Denuncia">
					<option value="Si">Si </option>
					<option value="No">No</option>
					</select>
				</div>
				</div>
				<br><br><br><br><p align="center" id="texto">Descripción<br>
				<textarea class="seleccion" placeholder="Descripcion" style="width:50%;height:15%" name="Descripcion_digitado"></textarea>







				<!-- <br><br><p align="center" id="texto">
				<br><br><p align="center"><a id="registro"><input type="submit" value="Submit"><br><br> input tipo enviar -->
				<!-- <br><br><p align="center"><a id="registro" href="identificado.php"><input type ="button" value= "Volver al visor" id="geovisor"> -->
				
				<div class="formulario__grupo formulario__grupo-btn-enviar" >
				<br><p align="center" id="texto">
				<br><p align="center" href="identificado.php"><button type="submit" id="boton">Enviar</button>
				
				
				
				<br><br><p align="center"><a id="visor" href="identificado.php"><input type ="button" value= "Volver" id="boton">
				</div>
				
				<input id="lati" name="lati" type="hidden" value="<?php echo $_SESSION['lat']; ?>" >
				<input id="lngi" name="lngi" type="hidden" value="<?php echo $_SESSION['lng']; ?>" >
		</div>
	</form>
	
	<?php
	
	//echo "Latitud: ".$_SESSION['lat'];
	//echo "Latitud: ".$_SESSION['lng'];
	
	?>
	
	</body>
	
	