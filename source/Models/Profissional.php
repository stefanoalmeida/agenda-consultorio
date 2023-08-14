<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Profissional extends DataLayer
{
    public function __construct()
    {
        parent::__construct("profissionais", ["nome", "especialidade", "status"]);
    }
}