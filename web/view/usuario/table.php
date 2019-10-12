<?php 
include('../../php/config/conection.php');
$sql = "SELECT * FROM usuario";
$p_sql = $conectar->query($sql);
?>
<div class="row">
     <div class="col-lg-10"><a class="btn btn-info" href="#" onclick="form_usuario()" style="color: white;">AGREGAR NUEVO USUARIO</a></div>
                            <div class="col-lg-12" style="margin-top: 10px;">

                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#</th>
                                                <th>Correo</th>
                                                <th>Usuario</th>
                                                <th>Contrasenia</th>
                                                <th>Tipo</th>
                                                <th>Estatus</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($p_sql as $row) {?>
                                            <tr>
                                                <td>
                                                <a href="#" onclick="editar_usuario('<?php echo $row['id']; ?>')" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="#" onclick="borrar_usuario('<?php echo $row['id']; ?>')" class="btn btn-danger"><i class="fa fa-eraser"></i></a>
                                                </td>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['correo']; ?></td>
                                                <td><?php echo $row['usuario']; ?></td>
                                                <td><?php echo $row['contrasenia']; ?></td>
                                                <td><?php echo $row['tipo']; ?></td>
                                                <td><?php echo $row['estatus']; ?></td>
                                               
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>