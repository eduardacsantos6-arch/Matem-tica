<?php

namespace Model;

class AlgebraLinear
{
    private const TOLERANCIA = 0.0001;


    /*
    |--------------------------------------------------------------------------
    | SOMA DE MATRIZES
    |--------------------------------------------------------------------------
    */

    public function somar(array $matrizA, array $matrizB): array
    {
        $this->validarMatriz($matrizA);
        $this->validarMatriz($matrizB);

        $linhasA = count($matrizA);
        $colunasA = count($matrizA[0]);

        $linhasB = count($matrizB);
        $colunasB = count($matrizB[0]);

        if (
            $linhasA !== $linhasB ||
            $colunasA !== $colunasB
        ) {
            throw new \InvalidArgumentException(
                "Dimensões incompatíveis para soma de matrizes"
            );
        }

        $resultado = [];

        for ($i = 0; $i < $linhasA; $i++) {

            for ($j = 0; $j < $colunasA; $j++) {

                $resultado[$i][$j] =
                    $matrizA[$i][$j] +
                    $matrizB[$i][$j];
            }
        }

        return $resultado;
    }


    /*
    |--------------------------------------------------------------------------
    | SUBTRAÇÃO DE MATRIZES
    |--------------------------------------------------------------------------
    */

    public function subtrair(array $matrizA, array $matrizB): array
    {
        $this->validarMatriz($matrizA);
        $this->validarMatriz($matrizB);

        $linhasA = count($matrizA);
        $colunasA = count($matrizA[0]);

        $linhasB = count($matrizB);
        $colunasB = count($matrizB[0]);

        if (
            $linhasA !== $linhasB ||
            $colunasA !== $colunasB
        ) {
            throw new \InvalidArgumentException(
                "Dimensões incompatíveis para subtração de matrizes"
            );
        }

        $resultado = [];

        for ($i = 0; $i < $linhasA; $i++) {

            for ($j = 0; $j < $colunasA; $j++) {

                $resultado[$i][$j] =
                    $matrizA[$i][$j] -
                    $matrizB[$i][$j];
            }
        }

        return $resultado;
    }


    /*
    |--------------------------------------------------------------------------
    | MULTIPLICAÇÃO DE MATRIZES
    |--------------------------------------------------------------------------
    */

    public function multiplicar(array $matrizA, array $matrizB): array
    {
        $this->validarMatriz($matrizA);
        $this->validarMatriz($matrizB);

        $linhasA = count($matrizA);
        $colunasA = count($matrizA[0]);

        $linhasB = count($matrizB);
        $colunasB = count($matrizB[0]);

        if ($colunasA !== $linhasB) {
            throw new \InvalidArgumentException(
                "Número de colunas da primeira matriz deve ser igual ao número de linhas da segunda"
            );
        }

        $resultado = [];

        for ($i = 0; $i < $linhasA; $i++) {

            for ($j = 0; $j < $colunasB; $j++) {

                $resultado[$i][$j] = 0;

                for ($k = 0; $k < $colunasA; $k++) {

                    $resultado[$i][$j] +=
                        $matrizA[$i][$k] *
                        $matrizB[$k][$j];
                }
            }
        }

        return $resultado;
    }


    /*
    |--------------------------------------------------------------------------
    | TRANSPOSIÇÃO
    |--------------------------------------------------------------------------
    */

    public function transpor(array $matriz): array
    {
        $this->validarMatriz($matriz);

        $linhas = count($matriz);
        $colunas = count($matriz[0]);

        $resultado = [];

        for ($j = 0; $j < $colunas; $j++) {

            for ($i = 0; $i < $linhas; $i++) {

                $resultado[$j][$i] =
                    $matriz[$i][$j];
            }
        }

        return $resultado;
    }


    /*
    |--------------------------------------------------------------------------
    | DETERMINANTE
    |--------------------------------------------------------------------------
    */

    public function determinante(array $matriz): float
    {
        $this->validarMatrizQuadrada($matriz);

        $ordem = count($matriz);

        // Matriz 1x1
        if ($ordem === 1) {
            return (float) $matriz[0][0];
        }

        // Matriz 2x2
        if ($ordem === 2) {

            return (float) (
                ($matriz[0][0] * $matriz[1][1])
                -
                ($matriz[0][1] * $matriz[1][0])
            );
        }

        /*
         * Para matrizes maiores que 2x2,
         * usamos expansão de Laplace.
         */

        $determinante = 0.0;

        for ($coluna = 0; $coluna < $ordem; $coluna++) {

            $menor = $this->menorComplementar(
                $matriz,
                0,
                $coluna
            );

            $sinal = ($coluna % 2 === 0)
                ? 1
                : -1;

            $determinante +=
                $sinal *
                $matriz[0][$coluna] *
                $this->determinante($menor);
        }

        return (float) $determinante;
    }


    /*
    |--------------------------------------------------------------------------
    | MENOR COMPLEMENTAR
    |--------------------------------------------------------------------------
    */

