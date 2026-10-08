<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;

final class SubtracaoMatrizesTest extends AlgebraLinearTestCase
{
    #[Test]
    public function id04_subtracao_de_duas_matrizes_compativeis(): void
    {
        $a = [[1, 2], [3, 4]];
        $b = [[5, 6], [7, 8]];

        $resultado = $this->algebra->subtrair($a, $b);

        $this->assertMatrizIgual([[-4, -4], [-4, -4]], $resultado);
    }

    #[Test]
    public function id05_subtracao_com_dimensoes_incompativeis(): void
    {
        $a = [[1, 2], [3, 4]];
        $d = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Dimensões incompatíveis para subtração de matrizes');

        $this->algebra->subtrair($a, $d);
    }
}
