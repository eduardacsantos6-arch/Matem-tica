<?php

$pageTitle = "Álgebra Linear | Matrizes";

$operacao = $_POST['operacao'] ?? 'soma';
$etapa = $_POST['etapa'] ?? '';

$linhas = (int) ($_POST['linhas'] ?? 2);
$colunas = (int) ($_POST['colunas'] ?? 2);

$linhasA = (int) ($_POST['linhasA'] ?? 2);
$colunasA = (int) ($_POST['colunasA'] ?? 2);
$colunasB = (int) ($_POST['colunasB'] ?? 2);


$linhas = max(1, min(10, $linhas));
$colunas = max(1, min(10, $colunas));

$linhasA = max(1, min(10, $linhasA));
$colunasA = max(1, min(10, $colunasA));
$colunasB = max(1, min(10, $colunasB));

if ($operacao === 'soma' || $operacao === 'subtracao') {
    $linhasA = $linhas;
    $colunasA = $colunas;
}

$linhasB = $colunasA;

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

        <a href="matrizes.php" class="active">
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

    <!-- HERO -->

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

        <!-- ETAPA 01 -->

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

                <input
                    type="hidden"
                    name="etapa"
                    value="preparar"
                >


                <label for="operacao">
                    Operação
                </label>

                <select
                    id="operacao"
                    name="operacao"
                >

                    <option
                        value="soma"
                        <?= $operacao === 'soma' ? 'selected' : '' ?>
                    >
                        Soma de matrizes
                    </option>

                    <option
                        value="subtracao"
                        <?= $operacao === 'subtracao' ? 'selected' : '' ?>
                    >
                        Subtração de matrizes
                    </option>

                    <option
                        value="multiplicacao"
                        <?= $operacao === 'multiplicacao' ? 'selected' : '' ?>
                    >
                        Multiplicação de matrizes
                    </option>

                    <option
                        value="transposta"
                        <?= $operacao === 'transposta' ? 'selected' : '' ?>
                    >
                        Transposição de matriz
                    </option>

                </select>


                <?php if ($operacao === 'multiplicacao'): ?>

                    <div class="dimensions">

                        <div>

                            <label for="linhasA">
                                Linhas de A
                            </label>

                            <input
                                type="number"
                                id="linhasA"
                                name="linhasA"
                                value="<?= $linhasA ?>"
                                min="1"
                                max="10"
                                required
                            >

                        </div>


                        <div>

                            <label for="colunasA">
                                Colunas de A
                            </label>

                            <input
                                type="number"
                                id="colunasA"
                                name="colunasA"
                                value="<?= $colunasA ?>"
                                min="1"
                                max="10"
                                required
                            >

                        </div>


                        <div>

                            <label for="colunasB">
                                Colunas de B
                            </label>

                            <input
                                type="number"
                                id="colunasB"
                                name="colunasB"
                                value="<?= $colunasB ?>"
                                min="1"
                                max="10"
                                required
                            >

                        </div>

                    </div>

                    <p class="notice">
                        A será <?= $linhasA ?> × <?= $colunasA ?> e
                        B será <?= $linhasB ?> × <?= $colunasB ?>.
                    </p>


                <?php else: ?>

                    <div class="dimensions">

                        <div>

                            <label for="linhas">
                                Linhas
                            </label>

                            <input
                                type="number"
                                id="linhas"
                                name="linhas"
                                value="<?= $linhas ?>"
                                min="1"
                                max="10"
                                required
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
                                value="<?= $colunas ?>"
                                min="1"
                                max="10"
                                required
                            >

                        </div>

                    </div>

                <?php endif; ?>


                <button
                    type="submit"
                    class="button primary full"
                >
                    Preparar matrizes →
                </button>

            </form>

        </div>


        <!-- ETAPA 02 -->

        <div class="matrix-card">

            <div class="card-header">

                <div>

                    <span class="step">
                        02
                    </span>

                    <h2>
                        Entrada das matrizes
                    </h2>

                </div>

            </div>


            <?php if ($etapa === 'preparar'): ?>


                <form
                    action="resultado.php"
                    method="post"
                >

                    <input
                        type="hidden"
                        name="tipo"
                        value="<?= htmlspecialchars($operacao) ?>"
                    >


                    <?php if ($operacao === 'soma' || $operacao === 'subtracao'): ?>

                        <!-- MATRIZ A -->

                        <h3>
                            Matriz A
                        </h3>

                        <div class="matrix-wrapper">

                            <span class="bracket">
                                [
                            </span>

                            <div
                                class="matrix-input"
                                style="grid-template-columns: repeat(<?= $colunas ?>, 72px);"
                            >

                                <?php for ($i = 0; $i < $linhas; $i++): ?>

                                    <?php for ($j = 0; $j < $colunas; $j++): ?>

                                        <input
                                            type="number"
                                            name="matrizA[<?= $i ?>][<?= $j ?>]"
                                            placeholder="0"
                                            step="any"
                                            required
                                        >

                                    <?php endfor; ?>

                                <?php endfor; ?>

                            </div>

                            <span class="bracket">
                                ]
                            </span>

                        </div>


                        <!-- MATRIZ B -->

                        <h3>
                            Matriz B
                        </h3>

                        <div class="matrix-wrapper">

                            <span class="bracket">
                                [
                            </span>

                            <div
                                class="matrix-input"
                                style="grid-template-columns: repeat(<?= $colunas ?>, 72px);"
                            >

                                <?php for ($i = 0; $i < $linhas; $i++): ?>

                                    <?php for ($j = 0; $j < $colunas; $j++): ?>

                                        <input
                                            type="number"
                                            name="matrizB[<?= $i ?>][<?= $j ?>]"
                                            placeholder="0"
                                            step="any"
                                            required
                                        >

                                    <?php endfor; ?>

                                <?php endfor; ?>

                            </div>

                            <span class="bracket">
                                ]
                            </span>

                        </div>


                    <?php elseif ($operacao === 'multiplicacao'): ?>

                        <!-- MATRIZ A -->

                        <h3>
                            Matriz A — <?= $linhasA ?> × <?= $colunasA ?>
                        </h3>

                        <div class="matrix-wrapper">

                            <span class="bracket">
                                [
                            </span>

                            <div
                                class="matrix-input"
                                style="grid-template-columns: repeat(<?= $colunasA ?>, 72px);"
                            >

                                <?php for ($i = 0; $i < $linhasA; $i++): ?>

                                    <?php for ($j = 0; $j < $colunasA; $j++): ?>

                                        <input
                                            type="number"
                                            name="matrizA[<?= $i ?>][<?= $j ?>]"
                                            placeholder="0"
                                            step="any"
                                            required
                                        >

                                    <?php endfor; ?>

                                <?php endfor; ?>

                            </div>

                            <span class="bracket">
                                ]
                            </span>

                        </div>


                        <!-- MATRIZ B -->

                        <h3>
                            Matriz B — <?= $linhasB ?> × <?= $colunasB ?>
                        </h3>

                        <div class="matrix-wrapper">

                            <span class="bracket">
                                [
                            </span>

                            <div
                                class="matrix-input"
                                style="grid-template-columns: repeat(<?= $colunasB ?>, 72px);"
                            >

                                <?php for ($i = 0; $i < $linhasB; $i++): ?>

                                    <?php for ($j = 0; $j < $colunasB; $j++): ?>

                                        <input
                                            type="number"
                                            name="matrizB[<?= $i ?>][<?= $j ?>]"
                                            placeholder="0"
                                            step="any"
                                            required
                                        >

                                    <?php endfor; ?>

                                <?php endfor; ?>

                            </div>

                            <span class="bracket">
                                ]
                            </span>

                        </div>


                    <?php else: ?>

                        <!-- MATRIZ ÚNICA -->

                        <h3>
                            Matriz A — <?= $linhas ?> × <?= $colunas ?>
                        </h3>

                        <div class="matrix-wrapper">

                            <span class="bracket">
                                [
                            </span>

                            <div
                                class="matrix-input"
                                style="grid-template-columns: repeat(<?= $colunas ?>, 72px);"
                            >

                                <?php for ($i = 0; $i < $linhas; $i++): ?>

                                    <?php for ($j = 0; $j < $colunas; $j++): ?>

                                        <input
                                            type="number"
                                            name="matriz[<?= $i ?>][<?= $j ?>]"
                                            placeholder="0"
                                            step="any"
                                            required
                                        >

                                    <?php endfor; ?>

                                <?php endfor; ?>

                            </div>

                            <span class="bracket">
                                ]
                            </span>

                        </div>

                    <?php endif; ?>


                    <p class="notice">

                        <?php if ($operacao === 'soma'): ?>

                            Digite os valores das matrizes A e B para realizar a soma.

                        <?php elseif ($operacao === 'subtracao'): ?>

                            Digite os valores das matrizes A e B para realizar a subtração.

                        <?php elseif ($operacao === 'multiplicacao'): ?>

                            O número de colunas de A é igual ao número de linhas de B.

                        <?php else: ?>

                            Digite os valores da matriz que deseja transpor.

                        <?php endif; ?>

                    </p>


                    <button
                        type="submit"
                        class="button secondary"
                    >
                        Executar operação
                    </button>

                </form>


            <?php else: ?>

                <p class="notice">

                    Escolha uma operação e informe as dimensões
                    das matrizes para começar.

                </p>

            <?php endif; ?>

        </div>

    </section>


    <!-- OPERAÇÕES -->

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


    <!-- TESTES -->

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
                O planejamento inclui matrizes nulas,
                matriz identidade, matriz 1×1 e dimensões
                incompatíveis.
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