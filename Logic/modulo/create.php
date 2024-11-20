<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$modulo = $_POST["txtmodulo"];
$nombre = $_POST["txtnombre"];
$descripcion = $_POST["txtdescripcion"];
$estado = $_POST["txtestado"];
$carrera = $_POST["txtcarrera"];
//validar que los campos no esten vacios
if ($modulo == "" || $nombre == "" || $descripcion =="" ||  $estado ==""|| $carrera =="" ||) {
    echo json_encode([
        "status" => false,
        "msg" => "los campos no pueden estar vacios"
    ]);
    die();
}
//preparamos el array con los datos
$arrData = array(
    $idmodulo,
    $nombre,
    $descripcion,
    $estado,
    $idcarrera
);
//preparamos la consulta
$sql = "INSERT INTO modulo (idmodulo,nombre,descripcion,estado,idcarrera,) VALUES(?,?,?,?,?);";
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

