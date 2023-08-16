<?php
session_start();

use CoffeeCode\DataLayer\Connect;
use Source\Models\Agendamento;

require_once __DIR__ . "./../../vendor/autoload.php";

$appointment = new Agendamento();

$appointment->id_profissional = filter_input(INPUT_POST, "id_profissional", FILTER_VALIDATE_INT);
$appointment->nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRIPPED);
$appointment->data_agendamento = filter_input(INPUT_POST, "data_agendamento");
$appointment->horario = filter_input(INPUT_POST, "horario");
$appointment->sala = filter_input(INPUT_POST, "sala");
$appointment->tipo_agendamento = filter_input(INPUT_POST, "tipo_agendamento", FILTER_SANITIZE_STRIPPED);
$appointment->status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_STRIPPED);

$conn = Connect::getInstance();
$query = $conn->query("SELECT * FROM agendamentos WHERE 
                               id_profissional = '{$appointment->id_profissional}' AND
                               data_agendamento = '{$appointment->data_agendamento}' AND
                               horario = '{$appointment->horario}'");
$result = $query->rowCount();

$q = $conn->query("SELECT p.nome FROM agendamentos 
                                        INNER JOIN profissionais p WHERE p.id = {$appointment->id_profissional}");
$r = $q->fetch();

if ($result > 0) {
    $_SESSION["error"] = "Wooops, parece que já existe um agendamento para " . $r->nome . "
    no dia " . date("d/m/Y", strtotime($appointment->data_agendamento)) . " às $appointment->horario!";
    header('Location: ./../../new_appointment.php');
} else {
    $appointment->save();
    $_SESSION["success"] = "Agendamento registrado com sucesso!";
    header('Location: ./../../new_appointment.php');
}

