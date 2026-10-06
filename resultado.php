<?php

$pageTitle = "Álgebra Linear | Resultado";

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

    <link
        rel="stylesheet"
        href="templates/css/global.css"
    >

    <link
        rel="stylesheet"
        href="templates/css/resultado.css"
        href="templates/css/global.css"
    >

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
        href="index.php"
        class="header-button"
    >
        Início
    </a>

</header>


<main class="page">

    <section class="result-hero">

        <span class="eyebrow">
            RESULTADO
        </span>

        <h1>
            Resultado da operação.
        </h1>

        <p>

            Nesta área será apresentado o resultado produzido
            pelo algoritmo PHP.

        </p>

    </section>


    <section class="result-layout">


        <div class="result-card">

            <div class="result-header">

                <div>

                    <span class="step">
                        SAÍDA
                    </span>

                    <h2>
                        Resultado calculado
                    </h2>

                </div>


                <span class="result-status">
                    Aguardando cálculo
                </span>

            </div>


            <div class="result-display">

                <div class="result-matrix">

                    <span>—</span>
                    <span>—</span>

                    <span>—</span>
                    <span>—</span>

                </div>


                <p>

                    O algoritmo será responsável por substituir
                    esta área pelo resultado real.

                </p>

            </div>

        </div>


        <aside class="summary-card">

            <span class="eyebrow">
                RESUMO
            </span>

            <h2>
                Informações
            </h2>


            <div class="summary">

                <div>

                    <span>
                        Operação
                    </span>

                    <strong>
                        —
                    </strong>

                </div>


                <div>

                    <span>
                        Entrada
                    </span>

                    <strong>
                        —
                    </strong>

                </div>


                <div>

                    <span>
                        Resultado
                    </span>

                    <strong>
                        —
                    </strong>

                </div>


                <div>

                    <span>
                        Status
                    </span>

                    <strong class="waiting">
                        Aguardando
                    </strong>

                </div>

            </div>


            <a
                href="matrizes.php"
                class="button primary full"
            >
                Nova operação
            </a>


            <a
                href="sistemas.php"
                class="button outline full"
            >
                Resolver sistema
            </a>

        </aside>

    </section>


    <section class="precision">

        <div class="precision-icon">
            ≈
        </div>

        <div>

            <span class="eyebrow">
                PRECISÃO NUMÉRICA
            </span>

            <h2>
                Comparações com tolerância.
            </h2>

            <p>

                Os testes de números de ponto flutuante utilizarão
                uma margem de erro de <strong>0,0001</strong>,
                conforme definido no planejamento de testes.

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
            Resultado dos algoritmos
        </span>

    </div>

</footer>

</body>

</html>