<?php

$pageTitle = "Álgebra Linear | Sistemas Lineares";

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
<link rel="stylesheet" href="../templates/css/sistemas.css">

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

        <a href="inversa.php">
            Inversa
        </a>

        <a
            href="sistemas.php"
            class="active"
        >
            Sistemas
        </a>

    </nav>


    <a
        href="resultado.php"
        class="header-button"
    >
        Resultados →
    </a>

</header>


<main class="page">

    <section class="page-hero">

        <div>

            <span class="eyebrow">
                MÓDULO 04
            </span>

            <h1>
                Sistemas lineares.
            </h1>

            <p>

                Resolva sistemas utilizando a Regra de Cramer
                e classifique o tipo de solução encontrado.

            </p>

        </div>


        <div class="system-symbol">

            <span>
                ax + by = c
            </span>

            <span>
                dx + ey = f
            </span>

        </div>

    </section>


    <section class="system-content">


        <div class="system-form card">

            <span class="step">
                01
            </span>

            <h2>
                Monte o sistema
            </h2>

            <p>
                Informe os coeficientes das equações.
            </p>


            <form
                action="resultado.php"
                method="post"
            >

                <input
                    type="hidden"
                    name="tipo"
                    value="sistema"
                >


                <div class="equation">

                    <input
                        type="number"
                        name="a"
                        placeholder="a"
                        step="any"
                    >

                    <span>
                        x +
                    </span>

                    <input
                        type="number"
                        name="b"
                        placeholder="b"
                        step="any"
                    >

                    <span>
                        y =
                    </span>

                    <input
                        type="number"
                        name="c"
                        placeholder="c"
                        step="any"
                    >

                </div>


                <div class="equation">

                    <input
                        type="number"
                        name="d"
                        placeholder="d"
                        step="any"
                    >

                    <span>
                        x +
                    </span>

                    <input
                        type="number"
                        name="e"
                        placeholder="e"
                        step="any"
                    >

                    <span>
                        y =
                    </span>

                    <input
                        type="number"
                        name="f"
                        placeholder="f"
                        step="any"
                    >

                </div>


                <button
                    type="submit"
                    class="button primary full"
                >
                    Resolver sistema →
                </button>

            </form>

        </div>


        <div class="classification card">

            <span class="eyebrow">
                CLASSIFICAÇÃO
            </span>

            <h2>
                O sistema pode apresentar três situações.
            </h2>


            <div class="classification-item">

                <span class="classification-icon success">
                    ✓
                </span>

                <div>

                    <strong>
                        Possível e determinado
                    </strong>

                    <p>
                        Uma única solução.
                    </p>

                </div>

            </div>


            <div class="classification-item">

                <span class="classification-icon warning">
                    ∞
                </span>

                <div>

                    <strong>
                        Possível e indeterminado
                    </strong>

                    <p>
                        Infinitas soluções.
                    </p>

                </div>

            </div>


            <div class="classification-item">

                <span class="classification-icon danger">
                    ×
                </span>

                <div>

                    <strong>
                        Impossível
                    </strong>

                    <p>
                        Não existe solução.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <section class="cramer-section">

        <div class="cramer-formula">

            <span class="eyebrow">
                REGRA DE CRAMER
            </span>

            <h2>
                Determinante da matriz de coeficientes.
            </h2>

            <div class="formula-box">

                D = | A |

            </div>

            <p>

                Quando o determinante da matriz de coeficientes
                é diferente de zero, o sistema possui solução única.

            </p>

        </div>


        <div class="cramer-cards">

            <div>

                <strong>
                    D ≠ 0
                </strong>

                <span>
                    Solução única
                </span>

            </div>


            <div>

                <strong>
                    D = 0
                </strong>

                <span>
                    Analisar consistência
                </span>

            </div>

        </div>

    </section>


    <section class="test-section">

        <span class="eyebrow">
            CASOS DE TESTE
        </span>

        <h2>
            Situações previstas no planejamento.
        </h2>


        <div class="test-grid">

            <div>

                <strong>
                    ID 19
                </strong>

                <span>
                    Sistema com solução única
                </span>

            </div>


            <div>

                <strong>
                    ID 20
                </strong>

                <span>
                    Sistema impossível
                </span>

            </div>


            <div>

                <strong>
                    ID 21
                </strong>

                <span>
                    Sistema indeterminado
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
            Sistemas lineares
        </span>

    </div>

</footer>

</body>
</html>