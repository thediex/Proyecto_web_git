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
			<h5 class="text-center"><br>Inventario validado</h5><br>
			<table>
			<tr><td align='center'>Codigo</td><td align='center'>Descripcion</td></tr>
			<?php
				$conexion = mysql_connect("localhost", "root", "c4m4d02020");
				mysql_select_db("inve_movil", $conexion);
				$v_activo="select * from activo where usuario='$user'";
				$v_activo = mysql_query($v_activo, $conexion) or die(mysql_error());
				while($activo_validado = mysql_fetch_array($v_activo))
				{
					$v_activo2="select * from valida_inventario where cod_activo='$activo_validado[2]'";
					$v_activo2 = mysql_query($v_activo2, $conexion) or die(mysql_error());
					$activo_validado2 = mysql_fetch_array($v_activo2);
					
					if($activo_validado2!=NULL)
					{
						print"<tr><td>$activo_validado[2]</td><td>$activo_validado[1]</td></tr>";
					}
					
				}
			?>
			</table>
			
			<h5 class="text-center"><br>Inventario sin Validar</h5><br>
			<table>
			<tr><td align='center'>Codigo</td><td align='center'>Descripcion</td></tr>
			<?php
				$conexion = mysql_connect("localhost", "root", "c4m4d02020");
				mysql_select_db("inve_movil", $conexion);
				$v_activo="select * from activo where usuario='$user'";
				$v_activo = mysql_query($v_activo, $conexion) or die(mysql_error());
				while($activo_validado = mysql_fetch_array($v_activo))
				{
					$v_activo2="select * from valida_inventario where cod_activo='$activo_validado[2]'";
					$v_activo2 = mysql_query($v_activo2, $conexion) or die(mysql_error());
					$activo_validado2 = mysql_fetch_array($v_activo2);
					
					if($activo_validado2==NULL)
					{
						print"<tr><td>$activo_validado[2]</td><td>$activo_validado[1]</td></tr>";
					}
					
				}
			?>
			</table>
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
