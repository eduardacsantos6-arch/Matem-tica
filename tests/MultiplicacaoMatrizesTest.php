<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;

final class MultiplicacaoMatrizesTest extends AlgebraLinearTestCase
{
    #[Test]
    public function id06_multiplicacao_de_duas_matrizes_compativeis(): void
    {
        $a = [[1, 2], [3, 4]];
        $b = [[5, 6], [7, 8]];

        $resultado = $this->algebra->multiplicar($a, $b);

        $this->assertMatrizIgual([[19, 22], [43, 50]], $resultado);
    }

    #[Test]
    public function id07_multiplicacao_com_dimensoes_incompativeis(): void
    {
        $a = [[1, 2], [3, 4]];
        $e = [[1, 2], [3, 4], [5, 6]];

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Número de colunas da primeira matriz deve ser igual ao número de linhas da segunda'
        );

        $this->algebra->multiplicar($a, $e);
    }

    #[Test]
    public function id08_multiplicacao_pela_identidade_resulta_na_propria_matriz(): void
    {
        $a = [[1, 2], [3, 4]];

        $resultado = $this->algebra->multiplicar($a, $this->identidade2);

        $this->assertMatrizIgual($a, $resultado);
    }
}
