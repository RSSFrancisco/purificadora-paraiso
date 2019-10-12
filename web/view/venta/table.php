<?php 
include('../../php/config/conection.php');
$sql = "SELECT venta.id_venta,venta.producto,venta.empleado,venta.qr_cliente,venta.cantidad,venta.detalles,venta.fecha,venta.hora,venta.total,c.nombre_completo as nombre_cliente FROM venta  INNER JOIN cliente as c ON venta.qr_cliente = c.codigo_qr";
$p_sql = $conectar->query($sql);
?>
<div class="row">
     <div class="col-lg-10"><a class="btn btn-info" href="#" onclick="form_venta()" style="color: white;">AGREGAR VENTA</a></div>
                            <div class="col-lg-12" style="margin-top: 10px;">

                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#</th>
                                                <th>Empleado</th>
                                                <th>Cliente</th>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Total</th>
                                                <th>Detalles</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($p_sql as $row) {?>
                                            <tr>
                                                <td>
                                                <a href="#" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fa fa-eraser"></i></a>
                                                </td>
                                                <td><?php echo $row['id_venta']; ?></td>
                                                <td><?php echo $row['empleado']; ?></td>
                                                 <td><?php echo $row['nombre_cliente']; ?></td>
                                                <td><?php echo $row['producto']; ?></td>
                                                <td><?php echo $row['cantidad']; ?></td>
                                                <td><?php echo $row['total']; ?></td>
                                                <td><?php echo $row['detalles']; ?></td>
                                                <td><?php echo $row['fecha']; ?></td>
                                                <td><?php echo $row['hora']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>