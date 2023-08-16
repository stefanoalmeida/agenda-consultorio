<?php
session_start();

use Source\Models\Profissional;

require_once __DIR__ . "./../../vendor/autoload.php";

$professional = new Profissional();

$professional->id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$professional->nome = filter_input(INPUT_POST, "nome");
$professional->especialidade = filter_input(INPUT_POST, "especialidade", FILTER_SANITIZE_STRIPPED);
$professional->status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_STRIPPED);

$professional->save();

$_SESSION["success"] = "Profissional alterado com sucesso!";
header('Location: ./../../new_professional.php');