<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$idpersona = $_POST["txtidpersona"];
$name = $_POST["txtNombres"];
$apellidos = $_POST["txtapellidos"];
$DNI = $_POST["txtDNI"];
$telefono = $_POST["txttelefono"];
$correo = $_POST["txtcorreo"];
$direccion = $_POST["txtdireccion"];
$Fnacimiento= $_POST["txtFnacimiento"];
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
    $name,
    $description
);
//preparamos la consulta
$sql = "INSERT INTO persona (codigopersona,nombres,apellidos,DNI,telefono,correo,direccion,Fnacimiento) VALUES(?,?,?,?,?,?,?,?);";
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
