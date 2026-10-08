<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;

final class SistemaLinearTest extends AlgebraLinearTestCase
{
    #[Test]
    public function id19_sistema_com_solucao_unica_pela_regra_de_cramer(): void
    {
        $coeficientes = [[2, 1], [1, -1]];
        $termos = [5, 1];

        $solucao = $this->algebra->resolverSistema($coeficientes, $termos);

        $this->assertEqualsWithDelta(2, $solucao[0], self::DELTA);
        $this->assertEqualsWithDelta(1, $solucao[1], self::DELTA);
    }

    #[Test]
    public function id20_sistema_impossivel(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Sistema impossível: não há solução');

        $this->algebra->resolverSistema([[1, 1], [1, 1]], [2, 5]);
    }

    #[Test]
    public function id21_sistema_indeterminado(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Sistema indeterminado: infinitas soluções');

        $this->algebra->resolverSistema([[1, 1], [2, 2]], [2, 4]);
    }
}
