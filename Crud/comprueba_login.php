<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
try{
	
	$base=new PDO("mysql:host=localhost;       dbname=venta", "root", "");
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="select * from usuario where usuario=:login and contrasena= :contrasena";
	$resultado=$base->prepare($sql);
	$login=htmlentities(addslashes($_POST["login"]));
	$contrasena=htmlentities(addslashes($_POST["contrasena"]));
	$resultado->bindValue(":login", $login);
	$resultado->bindValue(":contrasena", $contrasena);
	$resultado->execute();
	$numero_registro=$resultado->rowCount();
	
	if($numero_registro!=0){
		
		session_start();
		$_SESSION["usuario"]=$_POST["login"];
		header("location:index.php");
		
		}else{
			
			header("location:login.php");
			
			}
	
}catch(Exeption $e){
	
	die("Error:". $e->getMessage());
	
	}
?>
</body>
</html>