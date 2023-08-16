<?php
require_once __DIR__ . "/vendor/autoload.php";

$conn =\CoffeeCode\DataLayer\Connect::getInstance();
$query = $conn->query("SELECT * FROM profissionais");
$res = $query->fetchAll();

echo json_encode($res);
?>