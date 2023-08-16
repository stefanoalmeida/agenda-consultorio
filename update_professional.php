<?php
session_start();
require_once __DIR__ . "/vendor/autoload.php";

use Source\Models\Profissional;

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

$professional = new Profissional();
$res = $professional->findById($id);
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Novo profissional</title>
</head>
<body class="bg-white-100 flex flex-col items-center justify-center h-screen gap-8 relative">

<h2 class="font-bold text-purple-700 text-xl uppercase">Novo profissional</h2>

<?php if (isset($_SESSION["success"])) : ?>
    <span class="rounded-md bg-transparent border-2 border-green-500 p-2 text-green-500 font-medium text-md"><?= $_SESSION["success"] ?></span>
    <?php unset($_SESSION["success"]); endif; ?>

<div class="w-96">
    <form action="./source/commands/update_professional.php" method="POST" class="flex flex-col gap-4">
        <input type="hidden" name="id" value="<?= $res->id ?>">
        <input type="text" placeholder="Digite o nome do profissional" name="nome"
               class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-500"
               value="<?= $res->nome ?>" required>
        <select name="especialidade" id=""
                class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-500"
                required>
            <option value="<?= $res->especialidade ?>" selected><?= $res->especialidade ?></option>
            <option value="Fonoaudiologia">Fonoaudiologia</option>
            <option value="Psicologia">Psicologia</option>
            <option value="Neurologia">Neurologia</option>
            <option value="Psicopedagogia">Psicopedagogia</option>
            <option value="Nutrição">Nutrição</option>
            <option value="Neuropsicologia">Neuropsicologia</option>
        </select>
        <select name="status" id=""
                class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-500"
                required>
            <option value="<?= $res->status ?>" selected><?= $res->status ?></option>
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
        </select>
        <div class="flex gap-1">
            <button
                    class="flex-1 rounded-lg bg-purple-700 text-white font-bold p-2 shadow-lg
                    hover:shadow-purple-400/70 hover:border-none hover:bg-purple-600 w-48"
            >
                Salvar alterações
            </button>
            <a
                    href="./source/commands/delete_professional.php?id=<?= $res->id ?>"
                    class="w-fit rounded-lg bg-transparent text-red-500 border-2 border-red-200 font-bold p-2 shadow-lg hover:shadow-red-400/70
                        hover:border-none hover:bg-red-500 hover:text-white"
            >
                Deletar agendamento
            </a>

        </div>
    </form>
</div>
<a
        href="./new_professional.php"
        class="p-2 bg-transparent text-purple-700 font-bold rounded-lg shadow-lg hover:shadow-purple-500/70
        hover:border-none hover:bg-purple-700 hover:text-white fixed right-4 top-4"
>
    Voltar para a página inicial
</a>
</body>
</html>
