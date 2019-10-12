<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

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
$empleado_key = $_GET['empleado_key'];
$sql = "SELECT venta.id_venta,venta.producto,venta.empleado,venta.qr_cliente,venta.cantidad,venta.detalles,venta.fecha,venta.hora,venta.total,c.nombre_completo as nombre_cliente FROM venta  INNER JOIN cliente as c ON venta.qr_cliente = c.codigo_qr WHERE venta.empleado='$empleado_key'";
$p_sql = $conectar->query($sql);
?>
<div class="row">

                            <div class="col-lg-12" >
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped ">
                                        <thead >
                                            <tr style="/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#eeeeee+0,cccccc+100;Gren+3D */
background: rgb(238,238,238); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(238,238,238,1) 0%, rgba(204,204,204,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  rgba(238,238,238,1) 0%,rgba(204,204,204,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  rgba(238,238,238,1) 0%,rgba(204,204,204,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#cccccc',GradientType=0 ); /* IE6-9 */
">
                                              
                                      
                                                <th>Cliente</th>
                                                <th>Empleado</th>
                                                <th>Fecha</th>
                                                <th>Total</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($p_sql as $row) {?>
                                            <tr>
                                              
                                               
                                               
                                             
                                                <td><?php echo $row['nombre_cliente']; ?></td>
                                                <td><?php echo $row['empleado']; ?></td>
                                                <td><?php 
                                                $time = $row['fecha'];echo $time; ?></td>
                                                <td><?php echo "$".$row['total']."MNX";  ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>
                        <?php
/*
require 'clientes.php';

    // Manejar petición GET
    $clientes = Clientes::getAll();
    if ($clientes) {
        $datos["cliente"] = $clientes;
        print json_encode($clientes);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
*/?>