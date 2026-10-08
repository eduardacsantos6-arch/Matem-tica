<?php

namespace Controller;

use Model\AlgebraLinear;

class SistemaController
{
    private AlgebraLinear $algebra;

    public function __construct()
    {
        $this->algebra = new AlgebraLinear();
    }

    public function resolver(array $matriz, array $termosIndependentes): array
    {
        return $this->algebra->resolverSistema($matriz, $termosIndependentes);
    }

    public function classificar(array $matriz, array $termosIndependentes): string
    {
        return $this->algebra->classificarSistema($matriz, $termosIndependentes);
    }
}
