<?php
require_once "../conexion.php";
require_once "../mysql.php";
$sql="SELECT e.idpersona,e.nombres,e.apellidos,e.DNI,e.telefono,e.correo_electronico,e.direccion,e.fecha_de_nacimiento from persona AS e; ";

$request = select_all($conexion, [], $sql);
$contador=1;
foreach($request as $key => $value) { 
    $request[$key]["contador"]=$contador;
    $contador ++;
}
$data = array(
    "status" => true,
    "data" => $request
);
echo json_encode($data);
