<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$txtId = $_POST["txtID"];
//validar que los campos no esten vacios
if ($txtId == "") {
    echo json_encode([
        "status" => false,
        "msg" => "Los campos no pueden estar vacio"
    ]);
    die();
}
//preparamos el array con los datos
$arrData = array(
    $txtId,

);
//preparamos la consulta
$sql = "DELETE FROM modulo WHERE idmodulo=?;";
$request = delete($conexion, $arrData, $sql);
if ($request) {
    echo json_encode([
        "status" => true,
        "msg" => "Registro eleminado correctamente"
    ]);
    die();
}
