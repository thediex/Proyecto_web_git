<?php
session_start();

if(isset($_SESSION["inve_user"])==NULL)
{
	header ("Location: index.php");
}
if(isset($_POST['check_list'])==NULL)
{
	header ("Location: valida_inventario_traslado.php");
}
if(isset($_POST['check_list'])!=NULL)
{
	$_SESSION["traslado"]=$_POST['check_list'];
}
$user=$_SESSION["inve_user"];
unset($_POST['nuevo_usuario']); 

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
			<h4 class="text-center"><br>Sistema de Inventario Movil<br>Inventario para Traslado</h4><br>			
			
			<?php
			//cantidad elementos a trasladar
			$checked_count = count($_SESSION["traslado"]);
			print"
			<h5 class='text-center'>Elementos Trasladados: $checked_count</h5><br>
			";
			?>
			
			<table>
			<tr><td align='center'>Codigo</td><td align='center'>Descripcion</td></tr>
			<?php
				$conexion = mysql_connect("localhost", "root", "c4m4d02020");
				mysql_select_db("inve_movil", $conexion);
				foreach($_SESSION["traslado"] as $elemento) {
					
					
					//consulta activos trasladados para el usuario actual
					$t_activo="select * from tmp_traslado where cons=$elemento";
					$t_activo = mysql_query($t_activo, $conexion) or die(mysql_error());
					while($activo_traslado = mysql_fetch_array($t_activo))
						{
							$cod_activot=$activo_traslado[1];
							//consulta los datos del activo para visualizar
							$v_activo="select * from activo where cons=$cod_activot";
							$v_activo = mysql_query($v_activo, $conexion) or die(mysql_error());
							$activo_validado = mysql_fetch_array($v_activo);				
							print"						
							<tr><td>$activo_validado[2]</td><td>$activo_validado[1]</td></tr>						
							";		
							//actualiza estado de P a R, para finalizacion de traslado en tabla temporal
							$actualiza_temporal="update tmp_traslado set estado='R' where cons=$activo_traslado[0]";
							mysql_query($actualiza_temporal, $conexion) or die(mysql_error());
							//actualiza usuario propietario en activo
							$actualiza_temporal="update activo set usuario='$activo_traslado[3]' where cons=$activo_validado[0]";
							mysql_query($actualiza_temporal, $conexion) or die(mysql_error());
						}
					
					
					
					
					
				}
			?>
			</table>
			
			
		<form action='menu_general.php' method='post'>
			<p><input type="submit" class="button expanded" value='Menu General'></p>	
		</form>
			<div align='center'><a href="index.php" class="alert button">Salir</a></div><br/>
		</div>
		
		</div>
	</div>
  </body>
</html>
