<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$nombres = $_POST["txtnombre"];
$descripcion = $_POST["txtdescripcion"];
$estado = $_POST["sltestado"];
session_start(["name" => "Sistemapago"]);
//validar que los campos no esten vacios
if ($nombres == "" || $descripcion == "" || $estado == "") {
    echo json_encode([
        "status" => false,
        "msg" => "Los campos no pueden estar vacio"
    ]);
    die();
}

if(isset($_POST["carrera"])){
    $id=$_POST["carrera"];
    require_once "./update.php";
    die();
}

//preparamos el array con los datos
$arrData = array(
    $nombres,
    $descripcion,
    $estado,
);
//preparamos la consulta
$sql = "INSERT INTO carrera (nombres, descripcion, estado) VALUES (?,?,?);";
$request = register($conexion, $arrData, $sql);
if ($request) {
    echo json_encode([
        "status" => true,
        "msg" => "Registro de carrera exitoso"
    ]);
    die();
} else {
    echo json_encode([
        "status" => false,
        "msg" => "Error al registrar la carrera"
    ]);
}
