      <div class="row">
       <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">FORMULARIO DE REGISTRO DE CLIENTES</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">REGISTRAR CLIENTE</h3>
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
                                                        <label for="cc-exp" class="control-label mb-1">Colonia</label>
                                                        <input id="txtColonia" name="cc-exp" type="tel" class="form-control cc-exp" value="" placeholder="">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Ciudad</label>
                                                    <div class="input-group">
                                                        <input id="txtCiudad" name="x_card_code" type="tel" class="form-control cc-cvc" value="" >

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Estado</label>
                                                        <input id="txtEstado" list="list_estados" name="cc-exp" type="text" class="form-control cc-exp" value="" placeholder="">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                    
                                                </div>
                                              
                                            </div>
                                            <div>
                                                <a id="payment-button" href="#" onclick="guardar_cliente()" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Guardar</span>
                                                   
                                                </a>
                                            </div>
                                            <div id="resultado"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <datalist id="list_estados">
                                                        <option value="Aguascalientes">Aguascalientes</option>
                                                        <option value="Baja California">Baja California</option>
                                                        <option value="Baja California Sur">Baja California Sur</option>
                                                        <option value="Campeche">Campeche</option>
                                                        <option value="Chihuahua">Chihuahua</option>
                                                        <option value="Chiapas">Chiapas</option>
                                                        <option value="Coahuila">Coahuila</option>
                                                        <option value="Colima">Colima</option>
                                                        <option value="Durango">Durango</option>
                                                        <option value="Guanajuato">Guanajuato</option>
                                                        <option value="Guerrero">Guerrero</option>
                                                        <option value="Hidalgo">Hidalgo</option>
                                                        <option value="Jalisco">Jalisco</option>
                                                        <option value="México">México</option>
                                                        <option value="Michoacán">Michoacán</option>
                                                        <option value="Morelos">Morelos</option>
                                                        <option value="Nayarit">Nayarit</option>
                                                        <option value="Nuevo León">Nuevo León</option>
                                                        <option value="Oaxaca">Oaxaca</option>
                                                        <option value="Puebla">Puebla</option>
                                                        <option value="Querétaro">Querétaro</option>
                                                        <option value="Quintana Roo">Quintana Roo</option>
                                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                                        <option value="Sinaloa">Sinaloa</option>
                                                        <option value="Sonora">Sonora</option>
                                                        <option value="Tabasco">Tabasco</option>
                                                        <option value="Tamaulipas">Tamaulipas</option>
                                                        <option value="Tlaxcala">Tlaxcala</option>
                                                        <option value="Veracruz">Veracruz</option>
                                                        <option value="Yucatán">Yucatán</option>
                                                        <option value="Zacatecas">Zacatecas</option>
                                                    </datalist>
                        </div>