<?php
session_start();
if($_POST){
include("../config/conection.php");
include("../config/core.php");
$vusuario = $_POST['u'];
$vcontrasenia =$_POST['c'];
$parser_contrasenia= encriptar($vcontrasenia);
$rst_usuarios ="SELECT * FROM usuario WHERE correo='".$vusuario."' and contrasenia='".$parser_contrasenia."'";
$ejecuta=$conectar->query($rst_usuarios); 

@$num_registros = mysqli_num_rows($ejecuta);
if ($num_registros > 0) { 
    while ($fila = mysqli_fetch_array($ejecuta,MYSQLI_ASSOC)) {
        # code...
         $_SESSION['tipo'] = $fila['tipo'];
         $_SESSION['id'] = $fila['id'];
         $_SESSION['usuario'] = $fila['usuario'];
         $_SESSION['estatus'] = $fila['estatus'];
    }
    
     }
    if(@$_SESSION['estatus']==0){
       @$rst_usuarios ="UPDATE usuario SET estatus=1 where id=".$_SESSION['id']."";
       $conectar->query($rst_usuarios); 
       echo 1;
      }else
     {
		echo 1; 
		
      
	  
     }    
} else {
    echo'<div class="alert alert-danger fade in">
                                            <button class="close" data-dismiss="alert">
                                                ×
                                            </button>
                                            <i class="fa-fw fa fa-times"></i>
                                            <strong>Error!</strong> El usuario o contraseña que ha ingresado es invalido.
                                        </div>';
}

?>