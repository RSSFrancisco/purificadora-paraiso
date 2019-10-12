<?php
try {
	if($_POST){
		include("../config/conection.php");
		include("../config/core.php");
	
		$nombre = $_POST['nombre'];
		$fecha = $_POST['fecha'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$nss = $_POST['nss'];
		
	

		$sql = "INSERT INTO empleado SET  nombre_completo='$nombre',fecha_nacimiento='$fecha',direccion='$direccion',telefono='$telefono',nss='$nss'";
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