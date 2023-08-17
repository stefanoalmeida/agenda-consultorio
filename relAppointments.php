<?php

use CoffeeCode\DataLayer\Connect;
use Source\Core\Session;
use Source\Models\Agendamento;

require_once __DIR__ . "/vendor/autoload.php";

$session = new Session();

$data_inicial = filter_input(INPUT_POST, "data_inicial");
$data_final = filter_input(INPUT_POST, "data_final");
$sala = filter_input(INPUT_POST, "sala");
$profissional = filter_input(INPUT_POST, "profissional");

$conn = Connect::getInstance();

if (!$sala && !$profissional) {
    $query = $conn->query("SELECT * FROM agendamentos WHERE data_agendamento 
                                BETWEEN '{$data_inicial}' AND '{$data_final}' ORDER BY horario ASC");
    $result = $query->fetchAll();
} elseif (!$sala) {
    $query = $conn->query("SELECT * FROM agendamentos WHERE data_agendamento 
                                BETWEEN '{$data_inicial}' AND '{$data_final}' AND id_profissional = '{$profissional}' 
                                ORDER BY horario ASC");
    $result = $query->fetchAll();
} elseif (!$profissional) {
    $query = $conn->query("SELECT * FROM agendamentos WHERE data_agendamento 
                                BETWEEN '{$data_inicial}' AND '{$data_final}' AND sala = '{$sala}' ORDER BY horario ASC");
    $result = $query->fetchAll();
} else {
    $session->set("error", "Wooops, verifique os filtros e tente novamente!");
    header('Location: ./exportAppointments.php');
}
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Relatório de agendamentos</title>
</head>
<body class="bg-white-100 flex flex-col items-center mt-4 h-screen">

<table class="w-[65rem] border-collapse text-center mr-4">
    <thead class="bg-purple-700 text-white">
    <tr>
        <th class="p-2 rounded-tl-lg">Data</th>
        <th>Horário</th>
        <th>Paciente</th>
        <th>Profissional</th>
        <th>Tipo de agendamento</th>
        <th>Sala</th>
        <th class="rounded-tr-lg">Status</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($result) :?>
        <?php foreach ($result as $item) : ?>
            <tr class="bg-transparent border-t-4 border-purple-200 text-gray-600"">
            <td class="p-2"><?= date("d/m/Y", strtotime($item->data_agendamento)) ?></td>
            <td class="p-2"><?= $item->horario ?></td>
            <td title="Editar agendamento">
                <a href="update-appointment.php?id=<?= $item->id ?>"
                   class="hover:text-purple-900 hover:font-bold">
                    <?= $item->nome ?>
                </a>
            </td>
            <?php
            $q = $conn->query("SELECT p.nome FROM agendamentos 
                                        INNER JOIN profissionais p WHERE p.id = {$item->id_profissional}");
            $r = $q->fetch();
            ?>
            <td><?= $r->nome ?></td>
            <?php if ($item->tipo_agendamento == "Horário vago") : ?>
                <td class="bg-red-400 text-white font-medium rounded-md">
                    <?= $item->tipo_agendamento ?>
                </td>
            <?php else : ?>
                <td><?= $item->tipo_agendamento ?></td>
            <?php endif; ?>
            <td class="p-2"><?= $item->sala ?></td>
            <td><?= $item->status ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>

</body>

</html>
