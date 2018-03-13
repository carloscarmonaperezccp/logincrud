<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD WELCOME TO SYSTEM</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-sc">

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>



<link rel="stylesheet" type="text/css" href="hoja.css">
</head>
<body>

<div class="container">
<ul class="pagination">
  <li><a href="index.php">Inicio</a></li>
  <li><a href="tabla.php">Tabla</a></li>
  <li><a href="cierre.php">Cerrar sesion</a></li>
  <li class="active"></li> 
</ul>



<?php
session_start();
if(!isset($_SESSION["usuario"])){
	header("Location:login.php");
	}

?>

<?php 
include("conexion.php");


?>


<h1>Catalogo de usuarios<span class="subtitulo"></span></h1>

<?php
     echo "Bienvenido:" . $_SESSION["usuario"] . "<br><br>";
?>


<div class="table-responsive">
<table width="528" height="119" border="1" class="table table-condensed" class="container" >
  <tr class="danger">
    <td colspan="3">CONTENIDO</td>
  </tr>
  <tr class="info">
    <td><img src="imagenes/uno.jpg" width="300" heigth="166"></td>
    <td><img src="imagenes/dos.jpg" width="300" heigth="166"></td>
    <td><img src="imagenes/tres.jpg" width="300" heigth="166"></td>
     <td><img src="imagenes/cuatro.jpg" width="200" heigth="100"></td>
  </tr>
</table>
</div>
</body>
</html>