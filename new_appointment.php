<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Novo agendamento</title>
</head>
<body class="bg-gray-100">
    <div class="flex-1 items-center justify-center h-screen w-96">
        <form action="./source/commands/create_appointment.php" method="POST" class="flex flex-col gap-4">
            <input type="text" name="nome" class="p-4 bg-transparent border-2 border-purple-500 rounded-lg text-gray-500">
            <input type="date" name="data_agendamento" class="p-4 bg-transparent border-2 border-purple-500 rounded-lg text-gray-500">
            <input type="time" name="horario" class="p-4 bg-transparent border-2 border-purple-500 rounded-lg text-gray-500">
            <input type="text" name="profissional" class="p-4 bg-transparent border-2 border-purple-500 rounded-lg text-gray-500">
            <select name="tipo_agendamento" id="" class="p-4 bg-transparent border-2 border-purple-500 rounded-lg text-gray-500">
                <option value="" selected>Selecione...</option>
                <option value="Avaliação">Avaliação</option>
                <option value="Sessão">Sessão</option>
                <option value="Reposição">Reposição</option>
                <option value="Devolutiva">Devolutiva</option>
                <option value="Consulta">Consulta</option>
                <option value="Retorno">Retorno</option>
            </select>
            <select name="status" id="" class="p-4 bg-transparent border-2 border-purple-500 rounded-lg text-gray-500">
                <option value="" selected>Selecione...</option>
                <option value="Confirmado">Confirmado</option>
                <option value="Presença">Presença</option>
                <option value="Cancelado Profissional">Cancelado Profissional</option>
                <option value="Cancelado Paciente">Cancelado Paciente</option>
                <option value="Falta">Falta</option>
            </select>

            <button>Salvar</button>
        </form>
    </div>
</body>
</html>
