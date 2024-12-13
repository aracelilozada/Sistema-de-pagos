<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$name = $_POST["txtNombre"];
$precio = $_POST["txtprecio"];
$porcentajedescuento = $_POST["txtporcentaje_descuento"];
$porcentajeincrento = $_POST["txtporcentaje_incremento"];
$modulo = $_POST["sltmodulo"];
//validar que los campos no esten vacios
if ($name == "" || $precio == "" || $porcentajedescuento == "" || $porcentajeincrento == "" || $modulo == "") {
    echo json_encode([
        "status" => false,
        "msg" => "los campos no pueden estar vacios"
    ]);
    die();
}
if(isset($_POST["pension"])){
    $id=$_POST["pension"];
    require_once "./update.php";
    die();
}
//preparamos el array con los datos
$arrData = array(
    $name,
    $precio,
    $porcentajedescuento,
    $porcentajeincrento,
    $modulo,
);
//preparamos la consulta
$sql = "INSERT INTO pension (nombre,precio,porcentaje_descuento,porcentaje_incremento,idmodulo) VALUE (?,?,?,?,?);";
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
