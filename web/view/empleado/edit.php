<?php
    include("../../php/config/conection.php");
    $clave = $_POST['clave'];
    $sql = "SELECT * FROM empleado WHERE id_empleado='$clave' LIMIT 0,1";
    $exec = $conectar->query($sql);
 ?>
      <div class="row">
       <div class="col-lg-12">
        <?php foreach ($exec as $row) { ?>
                                <div class="card">
                                    <div class="card-header">EDITAR EMPLEADO <?php echo $row['nombre_completo']; ?></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">EMPLEADO <?php echo strtoupper($row['nombre_completo']); ?></h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nombre completo</label>
                                                <input id="txtNombre" name="cc-payment" type="text" class="form-control"  value="<?php echo $row['nombre_completo']; ?>" placeholder="Ejemplo: Gloria Rosas">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Fecha de nacimiento</label>
                                                <input id="txtFecha" name="cc-name" type="date" class="form-control" value="<?php echo $row['fecha_nacimiento']; ?>">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Dirección</label>
                                                <input id="txtDireccion" name="cc-number" type="text" class="form-control" value="<?php echo $row['direccion']; ?>" >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Telefono</label>
                                                        <input id="txtTelefono" name="cc-exp" type="tel" class="form-control cc-exp" value="<?php echo $row['telefono']; ?>" placeholder="">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Número seguro social</label>
                                                    <div class="input-group">
                                                        <input id="txtNss" value="<?php echo $row['nss']; ?>" name="x_card_code" type="text" class="form-control cc-cvc" value="" >

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div>
                                                <a  href="#" onclick="actualizar_empleado()" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Actualizar</span>
                                                   
                                                </a>
                                            </div>
                                        </form>
                                        <div id="resultado"></div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>