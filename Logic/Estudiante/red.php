<?php
require_once "../conexion.php";
require_once "../mysql.php";
$sql="SELECT*FROM Estudiante;";
$request=select_all($conexion,[],$sql);
$data=array(
    "status"=>true,
    "data"=>$request
);
echo json_encode($data);