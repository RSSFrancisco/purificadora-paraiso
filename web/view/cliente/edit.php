<?php
    include("../../php/config/conection.php");
    $clave = $_POST['clave'];
    $sql = "SELECT * FROM cliente WHERE id_cliente='$clave' LIMIT 0,1";
    $exec = $conectar->query($sql);
    //Consulta a la base de datos para general el id para el codigo QR
    $sql_cliente = "SELECT id_cliente,nombre_completo,fecha_nacimiento FROM cliente WHERE id_cliente='$clave' LIMIT 0,1";
    $exec_cliente = $conectar->query($sql_cliente);
    foreach ($exec_cliente as $r) {
        $contenido_qr = $r['id_cliente'].$r['nombre_completo'].$r['fecha_nacimiento'];
    }
    //Generador de codigo QR para cada cliente 
    require '../../phpqrcode/qrlib.php';
    $dir = 'temp/';
    $filename = $dir.'codigoqr'.$contenido_qr.'.png';
    $tamanio = 10;
    $level = 'H';
    $frameSize = 3;
    $contenido =$contenido_qr;
    // Se genera el codigo Qr que le corresponde a la consulta a la tabla cliente
    QRcode::png($contenido,$filename,$level,$tamanio,$frameSize);
    //Se inserta el codigo qr en la base de datos o si existe se actualiza el codigo qr
    $sql_insert_cliente = "UPDATE cliente SET codigo_qr='$contenido' WHERE id_cliente='$clave'";
    $exec_update_cliente = $conectar->query($sql_insert_cliente); 


 ?>
<div class="row">
       <div class="col-lg-12">
        <?php foreach ($exec as $row) { ?>
                                <div class="card">
                                    <div class="card-header">EDITAR CLIENTE <?php echo $row['nombre_completo']; ?></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">CLIENTE <?php echo strtoupper($row['nombre_completo']); ?></h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nombre completo</label>
                                                <input id="txtNombre"  name="cc-payment" type="text" class="form-control"  value="<?php echo $row['nombre_completo']; ?>" placeholder="Ejemplo: Gloria Rosas">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Fecha de nacimiento</label>
                                                <input id="txtFecha" value="<?php echo $row['fecha_nacimiento']; ?>" name="cc-name" type="date" class="form-control">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Dirección</label>
                                                <input id="txtDireccion" value="<?php echo $row['direccion']; ?>" name="cc-number" type="text" class="form-control"  >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Colonia</label>
                                                        <input id="txtColonia" name="cc-exp" type="tel" class="form-control cc-exp" value="<?php echo $row['colonia']; ?>" placeholder="">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Ciudad</label>
                                                    <div class="input-group">
                                                        <input id="txtCiudad"  name="x_card_code" type="tel" class="form-control cc-cvc" value="<?php echo $row['ciudad']; ?>" >

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Estado</label>
                                                        <input id="txtEstado" list="list_estados" name="cc-exp" type="text" class="form-control cc-exp" value="<?php echo $row['estado']; ?>" placeholder="">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                    
                                                </div>
                                              
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label">
                                                            Codigo QR Generado por el sistema
                                                        </label>
                                                        <img src="view/cliente/<?php echo $filename; ?>">
                                                        <input type="text" id="txtCodigoQr" value="<?php echo $contenido; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <a id="payment-button" href="#" onclick="actualizar_cliente(<?php echo $row['id_cliente']; ?>)" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Actualizar</span>
                                                   
                                                </a>
                                            </div>
                                        <?php } ?>
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