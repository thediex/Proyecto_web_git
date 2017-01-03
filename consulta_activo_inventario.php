<?php
session_start();
if(isset($_SESSION["inve_user"])==NULL)
{
	header ("Location: index.php");
}
else
{
	$user=$_SESSION["inve_user"];
print"
	<!doctype html>
	<html class='no-js' lang='en' dir='ltr'>
	  <head>
		<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
		<meta http-equiv='x-ua-compatible' content='ie=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>Sistema de Inventario</title>
		<link rel='stylesheet' href='css/foundation.css'>
		<link rel='stylesheet' href='css/app.css'>
	  </head>
	  <body>    
		<div class='row'>
			<div class='medium-6 medium-centered large-4 large-centered columns'>
			<form action='abre_sesion_activo_inventario.php' method='post'>
				  <div class='row column log-in-form'>
					<div align='center'><img src='camado.png'></div>
					<h4 class='text-center'><br>Sistema de Inventario Movil<br>Validacion de Inventario</h4>
					<label>Codigo Activo
					  <input type='text' placeholder='ID Activo' autofocus name='activo'>
					</label>
					<p><input type='submit' class='button expanded' value='Inventariar Activo'></p>
				  </div>
			</form>
			<form action='menu_inventario.php' method='post'>
				<p><input type='submit' class='button expanded' value='Menu Validacion Inventario'></p>	
			</form>
			<form action='menu_general.php' method='post'>
				<p><input type='submit' class='button expanded' value='Menu General'></p>	
			</form>
			<div align='center'><a href='index.php' class='alert button'>Salir</a></div><br/>
			</div>
		</div>
	  </body>
	</html>
	";
}
?>