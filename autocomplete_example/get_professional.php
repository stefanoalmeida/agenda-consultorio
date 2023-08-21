<?php

$conn = new PDO('mysql:host=localhost;dbname=ts_plataforma', 'root', '');
$clientsAll = $conn->query("SELECT * FROM clientes");
$clientsAll->fetchAll();

echo json_encode($clientsAll);
?>