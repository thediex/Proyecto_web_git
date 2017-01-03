<?php
session_start();
if(isset($_SESSION["inve_user"])==NULL)
{
	header ("Location: index.php");
}
if(isset($_POST['check_list'])==NULL)
{
	$_SESSION["traslado"]=$_SESSION["traslado"];
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
			<h4 class="text-center"><br>Sistema de Inventario Movil<br>Validacion de Inventario</h4><br>			
			
			<?php
			//cantidad elementos a trasladar
			$checked_count = count($_SESSION["traslado"]);
			print"
			<h5 class='text-center'>Elementos a trasladar: $checked_count</h5><br>
			";
			?>
			<form action='confirmar_traslado.php' method='post'>
			<table>
			<tr><td align='center'>Codigo</td><td align='center'>Descripcion</td></tr>
			<?php
				$conexion = mysql_connect("localhost", "root", "c4m4d02020");
				mysql_select_db("inve_movil", $conexion);
				foreach($_SESSION["traslado"] as $elemento) {
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
			
			<select name="nuevo_usuario">
			   <option value="1">Seleccione usuario...</option> 
			   
				<?php
				//impresion de usuarios para seleccion
				$usuario="select * from usuario";
				$usuario = mysql_query($usuario, $conexion) or die(mysql_error());
				while($resulta_usuario = mysql_fetch_array($usuario))
				{						
						print"						
						<option value='$resulta_usuario[1]'>$resulta_usuario[3]</option> 						
						";					
				}
				?>
			   
			   
			</select>
			<input type='submit' name='submit' class="button expanded" Value='Trasladar'/>
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
