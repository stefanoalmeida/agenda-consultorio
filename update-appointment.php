<?php
    require_once __DIR__ . "/vendor/autoload.php";

    use Source\Models\Profissional;

    $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

    $appointment = new \Source\Models\Agendamento();
    $result = $appointment->findById($id);

    $professional = new Profissional();
    $professionalFind = $professional->find("status = :st", "st=Ativo")->fetch(true);
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Editar agendamento</title>
</head>
<body>
<body class="bg-gray-100 flex flex-col items-center justify-center h-screen gap-8 relative">

<h2 class="font-bold text-purple-900 text-xl uppercase">Editar agendamento</h2>

<div class="w-96">
    <form action="source/commands/update_appointment.php" method="POST" class="flex flex-col gap-4">
        <input type="hidden" name="id" value="<?= $result->id ?>">
        <input type="text" placeholder="Digite o nome do paciente" name="nome" value="<?= $result->nome ?>" class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-700">
        <input type="date" name="data_agendamento" value="<?= $result->data_agendamento ?>" class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-700">
        <input type="time" name="horario" value="<?= $result->horario ?>" class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-700">
        <select name="sala" id="" class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-700">
            <option value="<?= $result-> sala ?>" selected><?= $result-> sala ?></option>
            <option value="Sala 01">Sala 01</option>
            <option value="Sala 02">Sala 02</option>
            <option value="Sala 03">Sala 03</option>
            <option value="Sala 04">Sala 04</option>
            <option value="Sala 05">Sala 05</option>
            <option value="Sala 06">Sala 06</option>
        </select>
        <select name="id_profissional" id="" class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-700">
            <?php
            $conn = \CoffeeCode\DataLayer\Connect::getInstance();
            $q = $conn->query("SELECT p.nome FROM agendamentos 
                                        INNER JOIN profissionais p WHERE p.id = {$result->id_profissional}");
            $r = $q->fetch();
            ?>
            <option value="<?= $result->id_profissional ?>" selected><?= $r->nome ?></option>
            <?php foreach ($professionalFind as $prof) :?>
                <option value="<?= $prof->id ?>"><?= $prof->nome ?></option>
            <?php endforeach; ?>
        </select>
        <select name="tipo_agendamento" id="" class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-700">
            <option value="<?= $result->tipo_agendamento ?>" selected><?= $result->tipo_agendamento ?></option>
            <option value="Avaliação">Avaliação</option>
            <option value="Sessão">Sessão</option>
            <option value="Reposição">Reposição</option>
            <option value="Devolutiva">Devolutiva</option>
            <option value="Consulta">Consulta</option>
            <option value="Retorno">Retorno</option>
        </select>
        <select name="status" id="" class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-700">
            <option value="<?= $result->status ?>" selected><?= $result->status ?></option>
            <option value="Confirmado">Confirmado</option>
            <option value="Presença">Presença</option>
            <option value="Cancelado Profissional">Cancelado Profissional</option>
            <option value="Cancelado Paciente">Cancelado Paciente</option>
            <option value="Falta">Falta</option>
        </select>

        <div class="flex gap-1">
            <button
                    class="flex-1 rounded-lg bg-purple-700 text-white font-bold p-2 hover:bg-purple-600 w-48"
            >
                Salvar alterações
            </button>
            <a
                    href="./source/commands/delete-appointment.php?id=<?= $result->id ?>"
                    class="w-fit rounded-lg bg-red-700 text-white font-bold p-2 hover:bg-red-600"
            >
                Deletar agendamento
            </a>

        </div>

    </form>
</div>

<a
        href="./index.php"
        class="p-2 border-2 bg-transparent text-purple-700 font-bold rounded-lg
                    hover:bg-purple-700 hover:text-white fixed right-4 top-4"
>
    Voltar para a página inicial
</a>
</body>
</html>
