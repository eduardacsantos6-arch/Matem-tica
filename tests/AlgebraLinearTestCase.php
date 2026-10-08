<?php

declare(strict_types=1);

namespace Tests;

use Model\AlgebraLinear;
use PHPUnit\Framework\TestCase;

abstract class AlgebraLinearTestCase extends TestCase
{
    protected const DELTA = AlgebraLinear::TOLERANCIA;

    protected AlgebraLinear $algebra;

    protected array $identidade2;

    protected array $nula2;

    protected function setUp(): void
    {
        $this->algebra = new AlgebraLinear();
        $this->identidade2 = [[1, 0], [0, 1]];
        $this->nula2 = [[0, 0], [0, 0]];
    }

    protected function tearDown(): void
    {
        unset($this->algebra, $this->identidade2, $this->nula2);
    }

    protected function assertMatrizIgual(array $esperada, array $atual, string $mensagem = ''): void
    {
        $this->assertCount(count($esperada), $atual, $mensagem . ' (número de linhas)');

        foreach ($esperada as $i => $linha) {
            $this->assertCount(count($linha), $atual[$i], $mensagem . " (colunas da linha $i)");

            foreach ($linha as $j => $valor) {
                $this->assertEqualsWithDelta(
                    $valor,
                    $atual[$i][$j],
                    self::DELTA,
                    $mensagem . " (posição [$i][$j])"
                );
            }
        }
    }
}
