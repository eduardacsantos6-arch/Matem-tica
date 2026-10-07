<?php

$pageTitle = "Álgebra Linear | Matriz Inversa";

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

<link rel="stylesheet" href="../templates/css/global.css">
<link rel="stylesheet" href="../templates/css/inversa.css">

</head>

<body>

<header class="header">

     <a href="../index.php" class="logo">

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

        <a href="../index.php">
            Início
        </a>

        <a href="matrizes.php">
            Matrizes
        </a>

        <a href="determinante.php">
            Determinante
        </a>

        <a
            href="inversa.php"
            class="active"
        >
            Inversa
        </a>

        <a href="sistemas.php">
            Sistemas
        </a>

    </nav>


    <a
        href="sistemas.php"
        class="header-button"
    >
        Sistemas →
    </a>

</header>


<main class="page">

    <section class="page-hero">

        <div>

            <span class="eyebrow">
                MÓDULO 03
            </span>

            <h1>
                Matriz inversa.
            </h1>

            <p>

                Encontre a matriz inversa quando ela existir
                e identifique automaticamente matrizes singulares.

            </p>

        </div>


        <div class="inverse-symbol">
            A⁻¹
        </div>

    </section>


    <section class="inverse-content">


        <div class="inverse-form card">

            <span class="step">
                01
            </span>

            <h2>
                Informe a matriz
            </h2>

            <p>
                A matriz precisa ser quadrada.
            </p>


            <form
                action="resultado.php"
                method="post"
            >

                <input
                    type="hidden"
                    name="tipo"
                    value="inversa"
                >


                <label for="ordem">
                    Ordem
                </label>

                <select
                    id="ordem"
                    name="ordem"
                >

                    <option value="2">
                        2 × 2
                    </option>

                    <option value="3">
                        3 × 3
                    </option>

                </select>


                <div class="matrix-area">

                    <span class="bracket">
                        [
                    </span>


                    <div class="matrix">

                        <input
                            type="number"
                            name="a11"
                            placeholder="0"
                            step="any"
                        >

                        <input
                            type="number"
                            name="a12"
                            placeholder="0"
                            step="any"
                        >


                        <input
                            type="number"
                            name="a21"
                            placeholder="0"
                            step="any"
                        >

                        <input
                            type="number"
                            name="a22"
                            placeholder="0"
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
                    Calcular inversa →
                </button>

            </form>

        </div>


        <div class="explanation card">

            <span class="eyebrow">
                MÉTODO ADOTADO
            </span>

            <h2>
                Matriz adjunta
            </h2>

            <div class="formula">
                A⁻¹ = adj(A) / det(A)
            </div>


            <p>

                O algoritmo realizará previamente o cálculo
                do determinante para verificar se a matriz
                possui inversa.

            </p>


            <div class="condition">

                <span>
                    det(A) ≠ 0
                </span>

                <small>
                    Matriz não singular
                </small>

            </div>


            <div class="condition danger">

                <span>
                    det(A) = 0
                </span>

                <small>
                    Matriz singular — não possui inversa
                </small>

            </div>

        </div>

    </section>


    <section class="test-section">

        <span class="eyebrow">
            TESTES PLANEJADOS
        </span>

        <h2>
            O algoritmo também será testado nos extremos.
        </h2>


        <div class="test-grid">

            <div>

                <strong>
                    Caso válido
                </strong>

                <span>
                    A = [[1,2],[3,4]]
                </span>

            </div>


            <div>

                <strong>
                    Matriz singular
                </strong>

                <span>
                    det(A) = 0
                </span>

            </div>


            <div>

                <strong>
                    Matriz identidade
                </strong>

                <span>
                    I⁻¹ = I
                </span>

            </div>

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
            Matriz inversa
        </span>

    </div>

</footer>

</body>

</html>