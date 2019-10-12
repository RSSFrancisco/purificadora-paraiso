<?php
try {
	if($_POST){
		include("../config/conection.php");
		include("../config/core.php");
		$clave = $_POST['clave'];
		$nombre = $_POST['nombre'];
		$fecha = $_POST['fecha'];
		$direccion = $_POST['direccion'];
		$colonia = $_POST['colonia'];
		$ciudad = $_POST['ciudad'];
		$estado = $_POST['estado'];
        //Codigo QR generado al momento de iniciar el formulario
		$codigoQR = $_POST['codigoQR'];
		//Codigo QR generado despues de actualizar
		$codigoQR_new = $clave.$nombre.$fecha;
		if($codigoQR==$codigoQR_new){
			$qr = $codigoQR;
		}else{
			$qr = $codigoQR_new;
			unlink("../../view/cliente/temp/codigoqr".$codigoQR.".png");
		}
		$sql = "UPDATE cliente SET  nombre_completo='$nombre',fecha_nacimiento='$fecha',direccion='$direccion',colonia='$colonia',ciudad='$ciudad',estado='$estado',codigo_qr='$qr' WHERE id_cliente='$clave'";
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