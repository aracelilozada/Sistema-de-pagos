<?php
$arrayDatos = array(
    $estudiante,
    $pension,
    $fecha_pago,
    $pago,
    $id
);
$sql = "UPDATE `historial_pago` SET `idestudiante`=?, `idpension`=?, `fecha_pago`=?, `pago`=? WHERE  `idhistorial_pago`=?;";
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
