<?php
session_start();

use Source\Models\Profissional;

require_once __DIR__ . "./../../vendor/autoload.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$professional = new Profissional();

$result = $professional->findById($id);

$result->destroy();

$_SESSION["success"] = "Profissional excluído com sucesso!";
header("Location: ./../../new_professional.php");


