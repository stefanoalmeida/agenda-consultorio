<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Agendamento extends DataLayer
{
    public function __construct()
    {
        parent::__construct("agendamentos",
            [
                "id_profissional",
                "nome",
                "data_agendamento",
                "horario",
                "tipo_agendamento",
                "status"
            ]);
    }
}