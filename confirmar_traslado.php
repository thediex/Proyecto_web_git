<?php
session_start();
//si no existe sesion, lleva a la pantalla de inicio de sesion
if(isset($_SESSION["inve_user"])==NULL)
{
	header ("Location: index.php");
}
//trae el usuario logueado
$user=$_SESSION["inve_user"];
//trae el inventario a trasladar con el numero de consecutivo
$traslado=$_SESSION["traslado"];
//trae la variable del nuevo usuario (cedula)
$usuario_nuevo=$_POST['nuevo_usuario'];
//si no selecciona usuario, devuelve al listado de seleccion de usuario
if($usuario_nuevo==1)
{
	header ("Location: listado_trasladar.php");
}
$_SESSION["nuevo_usuario"]=$_POST['nuevo_usuario'];
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
			
			<?php
			//cantidad elementos a trasladar
			$checked_count = count($traslado);
			//conexion a base de datos
			$conexion = mysql_connect("localhost", "root", "c4m4d02020");
			mysql_select_db("inve_movil", $conexion);
		
			$sentencia="select * from usuario where id='$usuario_nuevo'";
			$nombre_nuevo = mysql_query($sentencia, $conexion) or die(mysql_error());
			$nombre = mysql_fetch_array($nombre_nuevo);
			
			print"
			<h5 class='text-center'>Confirmacion lementos a trasladar: $checked_count <br><b>Nuevo Usuario: $nombre[3]</b></h5><br>
			";
			?>
			
			<table>
			<tr><td align='center'>Codigo</td><td align='center'>Descripcion</td></tr>
			<?php
				
				foreach($traslado as $elemento) {
					//print"$elemento-";
					
					$v_activo="select * from activo where cons=$elemento";
					$v_activo = mysql_query($v_activo, $conexion) or die(mysql_error());
					while($activo_validado = mysql_fetch_array($v_activo))
					{						
							print"						
							<td>$activo_validado[2]</td><td>$activo_validado[1]</td></tr>						
							";					
					}
				}
			?>
			</table>
			<form action='traslado_realizado.php' method='post'>
			<p><input type="submit" class="button expanded" value='Confirmar Traslado'></p>	
			</form>
			<form action='listado_trasladar.php' method='post'>
			<p><input type="submit" class="button expanded" value='Volver Seleccion Usuario Traslado'></p>	
			</form>
			<form action='consulta_inventario_traslado.php' method='post'>
			<p><input type="submit" class="button expanded" value='Volver Seleccion Inventario'></p>	
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
