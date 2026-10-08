<?php

declare(strict_types=1);

namespace Model;

use InvalidArgumentException;

class AlgebraLinear
{
    public const TOLERANCIA = 0.0001;

    private const EPSILON = 1e-9;

    public const SISTEMA_DETERMINADO = 'SPD';
    public const SISTEMA_INDETERMINADO = 'SPI';
    public const SISTEMA_IMPOSSIVEL = 'SI';

    public function somar(array $matrizA, array $matrizB): array
    {
        $a = $this->normalizar($matrizA);
        $b = $this->normalizar($matrizB);

        if (!$this->mesmaDimensao($a, $b)) {
            throw new InvalidArgumentException('Dimensões incompatíveis para soma de matrizes');
        }

        return $this->combinar($a, $b, fn ($x, $y) => $x + $y);
    }

    public function subtrair(array $matrizA, array $matrizB): array
    {
        $a = $this->normalizar($matrizA);
        $b = $this->normalizar($matrizB);

        if (!$this->mesmaDimensao($a, $b)) {
            throw new InvalidArgumentException('Dimensões incompatíveis para subtração de matrizes');
        }

        return $this->combinar($a, $b, fn ($x, $y) => $x - $y);
    }

    public function multiplicar(array $matrizA, array $matrizB): array
    {
        $a = $this->normalizar($matrizA);
        $b = $this->normalizar($matrizB);

        if (count($a[0]) !== count($b)) {
            throw new InvalidArgumentException(
                'Número de colunas da primeira matriz deve ser igual ao número de linhas da segunda'
            );
        }

        $linhas = count($a);
        $colunas = count($b[0]);
        $comum = count($b);
        $resultado = [];

        for ($i = 0; $i < $linhas; $i++) {
            for ($j = 0; $j < $colunas; $j++) {
                $soma = 0;
                for ($k = 0; $k < $comum; $k++) {
                    $soma += $a[$i][$k] * $b[$k][$j];
                }
                $resultado[$i][$j] = $soma;
            }
        }

        return $resultado;
    }

    public function transpor(array $matriz): array
    {
        $m = $this->normalizar($matriz);
        $resultado = [];

        foreach ($m as $i => $linha) {
            foreach ($linha as $j => $valor) {
                $resultado[$j][$i] = $valor;
            }
        }

        return $resultado;
    }

    public function determinante(array $matriz): float
    {
        return $this->calcularDeterminante($this->normalizarQuadrada($matriz));
    }

    private function calcularDeterminante(array $m): float
    {
        $n = count($m);

        if ($n === 1) {
            return (float) $m[0][0];
        }

        if ($n === 2) {
            return (float) ($m[0][0] * $m[1][1] - $m[0][1] * $m[1][0]);
        }

        if ($n === 3) {
            return (float) (
                $m[0][0] * $m[1][1] * $m[2][2]
                + $m[0][1] * $m[1][2] * $m[2][0]
                + $m[0][2] * $m[1][0] * $m[2][1]
                - $m[0][2] * $m[1][1] * $m[2][0]
                - $m[0][0] * $m[1][2] * $m[2][1]
                - $m[0][1] * $m[1][0] * $m[2][2]
            );
        }

        $determinante = 0.0;
        for ($coluna = 0; $coluna < $n; $coluna++) {
            $sinal = ($coluna % 2 === 0) ? 1 : -1;
            $determinante += $sinal
                * $m[0][$coluna]
                * $this->calcularDeterminante($this->menorComplementar($m, 0, $coluna));
        }

        return $determinante;
    }

    private function menorComplementar(array $m, int $linhaRemovida, int $colunaRemovida): array
    {
        $menor = [];

        foreach ($m as $i => $linha) {
            if ($i === $linhaRemovida) {
                continue;
            }
            $novaLinha = [];
            foreach ($linha as $j => $valor) {
                if ($j !== $colunaRemovida) {
                    $novaLinha[] = $valor;
                }
            }
            $menor[] = $novaLinha;
        }

        return $menor;
    }

