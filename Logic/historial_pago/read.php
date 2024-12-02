<?php
require_once "../conexion.php";
require_once "../mysql.php";
$sql="SELECT h.idhistorial_pago,h.idestudiante,h.idpension,h.fecha_pago,h.pago,h.estado_pago from historial_pago AS e
INNER JOIN estudiante AS p ON h.idhistorial_pago=h.idestudiante= ";
$request=select_all($conexion,[],$sql);
$contador=1;
foreach($request as $key => $value) { 
    $request[$key]["contador"]=$contador;
    $contador ++;
}
$data=array(
    "status"=>true,
    "data"=>$request
);
echo Json_encode($data);