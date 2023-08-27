<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Login</title>

    <style>
        :focus {
            outline: none;
        }
    </style>
</head>
<body class="bg-white-100 flex flex-col items-center justify-center h-screen gap-8">

<h2 class="font-bold text-purple-700 text-xl uppercase">Faça seu Login</h2>

<div class="w-96">
    <form action="./source/login_validate.php" method="POST" class="flex flex-col gap-4 p-4">

        <div class="flex items-center gap-2 p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500
        focus-within:shadow-lg focus-within:shadow-purple-700/50 focus-within:text-purple-700" >
            <ion-icon name="person-circle-outline" class="text-xl"></ion-icon>
            <input class="border-none w-60" type="text" placeholder="Digite seu nome de usuário" name="user">
        </div>

        <div class="flex items-center gap-2 p-2 bg-transparent border-2 border-gray-400 rounded-lg text-gray-500
         focus-within:shadow-lg focus-within:shadow-purple-700/50 focus-within:text-purple-700" >
            <ion-icon name="lock-closed-outline" class="text-xl"></ion-icon>
            <input class="border-none w-60" type="password" placeholder="Digite sua senha" name="senha">
        </div>

        <button
                class="w-full rounded-lg bg-purple-700 text-white font-bold p-2 shadow-lg
                    hover:shadow-purple-400/70 hover:border-none hover:bg-purple-600 w-48 uppercase"
        >
            Entrar
        </button>

    </form>
</div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