    public function inversa(array $matriz): array
    {
        $m = $this->normalizarQuadrada($matriz);
        $determinante = $this->calcularDeterminante($m);

        if ($this->ehZero($determinante, $this->escalaDeterminante($m))) {
            throw new InvalidArgumentException('Matriz singular: não possui inversa');
        }

        $n = count($m);

        if ($n === 1) {
            return [[1 / $m[0][0] + 0.0]];
        }

        $inversa = [];
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $sinal = (($i + $j) % 2 === 0) ? 1 : -1;
                $cofator = $sinal * $this->calcularDeterminante($this->menorComplementar($m, $i, $j));
                $inversa[$j][$i] = $cofator / $determinante + 0.0;
            }
        }

        return $inversa;
    }

    public function resolverSistema(array $matriz, array $termosIndependentes): array
    {
        $m = $this->normalizarQuadrada($matriz);
        $termos = $this->normalizarTermos($termosIndependentes, count($m));

        $tipo = $this->classificarNormalizado($m, $termos);

        if ($tipo === self::SISTEMA_IMPOSSIVEL) {
            throw new InvalidArgumentException('Sistema impossível: não há solução');
        }

        if ($tipo === self::SISTEMA_INDETERMINADO) {
            throw new InvalidArgumentException('Sistema indeterminado: infinitas soluções');
        }

        $n = count($m);
        $principal = $this->calcularDeterminante($m);
        $solucao = [];

        for ($coluna = 0; $coluna < $n; $coluna++) {
            $cramer = $m;
            for ($linha = 0; $linha < $n; $linha++) {
                $cramer[$linha][$coluna] = $termos[$linha];
            }
            $solucao[] = $this->calcularDeterminante($cramer) / $principal + 0.0;
        }

        return $solucao;
    }

    public function classificarSistema(array $matriz, array $termosIndependentes): string
    {
        $m = $this->normalizarQuadrada($matriz);
        $termos = $this->normalizarTermos($termosIndependentes, count($m));

        return $this->classificarNormalizado($m, $termos);
    }

    private function classificarNormalizado(array $m, array $termos): string
    {
        $determinante = $this->calcularDeterminante($m);

        if (!$this->ehZero($determinante, $this->escalaDeterminante($m))) {
            return self::SISTEMA_DETERMINADO;
        }

        $aumentada = [];
        foreach ($m as $i => $linha) {
            $aumentada[$i] = [...$linha, $termos[$i]];
        }

        return $this->calcularPosto($m) === $this->calcularPosto($aumentada)
            ? self::SISTEMA_INDETERMINADO
            : self::SISTEMA_IMPOSSIVEL;
    }

    private function calcularPosto(array $m): int
    {
        $linhas = count($m);
        $colunas = count($m[0]);
        $limite = self::EPSILON * max(1.0, $this->maiorElemento($m));
        $posto = 0;

        for ($coluna = 0; $coluna < $colunas && $posto < $linhas; $coluna++) {
            $pivo = $posto;
            for ($linha = $posto + 1; $linha < $linhas; $linha++) {
                if (abs($m[$linha][$coluna]) > abs($m[$pivo][$coluna])) {
                    $pivo = $linha;
                }
            }

            if (abs($m[$pivo][$coluna]) <= $limite) {
                continue;
            }

            [$m[$posto], $m[$pivo]] = [$m[$pivo], $m[$posto]];

            for ($linha = $posto + 1; $linha < $linhas; $linha++) {
                $fator = $m[$linha][$coluna] / $m[$posto][$coluna];
                for ($j = $coluna; $j < $colunas; $j++) {
                    $m[$linha][$j] -= $fator * $m[$posto][$j];
                }
            }

            $posto++;
        }

        return $posto;
    }

    private function escalaDeterminante(array $m): float
    {
        $escala = 1.0;
        foreach ($m as $linha) {
            $escala *= sqrt(array_sum(array_map(fn ($v) => $v * $v, $linha)));
        }

        return $escala;
    }

    private function ehZero(float $valor, float $escala): bool
    {
        return abs($valor) <= self::EPSILON * $escala;
    }

    private function maiorElemento(array $m): float
    {
        $maior = 0.0;
        foreach ($m as $linha) {
            foreach ($linha as $v) {
                $maior = max($maior, abs($v));
            }
        }

        return $maior;
    }

    private function mesmaDimensao(array $a, array $b): bool
    {
        return count($a) === count($b) && count($a[0]) === count($b[0]);
    }

    private function combinar(array $a, array $b, callable $operacao): array
    {
        $resultado = [];
        foreach ($a as $i => $linha) {
            foreach ($linha as $j => $valor) {
                $resultado[$i][$j] = $operacao($valor, $b[$i][$j]);
            }
        }

        return $resultado;
    }

    private function normalizar(array $matriz): array
    {
        if ($matriz === []) {
            throw new InvalidArgumentException('A matriz não pode ser vazia');
        }

        $linhas = array_values($matriz);

        if (!is_array($linhas[0])) {
            throw new InvalidArgumentException('Matriz inválida');
        }

        $colunas = count($linhas[0]);

        if ($colunas === 0) {
            throw new InvalidArgumentException('A matriz não pode ser vazia');
        }

        $normalizada = [];

        foreach ($linhas as $linha) {
            if (!is_array($linha)) {
                throw new InvalidArgumentException('Matriz inválida');
            }

            if (count($linha) !== $colunas) {
                throw new InvalidArgumentException(
                    'Todas as linhas da matriz devem possuir a mesma quantidade de colunas'
                );
            }

            $novaLinha = [];
            foreach ($linha as $valor) {
                if (!is_numeric($valor)) {
                    throw new InvalidArgumentException('Todos os elementos da matriz devem ser numéricos');
                }
                $novaLinha[] = $valor + 0;
            }
            $normalizada[] = $novaLinha;
        }

        return $normalizada;
    }

    private function normalizarQuadrada(array $matriz): array
    {
        $m = $this->normalizar($matriz);

        if (count($m) !== count($m[0])) {
            throw new InvalidArgumentException('A matriz deve ser quadrada');
        }

        return $m;
    }

    private function normalizarTermos(array $termos, int $ordem): array
    {
        if (count($termos) !== $ordem) {
            throw new InvalidArgumentException(
                'A quantidade de termos independentes deve ser igual ao número de equações'
            );
        }

        $normalizados = [];
        foreach (array_values($termos) as $valor) {
            if (!is_numeric($valor)) {
                throw new InvalidArgumentException('Todos os termos independentes devem ser numéricos');
            }
            $normalizados[] = (float) $valor;
        }

        return $normalizados;
    }
}
