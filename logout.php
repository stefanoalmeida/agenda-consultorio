<?php

use Source\Core\Session;

require_once __DIR__ . '/vendor/autoload.php';

$session = new Session();
$session->destroy();
header('Location: ./index.php');
exit();