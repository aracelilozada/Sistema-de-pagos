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
//preparamos el array con los datos
$arrData = array(
    $idpersona,
);
//preparamos la consulta
$sql = "INSERT INTO persona (idpersona,nombres,apellidos,DNI,telefono,correo,direccion,fecha de nacimiento) VALUES(?,?,?,?,?,?,?,?);";
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
