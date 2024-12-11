<?php
$arrayDatos = array(
    $usuario,
    $contrasenia,
    $id
);
$sql = "UPDATE `usuario` SET `usuario`=?, `contrasenia`=?, WHERE  `usuario`=?;";
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
