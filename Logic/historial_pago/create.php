<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$estudiante = $_POST["sltEstudiante"];
$pension = $_POST["sltPension"];
$fecha_pago = $_POST["txtFecha_pago"];
$pago = $_POST["txtpago"];
session_start(["name" => "Sistemapago"]);

//validar que los campos no esten vacios
if ($estudiante == "" || $pension == "" || $fecha_pago == ""|| $pago == "") {
    echo json_encode([
        "status" => false,
        "msg" => "Los campos no pueden estar vacio"
    ]);
    die();
}
if(isset($_POST["historial_pago"])){
    $id=$_POST["historial_pago"];
    require_once "./update.php";
    die();
}

//preparamos el array con los datos
$arrData = array(
    $estudiante,
    $pension,
    $fecha_pago,
    $pago,
    
);
//preparamos la consulta
$sql = "INSERT INTO historial_pago (idestudiante,idpension,fecha_pago,pago) VALUES (?,?,?,?);";
$request = register($conexion, $arrData, $sql);
if ($request) {
    echo json_encode([
        "status" => true,
        "msg" => "Registro de historial_pago exitoso"
    ]);
    die();
} else {
    echo json_encode([
        "status" => false,
        "msg" => "Error al registrar la categoria"
    ]);
}
