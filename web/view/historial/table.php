<?php 
include('../../php/config/conection.php');
$sql = "SELECT * FROM historial";
$p_sql = $conectar->query($sql);
?>
<div class="row">
    <div class="col-lg-10"><a class="btn btn-info" href="#" style="color: white;">HISTORIAL</a></div>
                            <div class="col-lg-12" style="margin-top: 10px;">

                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fecha y Hora</th>
                                                <th>Detalles</th>
                                  
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($p_sql as $row) {?>
                                            <tr>
                                                <td><?php echo $row['id_historial']; ?></td>
                                                <td><?php echo $row['fecha_hora']; ?></td>
                                                <td><?php echo $row['detalle']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>