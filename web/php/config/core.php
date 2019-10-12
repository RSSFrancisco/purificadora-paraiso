<?php
function contar_filas($data) {
    @$num_registros = mysqli_num_rows($data);
    return @$num_registros;
}

function liberar_variables($arreglo) {
    foreach ($arreglo as $valor):
        unset($valor);
    endforeach;
}

function tiempo_consulta() {
    static $querytime_begin;
    list($usec, $sec) = explode(' ', microtime());

    if (!isset($querytime_begin)) {
        $querytime_begin = ((float) $usec + (float) $sec);
        return substr($querytime_begin, 0, 6);
    } else {
        $querytime = (((float) $usec + (float) $sec)) - $querytime_begin;
        return substr($querytime, 0, 6);
    }
}

function returnTable($transaccion) {
    include_once('conection.php');
    $sql = $conectar->query($transaccion);
    $arreglo = array($sql, $transaccion, $conectar);
    liberar_variables($arreglo);
    return $sql;
}

function ejecutar_sentencia($transaccion) {
    include('conection.php');
    $sql = $conectar->prepare($transaccion);
    $sql->execute();
    $resultado = $sql->get_result();
    return $resultado;
    $sql->close();
    liberar_variables($arreglo = array($sql, $resultado, $conectar, $transaccion));
}

function mensaje($contenido, $estilo, $animacion) {
    echo'<div class="alert bg-' . $estilo . ' alert-dismissable ' . $animacion . '"> 
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              ' . $contenido . '                                         
       </div>';
}

function encriptar($datos) {
    $parser_64 = base64_encode($datos);
    $parser_utf8 = utf8_encode($parser_64);
    return $parser_utf8;
}

function des_encriptar($datos) {
    $parser_utf8 = utf8_decode($datos);
    $parser_64 = base64_decode($parser_utf8);

    return $parser_64;
}

function bitacora($sql) {
    returnTable($sql);
    liberar_variables($arreglo = array($sql));
}

function eliminarDir($carpeta)
       {
    foreach(glob($carpeta . "/*") as $archivos_carpeta)
    {
        if (is_dir($archivos_carpeta))
        {
            eliminarDir($archivos_carpeta);
        }
        else
        {
            unlink($archivos_carpeta);
        }
    }
    rmdir($carpeta);
}
//Función que carga un arreglo de los meses y dependiendo del número del mes que se le mande retorna el dato formateado
function date_M($mes){
    $meses = array("ene","feb","mar","abr","may","jun","jul","ago","sep","oct","nov","dic");
    return $meses[date($mes)-1];
}