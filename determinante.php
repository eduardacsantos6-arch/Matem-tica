<?php

$pageTitle = "Álgebra Linear | Determinante";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= $pageTitle ?></title>

<link rel="stylesheet" href="templates/css/global.css">
<link rel="stylesheet" href="templates/css/determinante.css">

</head>

<body>

<header class="header">

    <a href="index.php" class="logo">

        <span class="logo-symbol">
            λ
        </span>

        <span class="logo-text">

            <strong>
                Álgebra Linear
            </strong>

            <small>
                Matemática • Lógica • PHP
            </small>

        </span>

    </a>


    <nav class="nav">

        <a href="index.php">
            Início
        </a>

        <a href="matrizes.php">
            Matrizes
        </a>

        <a
            href="determinante.php"
            class="active"
        >
            Determinante
        </a>

        <a href="inversa.php">
            Inversa
        </a>

        <a href="sistemas.php">
            Sistemas
        </a>

    </nav>


    <a
        href="inversa.php"
        class="header-button"
    >
        Próximo →
    </a>

</header>


<main class="page">

    <section class="page-hero">

        <div>

            <span class="eyebrow">
                MÓDULO 02
            </span>

            <h1>
                Cálculo de determinantes.
            </h1>

            <p>

                Calcule o determinante de matrizes de ordem 1,
                2 e 3 utilizando os métodos definidos no projeto.

            </p>

        </div>


        <div class="det-symbol">
            det(A)
        </div>

    </section>


    <section class="det-content">


        <div class="det-form card">

            <span class="step">
                01
            </span>

            <h2>
                Informe a matriz
            </h2>

            <p>
                Escolha a ordem da matriz que será analisada.
            </p>


            <form
                action="resultado.php"
                method="post"
            >

                <input
                    type="hidden"
                    name="tipo"
                    value="determinante"
                >


                <label for="ordem">
                    Ordem da matriz
                </label>

                <select
                    id="ordem"
                    name="ordem"
                >

                    <option value="1">
                        1 × 1
                    </option>

                    <option value="2">
                        2 × 2
                    </option>

                    <option value="3" selected>
                        3 × 3
                    </option>

                </select>


                <div class="matrix-box">

                    <span class="bracket">
                        [
                    </span>


                    <div class="matrix">

                        <input
                            type="number"
                            name="a11"
                            placeholder="a"
                            step="any"
                        >

                        <input
                            type="number"
                            name="a12"
                            placeholder="b"
                            step="any"
                        >

                        <input
                            type="number"
                            name="a13"
                            placeholder="c"
                            step="any"
                        >


                        <input
                            type="number"
                            name="a21"
                            placeholder="d"
                            step="any"
                        >

                        <input
                            type="number"
                            name="a22"
                            placeholder="e"
                            step="any"
                        >

                        <input
                            type="number"
                            name="a23"
                            placeholder="f"
                            step="any"
                        >


                        <input
                            type="number"
                            name="a31"
                            placeholder="g"
                            step="any"
                        >

                        <input
                            type="number"
                            name="a32"
                            placeholder="h"
                            step="any"
                        >

                        <input
                            type="number"
                            name="a33"
                            placeholder="i"
                            step="any"
                        >

                    </div>


                    <span class="bracket">
                        ]
                    </span>

                </div>


                <button
                    type="submit"
                    class="button primary full"
                >
                    Calcular determinante →
                </button>

            </form>

        </div>


        <div class="methods card">

            <span class="eyebrow">
                MÉTODOS MATEMÁTICOS
            </span>

            <h2>
                Como o determinante será calculado?
            </h2>


            <div class="method">

                <span>
                    01
                </span>

                <div>

                    <strong>
                        Ordem 1
                    </strong>

                    <p>
                        Cálculo direto do único elemento.
                    </p>

                </div>

            </div>


            <div class="method">

                <span>
                    02
                </span>

                <div>

                    <strong>
                        Ordem 2
                    </strong>

                    <p>
                        Fórmula ad − bc.
                    </p>

                </div>

            </div>


            <div class="method">

                <span>
                    03
                </span>

                <div>

                    <strong>
                        Ordem 3
                    </strong>

                    <p>
                        Regra de Sarrus.
                    </p>

                </div>

            </div>


            <div class="method">

                <span>
                    04
                </span>

                <div>

                    <strong>
                        Ordem maior
                    </strong>

                    <p>
                        Expansão de Laplace por cofatores.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <section class="test-section">

        <div>

            <span class="eyebrow">
                CASOS DE TESTE
            </span>

            <h2>
                Situações que serão verificadas.
            </h2>

        </div>


        <div class="test-items">

            <span>
                ✓ Matriz 1×1
            </span>

            <span>
                ✓ Matriz identidade
            </span>

            <span>
                ✓ Matriz nula
            </span>

            <span>
                ✓ Matriz 2×2
            </span>

            <span>
                ✓ Matriz 3×3
            </span>

        </div>

    </section>

</main>


<footer class="footer">

    <div class="footer-content">

        <div>

            <strong>
                λ Álgebra Linear
            </strong>

            <p>
                Projeto de Integração Matemática — 2026.
            </p>

        </div>


        <div class="footer-students">

            <span>
                ESCOLA SESI MILTON SANTOS
            </span>

            <span>
                SENAI CAMAÇARI
            </span>

            <span>
                Lucas Augusto • Eduarda Cardoso
            </span>

        </div>

    </div>


    <div class="footer-bottom">

        <span>
            PHP + PHPUnit
        </span>

        <span>
            Determinantes
        </span>

    </div>

</footer>

</body>
</html>