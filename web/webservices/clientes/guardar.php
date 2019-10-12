<?php
include('../config/conection.php');
$json= array();
if(isset($_GET['nombre']) || isset($_GET['fecha']) || isset($_GET['direccion']) || isset($_GET['colonia']) || isset($_GET['ciudad']) || isset($_GET['estado'])){
	$nombre = $_GET['nombre'];
	$fecha = $_GET['fecha'];
	$direccion = $_GET['direccion'];
	$colonia = $_GET['colonia'];
	$ciudad = $_GET['ciudad'];
	$estado = $_GET['estado'];

	$sql = "INSERT INTO cliente SET nombre_completo='$nombre',fecha_nacimiento='$fecha',direccion='$direccion',colonia='$colonia',ciudad='$ciudad',estado='$estado'";
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