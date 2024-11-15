<?php
if ($_POST) {
    session_start(["name" => "Sistemadepagos"]);
    //requerimos los archivos
    require_once "../conexion.php";
    require_once "../mysql.php";
    //recibimos los datos del formulario
    $user = $_POST["txtUser"];
    $password = $_POST["txtPassword"];
    //validamos la informacion que se recibio no este vacia
    if (
        $user == "" && $password == ""
    ) {
        $data = array(
            "title" => "Ocurrio un error inesperado",
            "content" => "Campos vacios",
            "status" => false
        );
        echo json_encode($data);
        die();
    }
    $sql = "SELECT*FROM usuario AS u 
    WHERE u.usuario=? AND u.contrasenia=?;";
    $arrData = array($user, $password);
    $request = select($conexion, $arrData, $sql);
    if (!$request) {
        $data = array(
            "title" => "Ocurrio un error inesperado",
            "content" => "El usuario o la contraseña no existen",
            "status" => false
        );
        echo json_encode($data);
        die();
    }
    $_SESSION["sesion_login"]["info"] = $request;
    $data = array(
        "url" => "?v=home",
        "status" => true,
    );
    echo json_encode($data);
}
