<?php
$arrayDatos = array(
    $nombres,
    $descripcion,
    $estado,
    $id
);
$sql = "UPDATE `carrera` SET `nombres`=?, `descripcion`=?,`estado`=? WHERE  `idcarrera`=?;";
$response = update($conexion, $arrayDatos, $sql);
if ($response) {
    echo json_encode([
        "status" => true,
        "msg" => "Registro actualizado correctamente"
    ]);
    die();
} else {
    echo json_encode([
        "status" => false,
        "msg" => "Error al actualizar el registro"
    ]);
    die();
}
