<?php
require_once "../conexion.php";
require_once "../mysql.php";
$sql = "SELECT u.idusuario,u.usuario,u.contrasenia FROM usuario as u;";
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
