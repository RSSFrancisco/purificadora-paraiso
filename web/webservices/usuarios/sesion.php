<?php
include('../config/conection.php');
$json= array();
if(isset($_GET['user']) && isset($_GET['pwd'])){
	$user = $_GET['user'];
	$pwd = $_GET['pwd'];
	$contrasenia = base64_encode($pwd);

	$sql = "SELECT usuario,contrasenia,correo FROM usuario WHERE correo='$user' AND contrasenia = '$contrasenia'";
	$exec = $conectar->query($sql);
	if ($sql) {
		if($reg = mysqli_fetch_array($exec)){
			$json['datos'][]= $reg;
		}
		mysqli_close($conectar);
		echo json_encode($json);
	}
}

?>