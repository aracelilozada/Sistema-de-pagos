<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$idusuario = $_POST["txtidusuario"];
$usuario = $_POST["txtusuario"];
$contrasenia = $_POST["txtcontrsenia"];

//validar que los campos no esten vacios
if ($name == "" || $description == "") {
    echo json_encode([
        "status" => false,
        "msg" => "los campos no pueden estar vacios"
    ]);
    die();
}
//preparamos el array con los datos
$arrData = array(
    $idusuario,
    $usuario,
    $contrasenia
);
//preparamos la consulta
$sql = "INSERT INTO usuario (idusuario,usuario,contrasenia,) VALUES(?,?,?,);";
$request = register($conexion, $arrData, $sql);
if ($request) {
    echo json_encode([
        "status" => true,
        "msg" => "persona registrada correctamente"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "msg" => "Error al registrar la persona"
    ]);
}
