<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$estudiante = $_POST["txtidestudiante"];
$persona = $_POST["txtidpersona"];
$usuario = $_POST["txtidusuario"];
$estado= $_POST["txtestado"];
//validar que los campos no esten vacios
if ($name == "" || $description == "") {
    echo json_encode([
        "status" => false,
        "msg" => "Los campos no pueden estar vacio"
    ]);
    die();
}
//preparamos el array con los datos
$arrData = array(
    $estudiante,
    $persona,
    $usuario,
    $estado,
);
//preparamos la consulta
$sql = "INSERT INTO Estudiante(idestudiante,idpersona,idusuario,estado) VALUES(?,?,?,?);";
$request = register($conexion, $arrData, $sql);
if ($request) {
    echo json_encode([
        "status" => true,
        "msg" => "Registro de Estudiante exitoso"
    ]);
    die();
}
