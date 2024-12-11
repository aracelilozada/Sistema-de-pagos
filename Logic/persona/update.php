<?php
$arrayDatos = array(
    $txtnombre,
    $txtapellidos,
    $txtDNI,
    $txttelefono,
    $txtcorreo,
    $txtdireccion,
    $txtfechan,
    $id
);
$sql = "UPDATE `persona` SET `nombres`=?, `apellidos`=?, `DNI`=?, `telefono`=? `correo_electronico`=? `direccion`=? `fecha_de_nacimiento`=? WHERE  `idpersona`=?;";
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
