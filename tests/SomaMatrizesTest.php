<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;

final class SomaMatrizesTest extends AlgebraLinearTestCase
{
    #[Test]
    public function id01_soma_de_duas_matrizes_2x2_compativeis(): void
    {
        $a = [[1, 2], [3, 4]];
        $b = [[5, 6], [7, 8]];

        $resultado = $this->algebra->somar($a, $b);

        $this->assertMatrizIgual([[6, 8], [10, 12]], $resultado);
    }

    #[Test]
    public function id02_soma_com_dimensoes_incompativeis(): void
    {
        $a = [[1, 2], [3, 4]];
        $d = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Dimensões incompatíveis para soma de matrizes');

        $this->algebra->somar($a, $d);
    }

    #[Test]
    public function id03_soma_com_matriz_nula_resulta_na_propria_matriz(): void
    {
        $a = [[1, 2], [3, 4]];

        $resultado = $this->algebra->somar($a, $this->nula2);

        $this->assertMatrizIgual($a, $resultado);
    }
}
