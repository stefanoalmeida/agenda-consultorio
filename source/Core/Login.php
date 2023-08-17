<?php

namespace Source\Core;

use CoffeeCode\DataLayer\Connect;

class Login
{

    function autentica($user, $senha)
    {
        $conn = Connect::getInstance();
        $query = $conn->query("SELECT * FROM users WHERE user = '{$user}' AND password = '{$senha}'");
        $result = $query->rowCount();
        return $result;
    }

    function buscar($user, $senha){
        $conn = Connect::getInstance();
        $resultado = $conn->query("SELECT * FROM users WHERE user = '$user' AND password = '$senha'");
        $lista = $resultado->fetch();
        return $lista;
    }
}