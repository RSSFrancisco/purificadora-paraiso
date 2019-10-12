<?php 
include('../../php/config/conection.php');
$sql = "SELECT * FROM empleado";
$p_sql = $conectar->query($sql);
?>
<div class="row">
     <div class="col-lg-10"><a class="btn btn-info" href="#" onclick="form_empleado()" style="color: white;">AGREGAR NUEVO EMPLEADO</a></div>
                            <div class="col-lg-12" style="margin-top: 10px;">

                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>NSS</th>
                                                <th class="text-right">Fecha nacimiento</th>
                                                <th class="text-right">Dirección</th>
                                                <th class="text-right">Telefono</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($p_sql as $row) {?>
                                            <tr>
                                                <td>
                                                <a href="#" onclick="editar_empleado('<?php echo $row['id_empleado'];?>')" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="#" onclick="borrar_empleado('<?php echo $row['id_empleado']; ?>')" class="btn btn-danger"><i class="fa fa-eraser"></i></a>
                                                </td>
                                                <td><?php echo $row['id_empleado']; ?></td>
                                                <td><?php echo $row['nombre_completo']; ?></td>
                                                <td><?php echo $row['nss']; ?></td>
                                                <td class="text-right"><?php echo $row['fecha_nacimiento']; ?></td>
                                                <td class="text-right"><?php echo $row['direccion']; ?></td>
                                                <td class="text-right"><?php echo $row['telefono']; ?></td>
                                               
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>