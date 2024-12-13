<?php
$arrayDatos = array(
    $name,
    $precio,
    $porcentajedescuento,
    $porcentajeincrento,
    $modulo,
    $id
);
$sql = "UPDATE `pension` SET `nombre`=?, `precio`=?,`porcentaje_descuento`=?, `porcentaje_incremento`=?, `idmodulo`=? WHERE  `idpension`=?;";
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
