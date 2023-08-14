<?php

use Source\Models\Agendamento;

require_once __DIR__ . "./../../vendor/autoload.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$appointment = new Agendamento();

$result = $appointment->findById($id);

$result->destroy();

header("Location: ./../../index.php");


