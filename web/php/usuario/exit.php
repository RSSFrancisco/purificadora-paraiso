<?php
session_start();
ob_start();
include('../config/conection.php');
include '../config/core.php';
$rst_usuarios ="UPDATE usuario SET estatus=0 where id_usuario=".$_SESSION['id_usuario']."";
$conectar->query($rst_usuarios); 
$_SESSION=array();
if(ini_get("session.use_cookies")==true){
	$parametros=session_get_cookie_params();
	setcookie(session_name(), '', time()-99999,
	$parametros["path"],$parametros["domain"],
	$parametros["secure"],$parametros["httponly"]);
}
session_destroy();
header("Location:../../login.php");

ob_end_flush();