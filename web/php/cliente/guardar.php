<?php
try {
	if($_POST){
		include("../config/conection.php");
		include("../config/core.php");
	
		$nombre = $_POST['nombre'];
		$fecha = $_POST['fecha'];
		$direccion = $_POST['direccion'];
		$colonia = $_POST['colonia'];
		$ciudad = $_POST['ciudad'];
		$estado = $_POST['estado'];
	

		$sql = "INSERT INTO cliente SET  nombre_completo='$nombre',fecha_nacimiento='$fecha',direccion='$direccion',colonia='$colonia',ciudad='$ciudad',estado='$estado'";
		$procedure = $conectar->query($sql);
		echo "<div class='alert alert-success alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
		Su acción se realizo con exito, en unos segundos se actualizara el listado

		</div>";

	}else{
		exit();
	}
} catch (Exception $e) {
	
}