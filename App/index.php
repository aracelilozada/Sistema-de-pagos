<?php
require_once "../config/config.php";
if (!isset($_GET["v"])) {
    $_GET["v"] = "login";
}
$view = $_GET["v"];
switch ($view) {
    case "login":
        $view = $view . "-view.php";
        require_once "./views/Login/" . $view;
        break;
    case "home":
        session_start(["name" => "Sistemapago"]);
        $view = $view . "-view.php";
        require_once "./views/Home/" . $view;
        break;
    case "carrera":
        session_start(["name" => "Sistemapago"]);
        $view = $view . "-view.php";
        require_once "./views/carrera/" . $view;
        break;
        case "Estudiante":
            session_start(["name" => "Sistemapago"]);
            $view = $view . "-view.php";
            require_once "./views/Estudiante/" . $view;
            break;

default:
        echo "Pagina no encontrada 404";
        break;
}
