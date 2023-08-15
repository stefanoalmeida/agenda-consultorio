<?php
session_start();

require_once __DIR__ . "/vendor/autoload.php";

use CoffeeCode\DataLayer\Connect;
use Source\Models\Agendamento;

$appointment = new Agendamento();
$appointmentsFind = $appointment->find()->fetch(true);
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>TS-Agendamentos</title>
</head>
<body class="bg-white-100 overflow-y-hidden">
<div class="grid grid-cols-3 items-center justify-center p-4 h-screen">
    <div class="col-span-1">
        <?php
        $postSearh = filter_input(INPUT_POST, "search");
        $sala = filter_input(INPUT_POST, "sala", FILTER_SANITIZE_STRIPPED);
        $profissional = filter_input(INPUT_POST, "profissional", FILTER_SANITIZE_STRIPPED);

        $day = $postSearh ? $postSearh : date("Y-m-d");

        $_SESSION["data_agendamento"] = $day;

        $conn = Connect::getInstance();
        if ($postSearh and $sala) {
            $query = $conn->query("SELECT * FROM agendamentos WHERE data_agendamento = '{$day}' AND sala = '{$sala}'");
            $res = $query->fetchAll();
        } elseif ($postSearh and $profissional) {
            $query = $conn->query("SELECT * FROM agendamentos WHERE data_agendamento = '{$day}' AND id_profissional = '{$profissional}'");
            $res = $query->fetchAll();
        } else {
            $query = $conn->query("SELECT * FROM agendamentos WHERE data_agendamento = '{$day}'");
            $res = $query->fetchAll();
        }
        ?>
        <form action="" class="flex flex-col items-center justify-center gap-4 w-96" method="POST">
            <input
                    class="bg-transparent text-gray-500 border border-gray-400 rounded-lg w-full p-2 focus:outline-purple-900"
                    type="date"
                    name="search"
                    id="data-agendamento"
                    value=<?= $_SESSION["data_agendamento"] ?>
            >
            <select name="sala" id=""
                    class="w-full p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-700">
                <option value="" selected>Selecione a sala de atendimento</option>
                <option value="Sala 01">Sala 01</option>
                <option value="Sala 02">Sala 02</option>
                <option value="Sala 03">Sala 03</option>
                <option value="Sala 04">Sala 04</option>
                <option value="Sala 05">Sala 05</option>
                <option value="Sala 06">Sala 06</option>
            </select>
            <select name="profissional" id=""
                    class="w-full p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-700">
                <?php
                $professionals = new \Source\Models\Profissional();
                $professionalFind = $professionals->find()->fetch(true);
                ?>
                <option value="" selected>Selecione um profissional</option>
                <?php foreach ($professionalFind as $prof) : ?>
                    <option value="<?= $prof->id ?>"><?= $prof->nome ?></option>
                <?php endforeach; ?>
            </select>
            <button title="Buscar agendamentos"
                    class="w-full rounded-lg bg-purple-700 text-white font-bold p-2 hover:bg-purple-600 shadow-lg
                    hover:shadow-purple-400/70">
                Buscar agendamentos
            </button>
            <a href="./index.php"
               title="Limpar filtros"
               class="w-full text-center rounded-lg bg-transparent text-purple-700
               font-bold p-2 shadow-lg hover:shadow-purple-500/70 hover:border-none"
            >
                Limpar filtros
            </a>
        </form>
    </div>
    <div class="w-full col-span-2 flex flex-col gap-4">
        <div class="flex items-center gap-4">
            <p class="font-bold text-purple-700 text-md">
                Agendamentos do dia: <?= date("d/m/Y", strtotime($day)) ?>
            </p>
            <a
                    href="./new_appointment.php"
                    title="Novo agendamento"
                    class="rounded-lg bg-transparent border border-purple-300 text-purple-700 font-bold p-2 shadow-lg
                    hover:shadow-purple-400/70 hover:border-none hover:bg-purple-700 hover:text-white w-fit cursor-pointer"
            >
                Novo agendamento
            </a>
            <a
                    href="./new-professional.php"
                    title="Cadastrar profissional"
                    class="rounded-lg bg-transparent border border-purple-300 text-purple-700 font-bold p-2 shadow-lg
                    hover:shadow-purple-400/70 hover:border-none hover:bg-purple-700 hover:text-white w-fit cursor-pointer"
            >
                Cadastrar profissional
            </a>
            <a
                    href="./exportAppointments.php"
                    title="Exportar agendamentos"
                    class="rounded-lg bg-transparent border border-purple-300 text-purple-700 font-bold p-2 shadow-lg
                    hover:shadow-purple-400/70 hover:border-none hover:bg-purple-700 hover:text-white w-fit cursor-pointer"
            >
                Exportar agendamentos
            </a>
        </div>
        <div class="overflow-y-auto h-[36rem]">
            <table class="w-full border-collapse min-w-max text-center mr-4 relative">
                <thead class="bg-purple-700 text-white">
                <tr>
                    <th class="p-2 rounded-tl-lg">Horário</th>
                    <th>Sala</th>
                    <th>Paciente</th>
                    <th>Profissional</th>
                    <th>Tipo de agendamento</th>
                    <th class="rounded-tr-lg">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($res) :?>
                    <?php foreach ($res as $item) : ?>
                        <tr class="bg-transparent border-t-4 border-purple-200 text-gray-600"">
                        <td class="p-2"><?= $item->horario ?></td>
                        <td class="p-2"><?= $item->sala ?></td>
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
                        <td><?= $item->status ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
