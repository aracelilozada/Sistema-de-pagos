<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$idpension = $_POST["txtidpension"];
$name = $_POST["txtNombre"];
$precio = $_POST["txtprecio"];
$porcentajedescuento = $_POST["txtporcentajedescuento"];
$porcentajeincrento = $_POST["txtporcentajeincremento"];
$idmodulo = $_POST["txtidmodulo"];
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
    $idpension,
    $nombre,
    $precio,
    $porcentajedescuento,
    $porcentajeincremento,
    $idmodulo
);
//preparamos la consulta
$sql = "INSERT INTO pension (idpension,nombre,precio,porcentajedescuento,porcentsjeincremento,idmodulo) VALUES(?,?,?,?,?,?,);";
$request = register($conexion, $arrData, $sql);
if ($request) {
    echo json_encode([
        "status" => true,
        "msg" => "pension registrada correctamente"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "msg" => "Error al registrar la categoria"
    ]);
}
