<?php
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
<body class="bg-gray-100 overflow-hidden ">
    <div class="grid grid-cols-3 items-center justify-center p-4 h-screen">
        <div class="col-span-1">
            <?php
                $postSearh = filter_input(INPUT_POST, "search");
                $day = $postSearh ? $postSearh : date("Y-m-d");
                $conn = Connect::getInstance();
                $query = $conn->query("SELECT * FROM agendamentos WHERE data_agendamento = '{$day}'");
                $res = $query->fetchAll();
            ?>
            <form action="" class="flex items-center justify-center gap-4" method="POST">
                <input
                        class="bg-transparent text-gray-500 border border-gray-400 rounded-lg p-2 focus:outline-purple-900"
                        type="date"
                        name="search"
                        id="data-agendamento">
                <button title="Buscar agendamentos">
                    <img src="./source/assets/icons/search.svg" alt="" class="w-8 h-8">
                </button>
            </form>
        </div>
        <div class="w-full col-span-2 flex flex-col gap-4">
            <div class="flex items-center gap-4">
                <a
                        href="./new_appointment.php"
                        class="rounded-lg bg-transparent border-2 border-purple-300 text-purple-700 font-bold p-2 hover:bg-purple-700 hover:text-white w-fit cursor-pointer"
                >
                    Novo agendamento
                </a>
                <a
                        href="./new-professional.php"
                        class="rounded-lg bg-transparent border-2 border-purple-300 text-purple-700 font-bold p-2 hover:bg-purple-700 hover:text-white w-fit cursor-pointer"
                >
                    Cadastrar profissional
                </a>
            </div>
            <div class="overflow-y-auto h-[36rem]">
                <table class="w-full border-collapse min-w-max text-center mr-4 relative">
                    <thead class="bg-purple-700 text-white">
                        <tr>
                            <th class="p-2 rounded-tl-lg">Horário</th>
                            <th>Paciente</th>
                            <th>Profissional</th>
                            <th>Tipo de agendamento</th>
                            <th class="rounded-tr-lg">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($postSearh !== date("Y-m-d")) :?>
                            <?php foreach ($res as $item) :?>
                                <tr class="bg-gray-100 border-t-4 border-purple-200 text-gray-600"">
                                    <td class="p-2"><?= $item->horario ?></td>
                                    <td title="Editar agendamento"><a href="update-appointment.php?id=<?= $item->id ?>" class="hover:text-purple-900 hover:font-bold">
                                            <?= $item->nome ?>
                                        </a>
                                    </td>
                                    <?php
                                        $q = $conn->query("SELECT p.nome FROM agendamentos 
                                        INNER JOIN profissionais p WHERE p.id = {$item->id_profissional}");
                                        $r = $q->fetch();
                                    ?>
                                        <td><?= $r->nome ?></td>
                                    <td><?= $item->tipo_agendamento ?></td>
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
