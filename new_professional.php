<?php
require_once __DIR__ . "/vendor/autoload.php";

use Source\Core\Session;
use Source\Models\Profissional;

$session = new Session();
$session->verifySession();
$session->regenerate();

$professional = new Profissional();
$professionals = $professional->find()->fetch();
$res = $professional->fetch(true);
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
<body class="flex flex-col items-center justify-center p-4 h-fit md:grid md:grid-cols-3 md:h-screen md:gap-12">

<div class="bg-white-100 flex flex-col items-center justify-center gap-8 md:h-screen relative">
    <h2 class="font-bold text-purple-700 text-xl uppercase mt-16 md:mt-0">Novo profissional</h2>

    <?php if (isset($_SESSION["success"])) : ?>
        <span class="rounded-md bg-transparent border-2 border-green-500 p-2 text-green-500 font-medium text-md"><?= $_SESSION["success"] ?></span>
        <?php unset($_SESSION["success"]); endif; ?>

    <div class="w-[22rem]">
        <form action="./source/commands/create_professional.php" method="POST" class="flex flex-col gap-4">
            <input type="text" placeholder="Digite o nome do profissional" name="nome"
                   class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-500"
                   required>
            <select name="especialidade" id=""
                    class="p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500 focus:outline-purple-500"
                    required>
                <option value="" selected>Selecione a especialidade</option>
                <option value="Fonoaudiologia">Fonoaudiologia</option>
                <option value="Psicologia">Psicologia</option>
                <option value="Neurologia">Neurologia</option>
                <option value="Psicopedagogia">Psicopedagogia</option>
                <option value="Nutrição">Nutrição</option>
                <option value="Neuropsicologia">Neuropsicologia</option>
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
            href="home.php"
            class="p-2 bg-transparent text-purple-700 font-bold rounded-lg shadow-lg hover:shadow-purple-500/70
        hover:border-none hover:bg-purple-700 hover:text-white fixed right-4 top-4"
    >
        Voltar para a página inicial
    </a>
</div>
<div class="w-full col-span-2 flex flex-col gap-4 mt-8">
    <div class="overflow-y-auto overflow-x-hidden h-[20rem] md:h-[36rem]">
        <table class="w-full border-collapse min-w-max text-center mr-4 relative">
            <thead class="bg-purple-700 text-white">
            <tr>
                <th class="p-2 rounded-tl-lg">Profissional</th>
                <th>Especialidade</th>
                <th class="rounded-tr-lg">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($res) :?>
                <?php foreach ($res as $item) : ?>
                    <tr class="bg-transparent border-t-4 border-purple-200 text-gray-600"">
                    <td title="Editar profissional">
                        <a href="update_professional.php?id=<?= $item->id ?>"
                           class="hover:text-purple-900 hover:font-bold">
                            <?= $item->nome ?>
                        </a>
                    </td>
                    <td class="p-2"><?= $item->especialidade ?></td>
                    <td class="p-2"><?= $item->status ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
