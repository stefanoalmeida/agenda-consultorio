<?php

use Source\Core\Session;
use Source\Models\Agendamento;

require_once __DIR__ . "./../../vendor/autoload.php";

$session = new Session();

$appointment = new Agendamento();

$appointment->id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$appointment->id_profissional = filter_input(INPUT_POST, "id_profissional", FILTER_DEFAULT);
$appointment->nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRIPPED);
$appointment->data_agendamento = filter_input(INPUT_POST, "data_agendamento");
$appointment->horario = filter_input(INPUT_POST, "horario");
$appointment->sala = filter_input(INPUT_POST, "sala");
$appointment->tipo_agendamento = filter_input(INPUT_POST, "tipo_agendamento", FILTER_SANITIZE_STRIPPED);
$appointment->status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_STRIPPED);

$appointment->save();

$session->set("success", "Agendamento alterado com sucesso!");
header('Location: ./../../home.php');