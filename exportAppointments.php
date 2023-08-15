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
<body class="bg-white-100 flex flex-col items-center justify-center h-screen gap-6 relative">

<h2 class="font-bold text-purple-700 text-xl uppercase">Exportar agendamentos</h2>

<div class="w-96">
    <form action="./source/commands/create_professional.php" method="POST" class="flex flex-col gap-3">
        <div class="flex flex-col gap-1">
            <label for="" class="text-gray-500">Data Inicial:</label>
            <input type="date" name="data_inicial"
                   class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-500"
            >
        </div>

        <div class="flex flex-col gap-1">
            <label for="" class="text-gray-500">Data Final:</label>
            <input type="date" name="data_final"
                   class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-500"
            >
        </div>

        <div class="flex flex-col gap-1">
            <select name="sala" id=""
                    class="w-full p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500
                    focus:outline-purple-700"
            >
                <option value="" selected>Selecione a sala...</option>
                <option value="Sala 01">Sala 01</option>
                <option value="Sala 02">Sala 02</option>
                <option value="Sala 03">Sala 03</option>
                <option value="Sala 04">Sala 04</option>
                <option value="Sala 05">Sala 05</option>
                <option value="Sala 06">Sala 06</option>
            </select>
        </div>

        <button
                class="rounded-lg bg-purple-700 text-white font-bold p-2 shadow-lg hover:shadow-purple-400/70 hover:border-none
                 hover:bg-purple-600"
        >
            Exportar
        </button>
    </form>
</div>
<a
        href="./index.php"
        class="p-2 bg-transparent text-purple-700 font-bold rounded-lg shadow-lg hover:shadow-purple-500/70
        hover:border-none hover:bg-purple-700 hover:text-white fixed right-4 top-4"
>
    Voltar para a página inicial
</a>
</body>
</html>
