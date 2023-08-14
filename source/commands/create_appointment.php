<?php

use Source\Models\Agendamento;

require_once __DIR__ . "./../../vendor/autoload.php";

$appointment = new Agendamento();

$appointment->id_profissional = filter_input(INPUT_POST, "id_profissional", FILTER_VALIDATE_INT);
$appointment->nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRIPPED);
$appointment->data_agendamento = filter_input(INPUT_POST, "data_agendamento");
$appointment->horario = filter_input(INPUT_POST, "horario");
$appointment->tipo_agendamento = filter_input(INPUT_POST, "tipo_agendamento", FILTER_SANITIZE_STRIPPED);
$appointment->status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_STRIPPED);

$appointment->save();

header('Location: ./../../index.php');