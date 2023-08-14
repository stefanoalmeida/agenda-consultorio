<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Agendamento extends DataLayer
{
    public function __construct()
    {
        parent::__construct("agendamentos",
            [
                "nome",
                "data_agendamento",
                "horario",
                "profissional",
                "tipo_agendamento",
                "status"
            ]);
    }
}