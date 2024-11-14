<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$name = $_POST["txtNombre"];
$description = $_POST["txtDescripcion"];
$estado = $_POST["txtestado"];
//validar que los campos no esten vacios
if ($name == "" || $description == "") {
    echo json_encode([
        "status" => false,
        "msg" => "Los campos no pueden estar vacio"
    ]);
    die();
}
//preparamos el array con los datos
$arrData = array(
    $name,
    $description,
    $estado,
);
//preparamos la consulta
$sql = "INSERT INTO carrera (idcarrera,nombres,descripcion,estado) VALUES(?,?,?,?);";
$request = register($conexion, $arrData, $sql);
if ($request) {
    echo json_encode([
        "status" => true,
        "msg" => "Registro de carrera exitoso"
    ]);
    die();
}
