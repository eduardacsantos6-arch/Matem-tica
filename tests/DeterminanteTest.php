<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;

final class DeterminanteTest extends AlgebraLinearTestCase
{
    #[Test]
    public function id11_determinante_de_matriz_2x2(): void
    {
        $this->assertEqualsWithDelta(-2, $this->algebra->determinante([[1, 2], [3, 4]]), self::DELTA);
    }

    #[Test]
    public function id12_determinante_de_matriz_3x3_pela_regra_de_sarrus(): void
    {
        $c = [[1, 2, 3], [0, 1, 4], [5, 6, 0]];

        $this->assertEqualsWithDelta(1, $this->algebra->determinante($c), self::DELTA);
    }

    #[Test]
    public function id13_determinante_de_matriz_1x1(): void
    {
        $this->assertEqualsWithDelta(5, $this->algebra->determinante([[5]]), self::DELTA);
    }

    #[Test]
    public function id14_determinante_da_matriz_identidade_3x3(): void
    {
        $i3 = [[1, 0, 0], [0, 1, 0], [0, 0, 1]];

        $this->assertEqualsWithDelta(1, $this->algebra->determinante($i3), self::DELTA);
    }

    #[Test]
    public function id15_determinante_da_matriz_nula(): void
    {
        $this->assertEqualsWithDelta(0, $this->algebra->determinante($this->nula2), self::DELTA);
    }
}
