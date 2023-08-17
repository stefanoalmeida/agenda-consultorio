<?php

use Source\Core\Session;
use Source\Models\Agendamento;

require_once __DIR__ . "./../../vendor/autoload.php";

$session = new Session();

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$appointment = new Agendamento();

$result = $appointment->findById($id);

$result->destroy();

$session->set("success", "Agendamento excluído com sucesso!");
header("Location: ./../../new_appointment.php");


