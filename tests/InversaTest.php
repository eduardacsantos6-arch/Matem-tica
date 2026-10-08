<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;

final class InversaTest extends AlgebraLinearTestCase
{
    #[Test]
    public function id16_inversa_de_matriz_2x2_nao_singular(): void
    {
        $a = [[1, 2], [3, 4]];

        $resultado = $this->algebra->inversa($a);

        $this->assertMatrizIgual([[-2, 1], [1.5, -0.5]], $resultado);
    }

    #[Test]
    public function id17_tentativa_de_inversa_de_matriz_singular(): void
    {
        $s = [[2, 4], [1, 2]];

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Matriz singular: não possui inversa');

        $this->algebra->inversa($s);
    }

    #[Test]
    public function id18_inversa_da_matriz_identidade(): void
    {
        $resultado = $this->algebra->inversa($this->identidade2);

        $this->assertMatrizIgual($this->identidade2, $resultado);
    }
}
