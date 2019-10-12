<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="purificadora del paraiso">
    <meta name="author" content="purificadora del paraiso">
    <meta name="keywords" content="Clientes purificadora">

    <!-- Title Page-->

    <!-- Fontfaces CSS-->
    <link href="../../css/font-face.css" rel="stylesheet" media="all">
    <link href="../../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../css/theme.css" rel="stylesheet" media="all">

</head>

<?php 
include('../config/conection.php');
$codigoQR = $_GET['qr'];
$sql = "SELECT * FROM cliente WHERE codigo_qr='$codigoQR'";
$p_sql = $conectar->query($sql);
?>
<div class="row">
                            <div class="col-lg-8" >
                                <div class="table-responsive m-b-30">
                                    <table class="table table-borderless table-striped ">
                                        <thead >
                                            <tr style="
background: rgb(238,238,238); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(238,238,238,1) 0%, rgba(204,204,204,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  rgba(238,238,238,1) 0%,rgba(204,204,204,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  rgba(238,238,238,1) 0%,rgba(204,204,204,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#cccccc',GradientType=0 ); /* IE6-9 */
">             <?php foreach ($p_sql as $row) {?> 
                   <th><strong>CLIENTE:</strong></th>
                   <th><?php echo strtoupper($row['nombre_completo']); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <tr style="
background: #f2f9fe; /* Old browsers */
background: -moz-linear-gradient(top,  #f2f9fe 0%, #d6f0fd 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  #f2f9fe 0%,#d6f0fd 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  #f2f9fe 0%,#d6f0fd 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f9fe', endColorstr='#d6f0fd',GradientType=0 ); /* IE6-9 */


">       
                                            <td>
                                            <img style="width: 140px;" src="../../view/cliente/temp/codigoqr<?php echo $row['codigo_qr']; ?>.png">
                                            </td> 
                                            <td>
                                            <strong>DIRECCIÓN:</strong> <?php echo strtoupper($row['direccion']); ?><br>
                                            <strong>COLONIA:</strong> <?php echo strtoupper($row['colonia']); ?><br>
                                            <strong>CIUDAD:</strong> <?php echo strtoupper($row['ciudad']); ?><br>
                                            <strong>ESTADO:</strong> <?php echo strtoupper($row['estado']); ?><br>
                                            <strong>ID_QR:</strong> <?php echo strtoupper($row['codigo_qr']); ?><br>
                                            </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                       
                            </div>
                          
                        </div>