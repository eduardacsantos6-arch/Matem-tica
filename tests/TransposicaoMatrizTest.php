<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;

final class TransposicaoMatrizTest extends AlgebraLinearTestCase
{
    #[Test]
    public function id09_transposta_de_matriz_retangular_2x3(): void
    {
        $f = [[1, 2, 3], [4, 5, 6]];

        $resultado = $this->algebra->transpor($f);

        $this->assertCount(3, $resultado);
        $this->assertCount(2, $resultado[0]);
        $this->assertMatrizIgual([[1, 4], [2, 5], [3, 6]], $resultado);
    }

    #[Test]
    public function id10_transposta_de_matriz_1x1(): void
    {
        $m = [[5]];

        $resultado = $this->algebra->transpor($m);

        $this->assertMatrizIgual([[5]], $resultado);
    }
}
