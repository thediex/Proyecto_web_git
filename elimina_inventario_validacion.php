<?php
session_start();
if(isset($_SESSION["inve_user"])==NULL)
{
	header ("Location: index.php");
}
$user=$_SESSION["inve_user"];
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
		<div class="row column log-in-form">
			<div align="center"><img src="camado.png"></div>
			<h4 class="text-center"><br>Sistema de Inventario Movil<br>Validacion de Inventario</h4><br>
			<h5 class="text-center"><br>El inventario comparativo fue eliminado</h5><br>
			<?php
				$conexion = mysql_connect("localhost", "root", "c4m4d02020");
				mysql_select_db("inve_movil", $conexion);
				$i_activo="DELETE FROM valida_inventario WHERE usuario='$user'";
				mysql_query($i_activo, $conexion) or die(mysql_error());
			?>
			<form action='menu_inventario.php' method='post'>
			<p><input type="submit" class="button expanded" value='Menu Validacion Inventario'></p>	
		</form>
		<form action='menu_general.php' method='post'>
			<p><input type="submit" class="button expanded" value='Menu General'></p>	
		</form>
			<div align='center'><a href="index.php" class="alert button">Salir</a></div><br/>
		</div>
		
		</div>
	</div>
  </body>
</html>
