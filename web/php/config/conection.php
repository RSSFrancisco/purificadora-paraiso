<?php
include_once('constantes_conexion.php');
    $servidor=SERVER_PATH;
    $usuarioBD=USER_PATH;
    $passwordBD=PASSWORD_PATH;
    $baseDatos=DATABASE_PATH;
    $conectar = new mysqli($servidor, $usuarioBD, $passwordBD, $baseDatos);
	
    