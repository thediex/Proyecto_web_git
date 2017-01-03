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
				<h4 class="text-center"><br>Sistema de Inventario Movil</h4>
<?php
$user=$_SESSION["inve_user"];
//session_start();
$activo=$_POST["activo"];
if($activo==NULL)
	header ("Location: consulta_activo.php");
$activo=$activo*1;
$activo=trim($activo);
$activo=str_replace("'",'',$activo);
$activo=str_replace("/",'',$activo);
$conexion = mysql_connect("localhost", "root", "c4m4d02020");
mysql_select_db("inve_movil", $conexion);
$mat="select * from activo where codigo='$activo';";
$matr = mysql_query($mat, $conexion) or die(mysql_error());
$registro = mysql_fetch_array($matr);
$consecutivo=$registro[0];
$descripcion=$registro[1];
$codigo_activo=$registro[2];
$sede=$registro[3];
$estado=$registro[4];
$usuario=$registro[5];

if($registro!=NULL)
{
	//trae nombre de sede
	$d_sede="select descripcion from sede where cons=$sede;";
	$d_sede = mysql_query($d_sede, $conexion) or die(mysql_error());
	$d_sede = mysql_fetch_array($d_sede);
	$d_sede=$d_sede[0];

	//trae estado
	$d_estado="select descripcion from estado_activo where cons=$estado;";
	$d_estado = mysql_query($d_estado, $conexion) or die(mysql_error());
	$d_estado = mysql_fetch_array($d_estado);
	$d_estado=$d_estado[0];

	//trae usuario
	$n_usuario="select nombre from usuario where id='$usuario';";
	$n_usuario = mysql_query($n_usuario, $conexion) or die(mysql_error());
	$n_usuario = mysql_fetch_array($n_usuario);
	$n_usuario=$n_usuario[0];
}

//Verificacion existencia de activo
if($registro!=NULL)
      {
			//impresion datos de activo
			print"
			   <table>
			   <tr><td>Codigo Activo: </td><td>$codigo_activo</td></tr>
			   <tr><td>Descripcion: </td><td>$descripcion</td></tr>
			   <tr><td>Estado: </td><td>$d_estado</td></tr>
			   <tr><td>Ubicacion: </td><td>$d_sede</td></tr>
			   <tr><td>Usuario Asignado: </td><td>$n_usuario</td></tr>
			   </table>
			   ";
      }
else
      {
               $_SESSION["consecutivo"]=$consecutivo;
               //header ("Location: menu_general.php");
			   print"<div align='center'>No existe codigo de Activo</div><br><br>";
               $existe=1;
      }
?>
<form action='consulta_activo.php' method='post'>
	<p><input type="submit" class="button expanded" value='Consultar otro activo'></p>	
</form>
<form action='menu_general.php' method='post'>
	<p><input type="submit" class="button expanded" value='Menu General'></p>	
</form>
<div align='center'><a href="index.php" class="alert button">Salir</a></div><br/>
