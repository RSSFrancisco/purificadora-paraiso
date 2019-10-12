      <div class="row">
       <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">FORMULARIO DE REGISTRO DE EMPLEADOS</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">REGISTRAR EMPLEADO</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nombre completo</label>
                                                <input id="txtNombre" name="cc-payment" type="text" class="form-control"  value="" placeholder="Ejemplo: Gloria Rosas">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Fecha de nacimiento</label>
                                                <input id="txtFecha" name="cc-name" type="date" class="form-control">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Dirección</label>
                                                <input id="txtDireccion" name="cc-number" type="text" class="form-control"  >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Telefono</label>
                                                        <input id="txtTelefono" name="cc-exp" type="tel" class="form-control cc-exp" value="" placeholder="">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Número seguro social</label>
                                                    <div class="input-group">
                                                        <input id="txtNss" name="x_card_code" type="text" class="form-control cc-cvc" value="" >

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div>
                                                <a  href="#" onclick="guardar_empleado()" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Guardar</span>
                                                   
                                                </a>
                                            </div>
                                        </form>
                                        <div id="resultado"></div>
                                    </div>
                                </div>
                            </div>
                        </div>