<?php
require_once("../../config/config.php");
session_start(["name" => "Sistemadepagos"]);
session_unset();
session_destroy();
header("Location: " . BASE_URL . "App");