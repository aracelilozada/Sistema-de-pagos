<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$idpersona = $_POST["sltPersona"];
session_start(["name" => "Sistemapago"]);

//validar que los campos no esten vacios
if ($idpersona == "") {
    echo json_encode([
        "status" => false,
        "msg" => "Los campos no pueden estar vacio"
    ]);
    die();
}
$idusuario = $_SESSION["sesion_login"]["info"]["idusuario"];
$estado = "activo";

//preparamos validacion para no duplicar registro de estudiantes
$sql = "SELECT *FROM estudiante WHERE idpersona =?";
$arrData =array($idpersona);
$response =select($conexion,$arrData,$sql);
if ($response){
    echo json_encode([
        "status" => false,
        "msg" => "Error de registro duplicado, no se puede crear un registro porque esta persona ya tiene un registro asignado "
    ]);
    die();
}
//preparamos el array con los datos
$arrData = array(
    $idpersona,
    $idusuario,
    $estado
);
//preparamos la consulta
$sql = "INSERT INTO Estudiante (idpersona,idusuario,estado) VALUES(?,?,?);";
$request = register($conexion, $arrData, $sql);
if ($request) {
    echo json_encode([
        "status" => true,
        "msg" => "Registro de Estudiante exitoso"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "msg" => "Error al registrar la usuario"
    ]);
}
