<?php

namespace Controller;

use Model\AlgebraLinear;

class MatrizController {
    private AlgebraLinear $algebra;

    public function __construct() {

        $this->algebra = new AlgebraLinear();
    }

    public function somar(array $matrizA, array $matrizB): array {

        return $this->algebra->somar($matrizA, $matrizB);
    }

    public function subtrair(array $matrizA, array $matrizB): array {

        return $this->algebra->subtrair($matrizA, $matrizB);
    }

    public function multiplicar(array $matrizA, array $matrizB): array {

        return $this->algebra->multiplicar($matrizA, $matrizB);
    }

    public function transpor(array $matriz): array {

        return $this->algebra->transpor($matriz);
    }
}
