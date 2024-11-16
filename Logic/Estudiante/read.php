<?php
require_once "../conexion.php";
require_once "../mysql.php";
$sql="SELECT*FROM estudiante;";
$request=select_all($conexion,[],$sql);
$data=array(
    "status"=>true,
    "data"=>$request
);
echo Json_encode($data);