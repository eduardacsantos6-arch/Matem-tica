<?php

namespace Controller;

use Model\AlgebraLinear;

class DeterminanteController
{
    private AlgebraLinear $algebra;

    public function __construct()
    {
        $this->algebra = new AlgebraLinear();
    }

    public function calcular(array $matriz): float
    {
        return $this->algebra->determinante($matriz);
    }
}
