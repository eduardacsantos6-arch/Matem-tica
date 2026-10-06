<?php

namespace Controller;

use Model\AlgebraLinear;

class SistemaController {
    private AlgebraLinear $algebra;

    public function __construct()
    {
        $this->algebra = new AlgebraLinear();
    }
}