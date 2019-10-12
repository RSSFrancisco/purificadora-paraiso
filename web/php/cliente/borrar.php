<?php
try {
	if($_POST){
		include("../config/conection.php");
		include("../config/core.php");
		// se puede cambiar por el metodo GET
		$clave = $_POST['clave'];
		$sql = "DELETE FROM cliente  WHERE id_cliente='$clave'";
		$procedure = $conectar->query($sql);
	}else{
		exit();
	}
} catch (Exception $e) {
	
}