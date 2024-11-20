<?php
require_once "../conexion.php";
require_once "../mysql.php";
$sql="SELECT e.idpersona,p.nombres,p.apellidos,e.DNI from persona AS e
INNER JOIN persona AS p ON p.idpersona=e.idpersona ";
$request = select_all($conexion, [], $sql);
$data = array(
    "status" => true,
    "data" => $request
);
echo json_encode($data);
