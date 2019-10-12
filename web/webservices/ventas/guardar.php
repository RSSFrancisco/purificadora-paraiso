<?php
include('../config/conection.php');
$json= array();
if(isset($_GET['codigo_qr']) && isset($_GET['total'])){
	$codigo_qr = $_GET['codigo_qr'];
	$total = $_GET['total'];
	$detalle = $_GET['detalle'];
	$cantidad = $_GET['cantidad'];
	$producto = $_GET['producto'];
	$empleado = $_GET['empleado'];

	$sql = "INSERT INTO venta SET producto = '$producto',qr_cliente= '$codigo_qr',cantidad ='$cantidad',total= '$total', detalles = '$detalle',empleado='$empleado'";
	$exec = $conectar->query($sql);

    $sql2 = "SELECT * FROM venta WHERE qr_cliente='$codigo_qr' LIMIT 0,1";
    $exec2 =  $conectar->query($sql2);
	if ($sql) {
		if($reg = mysqli_fetch_array($exec2)){
			$json['datos'][]= $reg;
		}
		mysqli_close($conectar);
		echo json_encode($json);
	}
}

?>