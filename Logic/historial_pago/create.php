<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$idhistorial_pago = $_POST["slthistorial_pago"];
session_start(["name" => "Sistemapago"]);

//validar que los campos no esten vacios
if ($idhistorial_pago == "") {
    echo json_encode([
        "status" => false,
        "msg" => "Los campos no pueden estar vacio"
    ]);
    die();
}
$idestudiante = $_SESSION["sesion_login"]["info"]["idhistorial_pago"];
$estado = "activo";
//preparamos el array con los datos
$arrData = array(
    $idhistorial_pago,
    $idestudiante,
    $idpension,
    $fecha_pago,
    $pago,
    $estado_pago,
    
);
//preparamos la consulta
$sql = "INSERT INTO historial_pago (idhistorial_pago,idestudiante,idpension,fecha_pago,pago,estado_pago) VALUES(?,?,?,?,?,?);";
$request = register($conexion, $arrData, $sql);
if ($request) {
    echo json_encode([
        "status" => true,
        "msg" => "Registro de historial_pago exitoso"
    ]);
    die();
}
