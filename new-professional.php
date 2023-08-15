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
<body class="bg-white-100 flex flex-col items-center justify-center h-screen gap-8 relative">

<h2 class="font-bold text-purple-700 text-xl uppercase">Novo profissional</h2>

<div class="w-96">
    <form action="./source/commands/create_professional.php" method="POST" class="flex flex-col gap-4">
        <input type="text" placeholder="Digite o nome do profissional" name="nome"
               class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-500">
        <select name="especialidade" id=""
                class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-500">
            <option value="" selected>Selecione...</option>
            <option value="Fonoaudióloga">Fonoaudióloga</option>
            <option value="Psicóloga">Psicóloga</option>
            <option value="Neurologista">Neurologista</option>
            <option value="Psicopedagoga">Psicopedagoga</option>
        </select>
        <button
                class="rounded-lg bg-purple-700 text-white font-bold p-2 shadow-lg hover:shadow-purple-400/70 hover:border-none
                 hover:bg-purple-600"
        >
            Salvar
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
