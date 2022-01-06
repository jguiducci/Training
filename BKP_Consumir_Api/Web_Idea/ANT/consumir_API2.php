<?php
/*
Enviar formulario con petición HTTP POST
en PHP
@author parzibyte
https://parzibyte.me/blog
 */
/*
MODIFICADO POR:  JAVIER GUIDUCCI
FECHA:		 03/05/2021
DESCRIPCION:	 HACER AL LLAMADA A LA API IDEA DE MANERA AUTOMATICA

*/

include "./config.php";


$url = "http://idea-caba-rgnhhjckcn.dynamic-m.com:8099/api/index.php";
// Los datos de formulario
$datos = [
    "ActividadInscripciones" => "1",
    "data" => '{"actividades":["0502211240","0502211241"]}',
];
// Crear opciones de la petición HTTP
$opciones = array(
    "http" => array(
        "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        "method" => "POST",
        "content" => http_build_query($datos), # Agregar el contenido definido antes
    ),
);
# Preparar petición
$contexto = stream_context_create($opciones);
# Hacerla
$resultado = json_decode( file_get_contents($url, false, $contexto), true);
if ($resultado === false) {
    echo "Error haciendo petición";
    exit;
}

# si no salimos allá arriba, todo va bien
# var_dump($resultado);
# echo "<br>";
# echo "<br>";
print_r($resultado);
echo "<br>";


?>


