<?php
//$pdo = new PDO("mysql:host=localhost; dbname=db_sac; charset=utf8;", "root", "011224", $opcoes);
//$dados = $pdo->prepare("SELECT * FROM cliente");
//$dados->execute();
//echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="javascript/jquery-1.8.3.js"></script>
    <script src="javascript/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            // Captura o retorno do retornaCliente.php
            $.getJSON('retornaCliente.php', function (data) {
                var cliente = [];

                // Armazena na array capturando somente o nome do cliente
                $(data).each(function (key, value) {
                    cliente.push(value.cliente);
                });

                // Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
                $('#txtCliente').autocomplete({source: cliente, minLength: 3});
            });
        });
    </script>
</head>
<body>
<label>Cliente:</label>
<input type="text" id="txtCliente" name="txtCliente" size="60"/>
</body>
</html>
