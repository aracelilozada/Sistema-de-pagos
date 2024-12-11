<?php
$arrayDatos = array(
    $nombre,
    $descripcion,
    $estado,
    $carrera,
    $id
);
$sql = "UPDATE `modulo` SET `nombre`=?, `descripcion`=?, `estado`=?, `idcarrera`=? WHERE  `modulo`=?;";
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
