<?php

use Source\Core\Login;
use Source\Core\Session;

require_once __DIR__ . '/../vendor/autoload.php';

$session = new Session();

$login = new Login();
$lista = $login->buscar($_POST['user'], base64_encode($_POST['senha']));

if (isset($_POST['user']) && (isset($_POST['senha']))) {
    $conectado = $login->autentica($_POST['user'], base64_encode($_POST['senha']));
    if ($conectado) {
        $_SESSION['logado'] = true;
        $_SESSION["user"] = $_POST['user'];
        header('Location: ../home.php');
    } else {
        $_SESSION["logado"] = false;
        header('Location: ./../index.php');
    }
}
