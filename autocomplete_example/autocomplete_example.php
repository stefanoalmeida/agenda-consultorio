<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Exemple autocomplete com Jquery</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous">
    </script>
    <script
            src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
            integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0="
            crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $(document).ready(function () {

            // Captura o retorno do get_professional.php
            $.getJSON('get_professional.php', function (data) {
                var professional = [];

                // Armazena na array capturando somente o nome do profissional
                $(data).each(function (key, value) {
                    professional.push(value.nome);
                });

                // Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
                $('#txtProfessional').autocomplete({source: professional, minLength: 3});
            });
        });
    </script>
</head>
<body>
<label>Profissional:</label>
<input type="text" id="txtProfessional" name="txtProfessional" size="60"/>
</body>
</html>
