<?php
try {
	if($_POST){
		include("../config/conection.php");
		include("../config/core.php");
	
		$usuario = $_POST['usuario'];
		$correo = $_POST['correo'];
		$contrasenia =base64_encode($_POST['contrasenia']);
		$empleado = $_POST['empleado'];
		$tipo = $_POST['tipo'];

		$sql = "INSERT INTO usuario SET  usuario='$usuario',correo='$correo',contrasenia='$contrasenia',id_empleado='$empleado',tipo='$tipo'";
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