<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Source\Core\Login;
use Source\Core\Session;

$session = new Session();

$login = new Login();
$lista = $login->buscar($_POST['user'], base64_encode($_POST['senha']));

if (isset($_POST['user']) && (isset($_POST['senha']))) {
    $conectado = $login->autentica($_POST['user'], base64_encode($_POST['senha']));

    if ($conectado) {
        $_SESSION['logado'] = true;
        header('Location: ./../home.php');
    } else {
        header('Location: ./../index.php');
    }
}
