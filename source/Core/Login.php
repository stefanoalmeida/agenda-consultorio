<?php

namespace Source\Core;

use PDO;

class Login
{

    function autentica($user, $senha)
    {
        $conn = \CoffeeCode\DataLayer\Connect::getInstance();
        $query = $conn->query("SELECT count(*) as conectado FROM users WHERE user = '{$user}' AND password = '{$senha}'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result->conectado;
    }

    function buscar($user, $senha){
        $conn = \CoffeeCode\DataLayer\Connect::getInstance();
        $resultado = $conn->query("SELECT * FROM users WHERE user = '$user' AND password = '$senha'");
        $lista = $resultado->fetch();
        return $lista;
    }
}