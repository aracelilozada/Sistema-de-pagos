<?php
require_once "../config/config.php";
if (!isset($_GET["v"])) {
    $_GET["v"] = "login";
}
$view = $_GET["v"];

session_start(["name" => "Sistemapago"]);
if ($view != "login") {
    if (!isset($_SESSION["sesion_login"]["info"])) {
        $view = "login";
    }
}

switch ($view) {
    case "login":
        $view = $view . "-view.php";
        require_once "./views/Login/" . $view;
        break;

    case "home":
        $view = $view . "-view.php";
        require_once "./views/home/" . $view;
        break;

    case "carrera":
        $view = $view . "-view.php";
        require_once "./views/carrera/" . $view;
        break;

    case "usuario":
        $view = $view . "-view.php";
        require_once "./views/usuario/" . $view;
        break;

    case "persona":
        $view = $view . "-view.php";
        require_once "./views/persona/" . $view;
        break;

    case "Estudiante":
        $view = $view . "-view.php";
        require_once "./views/Estudiante/" . $view;
        break;

    case "modulo":
        $view = $view . "-view.php";
        require_once "./views/modulo/" . $view;
        break;

    case "pension":
        $view = $view . "-view.php";
        require_once "./views/pension/" . $view;
        break;

    case "historial_pago":
        $view = $view . "-view.php";
        require_once "./views/historial_pago/" . $view;
        break;

    default:
        echo "Pagina no encontrada 404";
        break;
}
