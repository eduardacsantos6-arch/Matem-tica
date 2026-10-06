<?php

$pageTitle = "Álgebra Linear | Matrizes";

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
<link rel="stylesheet" href="templates/css/matrizes.css">

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

        <a
            href="matrizes.php"
            class="active"
        >
            Matrizes
        </a>

        <a href="determinante.php">
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
                MÓDULO 01
            </span>

            <h1>
                Operações com matrizes.
            </h1>

            <p>

                Realize soma, subtração, multiplicação
                e transposição de matrizes.

            </p>

        </div>


        <div class="symbol-box">
            A + B
        </div>

    </section>


    <section class="operation-area">


        <div class="operation-card">

            <span class="step">
                01
            </span>

            <h2>
                Escolha a operação
            </h2>

            <p>
                Selecione o algoritmo que deseja executar.
            </p>


            <form
                action="matrizes.php"
                method="post"
            >

                <label for="operacao">
                    Operação
                </label>

                <select
                    id="operacao"
                    name="operacao"
                >

                    <option value="soma">
                        Soma de matrizes
                    </option>

                    <option value="subtracao">
                        Subtração de matrizes
                    </option>

                    <option value="multiplicacao">
                        Multiplicação de matrizes
                    </option>

                    <option value="transposta">
                        Transposição de matriz
                    </option>

                </select>


                <div class="dimensions">

                    <div>

                        <label for="linhas">
                            Linhas
                        </label>

                        <input
                            type="number"
                            id="linhas"
                            name="linhas"
                            value="2"
                            min="1"
                            max="10"
                        >

                    </div>


                    <div>

                        <label for="colunas">
                            Colunas
                        </label>

                        <input
                            type="number"
                            id="colunas"
                            name="colunas"
                            value="2"
                            min="1"
                            max="10"
                        >

                    </div>

                </div>


                <button
                    type="submit"
                    class="button primary full"
                >
                    Preparar matriz →
                </button>

            </form>

        </div>


        <div class="matrix-card">

            <div class="card-header">

                <div>

                    <span class="step">
                        02
                    </span>

                    <h2>
                        Entrada da matriz
                    </h2>

                </div>

                <span class="tag">
                    2 × 2
                </span>

            </div>


            <form
                action="resultado.php"
                method="post"
            >

                <input
                    type="hidden"
                    name="tipo"
                    value="matriz"
                >


                <div class="matrix-wrapper">

                    <span class="bracket">
                        [
                    </span>


                    <div class="matrix-input">

                        <input
                            type="number"
                            name="matriz[0][0]"
                            placeholder="0"
                            step="any"
                        >

                        <input
                            type="number"
                            name="matriz[0][1]"
                            placeholder="0"
                            step="any"
                        >

                        <input
                            type="number"
                            name="matriz[1][0]"
                            placeholder="0"
                            step="any"
                        >

                        <input
                            type="number"
                            name="matriz[1][1]"
                            placeholder="0"
                            step="any"
                        >

                    </div>


                    <span class="bracket">
                        ]
                    </span>

                </div>


                <p class="notice">

                    A quantidade de campos será adaptada pelo
                    algoritmo quando o backend for conectado.

                </p>


                <button
                    type="submit"
                    class="button secondary"
                >
                    Executar operação
                </button>

            </form>

        </div>

    </section>


    <section class="operations-list">

        <div class="section-title">

            <span class="eyebrow">
                ALGORITMOS
            </span>

            <h2>
                Operações disponíveis
            </h2>

        </div>


        <div class="operation-grid">

            <article>

                <span>
                    01
                </span>

                <h3>
                    Soma
                </h3>

                <p>
                    A + B
                </p>

            </article>


            <article>

                <span>
                    02
                </span>

                <h3>
                    Subtração
                </h3>

                <p>
                    A − B
                </p>

            </article>


            <article>

                <span>
                    03
                </span>

                <h3>
                    Multiplicação
                </h3>

                <p>
                    A × B
                </p>

            </article>


            <article>

                <span>
                    04
                </span>

                <h3>
                    Transposição
                </h3>

                <p>
                    Aᵀ
                </p>

            </article>

        </div>

    </section>


    <section class="test-note">

        <div class="test-icon">
            ✓
        </div>

        <div>

            <span class="eyebrow">
                TESTES UNITÁRIOS
            </span>

            <h2>
                Os casos de borda também serão verificados.
            </h2>

            <p>

                O planejamento inclui matrizes nulas, matriz identidade,
                matriz 1×1 e dimensões incompatíveis.

            </p>

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
            Operações matriciais
        </span>

    </div>

</footer>

</body>

</html>