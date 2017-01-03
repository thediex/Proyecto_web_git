<?php
session_start();
require ("conexion.php");
$ip="127.0.0.1";
$user="root";
$password="c4m4d02020";
$db="inve_movil";
$conexion = mysql_connect($ip,$user,$password);
mysql_select_db($db, $conexion);

$usuario=$_POST["user"];
$password=$_POST["passwd"];
$usuario=trim($usuario);
$password=trim($password);
$usuario=str_replace("'",'',$usuario);
$usuario=str_replace("/",'',$usuario);
$password=str_replace("'",'',$password);
$password=str_replace("/",'',$password);

$mat="select id,passwd from usuario;";
$matr = mysql_query($mat, $conexion) or die(mysql_error());
$existe=0;

While ($row2 = mysql_fetch_array($matr))
{
      $usuariodb=$row2[0];
      $passworddb=$row2[1];
      if($usuario==$usuariodb and $password==$passworddb)
      {
               $_SESSION["inve_user"]=$usuario;
               header ("Location: menu_general.php");
               $existe=1;
      }
      if($usuario==$usuariodb and $password!=$passworddb)
      {

               header ("Location: error_pass.php");
               $existe=1;
      }
      
}
if($existe==0)
header ("Location: error_existe.php");

?>