    private function menorComplementar(
        array $matriz,
        int $linhaRemovida,
        int $colunaRemovida
    ): array {

        $menor = [];

        foreach ($matriz as $i => $linha) {

            if ($i === $linhaRemovida) {
                continue;
            }

            $novaLinha = [];

            foreach ($linha as $j => $valor) {

                if ($j === $colunaRemovida) {
                    continue;
                }

                $novaLinha[] = $valor;
            }

            $menor[] = $novaLinha;
        }

        return $menor;
    }


    /*
    |--------------------------------------------------------------------------
    | MATRIZ INVERSA
    |--------------------------------------------------------------------------
    */

    public function inversa(array $matriz): array
    {
        $this->validarMatrizQuadrada($matriz);

        $determinante = $this->determinante($matriz);

        if (abs($determinante) < self::TOLERANCIA) {

            throw new \InvalidArgumentException(
                "Matriz singular: não possui inversa"
            );
        }

        $ordem = count($matriz);

        // Caso 1x1
        if ($ordem === 1) {

            return [
                [
                    1 / $matriz[0][0]
                ]
            ];
        }

        /*
         * Monta a matriz aumentada:
         *
         * [ A | I ]
         */

        $aumentada = [];

        for ($i = 0; $i < $ordem; $i++) {

            for ($j = 0; $j < $ordem; $j++) {

                $aumentada[$i][$j] =
                    (float) $matriz[$i][$j];
            }

            for ($j = 0; $j < $ordem; $j++) {

                $aumentada[$i][$j + $ordem] =
                    ($i === $j) ? 1.0 : 0.0;
            }
        }


        /*
         * Gauss-Jordan
         */

        for ($coluna = 0; $coluna < $ordem; $coluna++) {

            $pivo = $coluna;

            // Procura o melhor pivô
            for (
                $linha = $coluna + 1;
                $linha < $ordem;
                $linha++
            ) {

                if (
                    abs($aumentada[$linha][$coluna])
                    >
                    abs($aumentada[$pivo][$coluna])
                ) {
                    $pivo = $linha;
                }
            }


            // Troca de linhas
            if ($pivo !== $coluna) {

                $temporaria =
                    $aumentada[$coluna];

                $aumentada[$coluna] =
                    $aumentada[$pivo];

                $aumentada[$pivo] =
                    $temporaria;
            }


            $valorPivo =
                $aumentada[$coluna][$coluna];


            if (
                abs($valorPivo)
                < self::TOLERANCIA
            ) {

                throw new \InvalidArgumentException(
                    "Matriz singular: não possui inversa"
                );
            }


            // Divide a linha pelo pivô
            for (
                $j = 0;
                $j < 2 * $ordem;
                $j++
            ) {

                $aumentada[$coluna][$j] /=
                    $valorPivo;
            }


            // Zera os outros elementos da coluna
            for (
                $linha = 0;
                $linha < $ordem;
                $linha++
            ) {

                if ($linha === $coluna) {
                    continue;
                }

                $fator =
                    $aumentada[$linha][$coluna];


                for (
                    $j = 0;
                    $j < 2 * $ordem;
                    $j++
                ) {

                    $aumentada[$linha][$j] -=
                        $fator *
                        $aumentada[$coluna][$j];
                }
            }
        }


        /*
         * Retira a parte direita da matriz aumentada.
         */

        $inversa = [];

        for ($i = 0; $i < $ordem; $i++) {

            for ($j = 0; $j < $ordem; $j++) {

                $inversa[$i][$j] =
                    $aumentada[$i][$j + $ordem];
            }
        }

        return $inversa;
    }


    /*
    |--------------------------------------------------------------------------
    | SISTEMAS LINEARES
    |--------------------------------------------------------------------------
    |
    | Resolve sistemas:
    |
    | A · X = B
    |
    | Para sistemas determinados, usamos a Regra de Cramer.
    |
    | Se o determinante for zero, analisamos os postos
    | para identificar sistema impossível ou indeterminado.
    |
    */

