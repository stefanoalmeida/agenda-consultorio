<?php

$conn = new PDO('mysql:host=localhost;dbname=ts_plataforma', 'root', '');
$acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
$parametro = (isset($_GET['parametro'])) ? $_GET['parametro'] : '';
if ($acao == 'autocomplete'): $where = (!empty($parametro)) ? 'WHERE nome LIKE ?' : '';
    $result = $conn->query("SELECT nome FROM clientes WHERE nome LIKE '%{$parametro}%' 
AND status = 'Ativo'")->fetchAll();
    $dados = $result;
    $json = json_encode($dados);
    echo $json;
endif;
?>