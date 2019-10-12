<?php 
include('../../php/config/conection.php');
$sql = "SELECT * FROM cliente";
$p_sql = $conectar->query($sql);
 //Generador de codigo QR para cada cliente 
    require '../../phpqrcode/qrlib.php';
    $dir = 'temp/';
    $tamanio = 10;
    $level = 'H';
    $frameSize = 3;
  
?>
<div class="row">
      <div class="col-lg-10"><a class="btn btn-info" href="#" onclick="form_cliente()" style="color: white;">AGREGAR NUEVO CLIENTE</a></div>
                            <div class="col-lg-12" style="margin-top: 10px;">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Codigo QR</th>
                                                <th>Nombre</th>
                                                <th>Fecha nacimiento</th>
                                                <th class="text-right">Dirección</th>
                                                <th class="text-right">Colonia</th>
                                                <th class="text-right">Ciudad</th>
                                                <th class="text-right">Estado</th>
                                                <th class="text-right">Codigo QR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($p_sql as $row) {?>
                                            <tr>
                                                <td>
                                                <a href="#" onclick="editar_cliente('<?php echo $row['id_cliente']; ?>')" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="#" onclick="borrar_cliente('<?php echo $row['id_cliente']; ?>')" class="btn btn-danger"><i class="fa fa-eraser"></i></a>
                                                </td>
                                                <td>
                                                    <?php
    $contenido_qr = $row['id_cliente'].$row['nombre_completo'].$row['fecha_nacimiento'];
    $filename = $dir.'codigoqr'.$contenido_qr.'.png';
    $contenido =$contenido_qr;
    // Se genera el codigo Qr que le corresponde a la consulta a la tabla cliente
    QRcode::png($contenido,$filename,$level,$tamanio,$frameSize);
    //Se inserta el codigo qr en la base de datos o si existe se actualiza el codigo qr
    if($row['codigo_qr']==""){
    $id_cliente = $row['id_cliente'];
    $sql_insert_cliente = "UPDATE cliente SET codigo_qr='$contenido' WHERE id_cliente='$id_cliente' ";
    $exec_update_cliente = $conectar->query($sql_insert_cliente); 
    }
  
                                                    ?>
                                                 <img src="view/cliente/<?php echo $filename; ?>" style="width: 200px;">
                                                </td>
                                                <td><?php echo $row['nombre_completo']; ?></td>
                                                <td><?php echo $row['fecha_nacimiento']; ?></td>
                                                <td class="text-right"><?php echo $row['direccion']; ?></td>
                                                <td class="text-right"><?php echo $row['colonia']; ?></td>
                                                <td class="text-right"><?php echo $row['ciudad']; ?></td>
                                                <td class="text-right"><?php echo $row['estado']; ?></td>
                                                <td class="text-right"><?php echo $row['codigo_qr']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>