    public function resolverSistema(
        array $matriz,
        array $termosIndependentes
    ): array {

        $this->validarMatrizQuadrada($matriz);

        $ordem = count($matriz);


        /*
         * Verifica se a quantidade de termos independentes
         * corresponde ao número de equações.
         */

        if (count($termosIndependentes) !== $ordem) {

            throw new \InvalidArgumentException(
                "A quantidade de termos independentes deve ser igual ao número de equações"
            );
        }


        /*
         * Converte os termos para números.
         */

        $termos = [];

        foreach ($termosIndependentes as $valor) {
            $termos[] = (float) $valor;
        }


        $determinantePrincipal =
            $this->determinante($matriz);


        /*
         * SISTEMA DETERMINADO
         *
         * det(A) != 0
         *
         * Existe uma única solução.
         */

        if (
            abs($determinantePrincipal)
            >= self::TOLERANCIA
        ) {

            $solucoes = [];

            for ($coluna = 0; $coluna < $ordem; $coluna++) {

                $matrizCramer = $matriz;

                /*
                 * Substitui a coluna atual pelos
                 * termos independentes.
                 */

                for ($linha = 0; $linha < $ordem; $linha++) {

                    $matrizCramer[$linha][$coluna] =
                        $termos[$linha];
                }

                $determinanteColuna =
                    $this->determinante($matrizCramer);

                $solucoes[] =
                    $determinanteColuna /
                    $determinantePrincipal;
            }

            return $solucoes;
        }


        /*
         * SISTEMA COM DETERMINANTE ZERO
         *
         * Agora precisamos descobrir se ele é:
         *
         * - impossível
         * - indeterminado
         */


        $matrizAumentada = [];

        for ($i = 0; $i < $ordem; $i++) {

            $matrizAumentada[$i] =
                $matriz[$i];

            $matrizAumentada[$i][] =
                $termos[$i];
        }


        $postoMatriz =
            $this->calcularPosto($matriz);

        $postoAumentada =
            $this->calcularPosto($matrizAumentada);


        /*
         * Se os postos forem diferentes:
         *
         * sistema impossível.
         */

        if ($postoMatriz !== $postoAumentada) {

            throw new \InvalidArgumentException(
                "Sistema impossível: não há solução"
            );
        }


        /*
         * Se os postos forem iguais, mas menores
         * que o número de incógnitas:
         *
         * sistema indeterminado.
         */

        throw new \InvalidArgumentException(
            "Sistema indeterminado: infinitas soluções"
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CÁLCULO DO POSTO DE UMA MATRIZ
    |--------------------------------------------------------------------------
    */

    private function calcularPosto(array $matriz): int
    {
        $linhas = count($matriz);
        $colunas = count($matriz[0]);

        $matriz = $matriz;

        $posto = 0;
        $linhaAtual = 0;


        for (
            $coluna = 0;
            $coluna < $colunas &&
            $linhaAtual < $linhas;
            $coluna++
        ) {

            /*
             * Procura uma linha com pivô
             * diferente de zero.
             */

            $pivo = $linhaAtual;

            for (
                $linha = $linhaAtual + 1;
                $linha < $linhas;
                $linha++
            ) {

                if (
                    abs($matriz[$linha][$coluna])
                    >
                    abs($matriz[$pivo][$coluna])
                ) {

                    $pivo = $linha;
                }
            }


            /*
             * Se o pivô for praticamente zero,
             * não existe pivô nessa coluna.
             */

            if (
                abs($matriz[$pivo][$coluna])
                < self::TOLERANCIA
            ) {

                continue;
            }


            /*
             * Troca de linhas.
             */

            if ($pivo !== $linhaAtual) {

                $temporaria =
                    $matriz[$linhaAtual];

                $matriz[$linhaAtual] =
                    $matriz[$pivo];

                $matriz[$pivo] =
                    $temporaria;
            }


            /*
             * Eliminação abaixo do pivô.
             */

            for (
                $linha = $linhaAtual + 1;
                $linha < $linhas;
                $linha++
            ) {

                $fator =
                    $matriz[$linha][$coluna]
                    /
                    $matriz[$linhaAtual][$coluna];


                for (
                    $j = $coluna;
                    $j < $colunas;
                    $j++
                ) {

                    $matriz[$linha][$j] -=
                        $fator *
                        $matriz[$linhaAtual][$j];
                }
            }


            $linhaAtual++;
            $posto++;
        }


        return $posto;
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDAÇÃO DE MATRIZ
    |--------------------------------------------------------------------------
    */

    private function validarMatriz(array $matriz): void
    {
        if (empty($matriz)) {

            throw new \InvalidArgumentException(
                "A matriz não pode ser vazia"
            );
        }


        if (!isset($matriz[0]) || !is_array($matriz[0])) {

            throw new \InvalidArgumentException(
                "Matriz inválida"
            );
        }


        $colunas = count($matriz[0]);

        if ($colunas === 0) {

            throw new \InvalidArgumentException(
                "A matriz não pode ser vazia"
            );
        }


        foreach ($matriz as $linha) {

            if (!is_array($linha)) {

                throw new \InvalidArgumentException(
                    "Matriz inválida"
                );
            }


            if (count($linha) !== $colunas) {

                throw new \InvalidArgumentException(
                    "Todas as linhas da matriz devem possuir a mesma quantidade de colunas"
                );
            }


            foreach ($linha as $valor) {

                if (!is_numeric($valor)) {

                    throw new \InvalidArgumentException(
                        "Todos os elementos da matriz devem ser numéricos"
                    );
                }
            }
        }
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDAÇÃO DE MATRIZ QUADRADA
    |--------------------------------------------------------------------------
    */

    private function validarMatrizQuadrada(array $matriz): void
    {
        $this->validarMatriz($matriz);

        $linhas = count($matriz);
        $colunas = count($matriz[0]);

        if ($linhas !== $colunas) {

            throw new \InvalidArgumentException(
                "A matriz deve ser quadrada"
            );
        }
    }
}