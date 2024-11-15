<?php
//funcion para registrar en las tablas
function register($conexion, array $arrData, string $sql)
{
    try {
        //preparamos la consulta con la conexion
        $prepared = $conexion->prepare($sql);
        $prepared->execute($arrData);
        return $prepared;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
//funcion que permite obtenes la informacion de las tablas
function select($conexion, array $arrData = array(), string $sql)
{
    try {
        //preparramos la consulta con la conexion
        $prepared = $conexion->prepare($sql);
        $prepared->execute($arrData);
        $request = $prepared->fetch(PDO::FETCH_ASSOC);
        return $request;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//funcion que permite obtenes la informacion de las tablas
function select_all($conexion, array $arrData = array(), string $sql)
{
    try {
        //preparramos la consulta con la conexion
        $prepared = $conexion->prepare($sql);
        $prepared->execute($arrData);
        $request = $prepared->fetchAll(PDO::FETCH_ASSOC);
        return $request;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

