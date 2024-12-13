<?php
require_once "../mysql.php";
require_once "../conexion.php";
//Variables de la categoria
$txtnombre= $_POST["txtnombres"];
$txtapellidos=$_POST["txtapellidos"];
$txtDNI=$_POST["txtDNI"];
$txttelefono=$_POST["txttelefono"];
$txtcorreo=$_POST["txtcorreo"];
$txtdireccion=$_POST["txtdireccion"];
$txtfechan=$_POST["txtfechadenacimiento"];
session_start(["name" => "Sistemapago"]);

//validar que los campos no esten vacios
if ($txtnombre== "" || $txtapellidos == "" || $txtDNI == "" || $txttelefono == "" || $txtcorreo == "" || $txtdireccion == "" || $txtfechan == "") {
    echo json_encode([
        "status" => false,
        "msg" => "Los campos no pueden estar vacio"
    ]);
    die();
}
if(isset($_POST["persona"])){
    $id=$_POST["persona"];
    require_once "./update.php";
    die();
}
//preparamos el array con los datos
$arrData = array(
    $txtnombre,
    $txtapellidos,
    $txtDNI,
    $txttelefono,
    $txtcorreo,
    $txtdireccion,
    $txtfechan,

);
//preparamos la consulta
$sql ="INSERT INTO persona (nombres,apellidos,DNI,telefono,correo_electronico,direccion,fecha_de_nacimiento) VALUES (?,?,?,?,?,?,?)";
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
