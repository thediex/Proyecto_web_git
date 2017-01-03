<?php
session_start();
session_destroy();
unset($_SESSION["inve_user"]); 
unset($_SESSION["traslado"]); 
unset($_SESSION["usuario_nuevo"]); 
unset($_SESSION["traslado"]); 
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>    
	<div class="row">
		<div class="medium-6 medium-centered large-4 large-centered columns">
		<form action='abre_sesion_usuario.php' method='post'>
			  <div class="row column log-in-form">
				<div align="center"><img src="camado.png"></div>
				<h4 class="text-center"><br>Sistema de Inventario Movil</h4>
				<label>Usuario
				  <input type="text" placeholder="Identificacion" autofocus name='user'>
				</label>
				<label>Password
				  <input type="password" placeholder="Password" name='passwd'>
				</label>
				<p><input type="submit" class="button expanded" value='Ingresar'></p>
				<p class="text-center"><a href="#">Forgot your password?</a></p>   
			  </div>
		</form>
		</div>
	</div>
  </body>
</html>
