<?php 
include('../../php/config/conection.php');
$sql = "SELECT * FROM empleado";
$e_sql = $conectar->query($sql);
 ?>

      <div class="row">
       <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">FORMULARIO DE REGISTRO DE USUARIOS</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">REGISTRAR USUARIO</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nombre completo de Usuario</label>
                                                <input id="txtUsuario" name="cc-payment" type="text" class="form-control"  value="" placeholder="Ejemplo: Francisco Reyes Sanchez">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Contraseña</label>
                                                <input id="txtContrasenia" name="cc-name" type="password" class="form-control">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                              <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Repetir Contraseña</label>
                                                <input id="txtRepetirContrasenia" name="cc-name" type="password" class="form-control">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Correo</label>
                                                <input id="txtCorreo" name="cc-number" type="text" class="form-control" placeholder="Ejemplo: gloriaroas@gmail.com" >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Empleado</label>
                                                        <select id="txtEmpleado" name="cc-exp" type="text" class="form-control cc-exp" value="" placeholder="">
                                                            <option>Seleccionar</option>
                                                         <?php foreach ($e_sql as $row) { ?>
                                                          <option value="<?php echo $row['id_empleado']; ?>"><?php echo $row['nombre_completo']; ?></option>      
                                                         <?php  } ?>
                                                        </select>
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Tipo</label>
                                                    <div class="input-group">
                                                        <select id="txtTipo" name="x_card_code" type="text" class="form-control cc-cvc" value="">
                                                        <option value="Administrador">Administrador</option>
                                                        <option value="Empleado">Empleado</option>
                                                        </select>  >

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div>
                                                <a id="payment-button" href="#" onclick="guardarUsuario()" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Guardar</span>
                                                   
                                                </a>
                                            </div>
                                             <div id="resultado"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>