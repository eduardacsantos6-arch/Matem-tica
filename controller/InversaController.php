<?php

namespace Controller;

use Model\AlgebraLinear;

class InversaController
{
    private AlgebraLinear $algebra;

    public function __construct()
    {
        $this->algebra = new AlgebraLinear();
    }

    public function calcular(array $matriz): array
    {
        return $this->algebra->inversa($matriz);
    }
}
