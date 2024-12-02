<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$nombre = $_POST["txtnombre"];
$descripcion = $_POST["txtdescripcion"];
$estado = $_POST["sltestado"];
$carrera = $_POST["sltcarrera"];

//validar que los campos no esten vacios
if ($nombre == "" || $descripcion == "" || $estado =="" ||  $carrera =="") {
    echo json_encode([
        "status" => false,
        "msg" => "los campos no pueden estar vacios"
    ]);
    die();
}
//preparamos el array con los datos
$arrData = array(
    $nombre,
    $descripcion,
    $estado,
    $carrera,
);
//preparamos la consulta
$sql = "INSERT INTO modulo (nombre,descripcion,estado,idcarrera) VALUE (?,?,?,?);";
$request = register($conexion, $arrData, $sql);
if ($request) {
    echo json_encode([
        "status" => true,
        "msg" => "modulo registrado correctamente"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "msg" => "Error al registrar el modulo"
    ]);
}

