<?php
session_start();
use Source\Models\Agendamento;

require_once __DIR__ . "./../../vendor/autoload.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$appointment = new Agendamento();

$result = $appointment->findById($id);

$result->destroy();

$_SESSION["sucess"] = "Agendamento excluído com sucesso!";
header("Location: ./../../new_appointment.php");


