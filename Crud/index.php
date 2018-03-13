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

<link rel="stylesheet" type="text/css" href="hoja.css">


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
 
  <div class="header"><a href="#"><img src="imagenes/tres.jpg" alt="Insert Logo Here" name="Insert_logo" class="img-rounded" alt="Cinque Terre" width="110" height=" 100" id="Insert_logo" style="background-color: #FFFFFF; display:block;" /></a> 
    <!-- end .header --></div>
      <ul class="pagination">
  <li><a href="index.php">Inicio</a></li>
  <li><a href="tabla.php">Tabla</a></li>
  <li><a href="cierre.php">Cerrar sesion</a></li>
  <li class="active"></li> 
</ul>



<?php
session_start();
if(!isset($_SESSION["usuario"])){
	header("Location:index.php");
	}

?>




<?php 
include("conexion.php");

/*$conexion=$base->query("SELECT * FROM usuario");

$registros=$conexion->fetchAll(PDO::FETCH_OBJ);*/

$registros=$base->query("SELECT * FROM usuario")->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST["cr"])){
	$id_usuario=$_POST["id_usuario"];
	$nombre=$_POST["nombre"];
	$usuario=$_POST["usuario"];
	$cargo=$_POST["cargo"];
	$contrasena=$_POST["contrasena"];
	
	$sql="insert into usuario (nombre,usuario,cargo,contrasena) values(:nombre, :usuario, :cargo, :contrasena)";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":nombre"=>$nombre, ":usuario"=>$usuario, ":cargo"=>$cargo, ":contrasena"=>$contrasena));
	header("Location:index.php");
	}
?>

<h1>Bienvenido al sistema<span class="subtitulo"> 
<?php
     echo "Bienvenido:" . $_SESSION["usuario"] . "<br><br>";

?></span></h1>


<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <table width="50%" border="0" align="center" class="container" class="table">
    <tr class="danger" >
      <td class="primera_fila">id_usuario</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Usuario</td>
      <td class="primera_fila">Cargo</td>
      <td class="primera_fila">Contrasena</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr>   
     
   <?php
   foreach($registros as $persona):?>	
      
   	<tr>
      <td><?php echo $persona->id_usuario?></td>
      <td><?php echo $persona->nombre?></td>
      <td><?php echo $persona->usuario?></td>
      <td><?php echo $persona->cargo?></td>
      <td><?php echo $persona->contrasena?></td>
      <td class='bot'><a href="borrar.php?id_usuario=<?php echo $persona->id_usuario?>"><input type='button' name='del' id='del'    value='Borrar'></a></td>
      
      <td class='bot'><a href="editar.php?id_usuario=<?php echo $persona->id_usuario?> & nombre=<?php echo $persona->nombre?> & usuario=<?php echo $persona->usuario?> & cargo=<?php echo $persona->cargo?> & contrasena=<?php echo $persona->contrasena?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>   
        
    <?php
	endforeach;
    ?> 
       
	<tr>
	<td></td>
      <td><input type='text' name='nombre' size='10' class='centrado'></td>
      <td><input type='text' name='usuario' size='10' class='centrado'></td>
      <td><input type='text' name='cargo' size='10' class='centrado'></td>
      <td><input type='text' name='contrasena' size='10' class='centrado'></td>
      <td class='bot'><a href="borrar.php"?id_usuario=<?php echo $persona->id_usuario?>"><input type='submit' name='cr' id='cr'  value='Registrar'></a></td></tr>    
  </table>
<p>&nbsp;</p>
</body>
</html>