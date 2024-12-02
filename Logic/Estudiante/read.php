<?php
require_once "../conexion.php";
require_once "../mysql.php";
$sql="SELECT e.idestudiante,p.nombres,p.apellidos,e.estado from estudiante AS e
INNER JOIN persona AS p ON p.idpersona=e.idpersona ";
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