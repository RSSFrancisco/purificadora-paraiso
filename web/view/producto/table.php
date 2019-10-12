<?php 
include('../../php/config/conection.php');
$sql = "SELECT * FROM producto";
$p_sql = $conectar->query($sql);
?>
<div class="row">
     <div class="col-lg-10"><a class="btn btn-info" href="#" onclick="form_producto()" style="color: white;">AGREGAR NUEVO PRODUCTO</a></div>
                            <div class="col-lg-12" style="margin-top: 10px;">

                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th class="text-right">Fecha entrada</th>
                                                <th class="text-right">Precio Unitario</th>
                                                <th class="text-right">Existencia</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($p_sql as $row) {?>
                                            <tr>
                                                <td>
                                                <a href="#" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="#" onclick="borrar_producto('<?php echo $row['id_producto']; ?>')" class="btn btn-danger"><i class="fa fa-eraser"></i></a>
                                                </td>
                                                <td><?php echo $row['id_producto']; ?></td>
                                                <td><?php echo $row['nombre']; ?></td>
                                                <td><?php echo $row['descripcion']; ?></td>
                                                <td class="text-right"><?php echo $row['fecha_entrada']; ?></td>
                                                <td class="text-right"><?php echo $row['precio_unitario']; ?></td>
                                                <td class="text-right"><?php echo $row['existencia']; ?></td>
                                               
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>