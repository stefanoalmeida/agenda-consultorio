<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Source\Core\Session;
use Source\Models\User;

$session = new Session();

$userPost = filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRIPPED);
$passwdPost = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRIPPED);
$passEncoded = base64_encode($passwdPost);

$users = new User();
$user = $users->find("user = :user AND password = :passwd", "user={$userPost}&passwd={$passEncoded}")->fetch();

if ($user) {
    $session->set("logado", true);
    header('Location: ./../home.php');
} else {
    header('Location: ./../index.php');
}
