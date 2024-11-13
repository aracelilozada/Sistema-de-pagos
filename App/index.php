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
    case "usuario":
        session_start(["name" => "Sistemapago"]);
        $view = $view . "-view.php";
        require_once "./views/usuario/" . $view;
        break;
        case "persona":
            session_start(["name" => "Sistemapago"]);
            $view = $view . "-view.php";
            require_once "./views/persona/" . $view;
            break;

default:
        echo "Pagina no encontrada 404";
        break;
}
