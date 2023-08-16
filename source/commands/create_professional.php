<?php
session_start();

use Source\Models\Profissional;

require_once __DIR__ . "./../../vendor/autoload.php";

$professional = new Profissional();

$professional->nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRIPPED);
$professional->especialidade = filter_input(INPUT_POST, "especialidade");
$professional->status = "Ativo";

$professional->save();

$_SESSION["sucess"] = "Profissional registrado com sucesso!";
header('Location: ./../../new_professional.php');