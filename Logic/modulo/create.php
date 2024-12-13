<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$carrera = $_POST["sltcarrera"];
$nombre = $_POST["txtnombre"];
$descripcion = $_POST["txtdescripcion"];
$estado = $_POST["sltestado"];
session_start(["name" => "Sistemapago"]);

//validar que los campos no esten vacios
if ($carrera == "" || $nombre == "" || $descripcion =="" ||  $estado =="") {
    echo json_encode([
        "status" => false,
        "msg" => "los campos no pueden estar vacios"
    ]);
    die();
}
if(isset($_POST["modulo"])){
    $id=$_POST["modulo"];
    require_once "./update.php";
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

