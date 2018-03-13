<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>


<link rel="stylesheet" type="text/css" href="hoja.css">







</head>

<body>

<h1>ACTUALIZAR</h1>
<?php

    include("conexion.php");

  if (!isset($_POST["bot_actualizar"])){

    $id_usuario=$_GET["id_usuario"];
	$nombre=$_GET["nombre"];
    $usuario=$_GET["usuario"];
	$cargo=$_GET["cargo"];
	$contrasena=$_GET["contrasena"];
	
  }else{
	
	$id_usuario=$_POST["id_usuario"];
	$nombre=$_POST["nombre"];
    $usuario=$_POST["usuario"];
	$cargo=$_POST["cargo"];
	$contrasena=$_POST["contrasena"];
	
	$sql="UPDATE USUARIO SET nombre=:miNom, usuario=:miUsu, cargo=:miCar, contrasena=:miCont WHERE id_usuario=:miid";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":miid"=>$id_usuario, ":miNom"=>$nombre, ":miUsu"=>$usuario, ":miCar"=>$cargo, ":miCont"=>  $contrasena));
	
	header("Location:index.php");
	
  }

?>
<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" class="container" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr class="danger">
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario ?>"></td>
    </tr>
    <tr class="danger">
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>"></td>
    </tr>
    <tr class="danger">
      <td>Usuario</td>
      <td><label for="usu"></label>
      <input type="text" name="usuario" id="usuario" value="<?php echo $usuario ?>"></td>
    </tr>
    <tr class="danger">
      <td>Cargo</td>
      <td><label for="car"></label>
      <input type="text" name="cargo" id="cargo" value="<?php echo $cargo ?>"></td>
    </tr>
    <tr class="danger">
      <td>Password</td>
      <td><label for="pass"></label>
      <input type="text" name="contrasena" id="contrasena" value="<?php echo $contrasena ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>