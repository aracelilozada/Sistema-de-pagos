<?php
require_once "../conexion.php";
require_once "../mysql.php";
$sql = "SELECT*FROM historial_pago AS hp 
INNER JOIN estudiante AS e ON e.idestudiante=hp.idestudiante
INNER JOIN persona AS per ON per.idpersona=e.idpersona
INNER JOIN pension AS p ON p.idpension=hp.idpension;";
$request = select_all($conexion, [], $sql);
$contador = 1;
foreach ($request as $key => $value) {
    $request[$key]["contador"] = $contador;
    $contador++;
}
$data = array(
    "status" => true,
    "data" => $request
);
echo json_encode($data);
