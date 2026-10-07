<?php

require_once __DIR__ . '/../model/AlgebraLinear.php';
require_once __DIR__ . '/../controller/MatrizController.php';

use Controller\MatrizController;

$tipo = $_POST['tipo'] ?? '';

$resultado = null;
$erro = null;

try {

    $controller = new MatrizController();

    if ($tipo === 'soma') {

        $matrizA = $_POST['matrizA'] ?? [];
        $matrizB = $_POST['matrizB'] ?? [];

        $resultado = $controller->somar(
            $matrizA,
            $matrizB
        );

    } elseif ($tipo === 'subtracao') {

        $matrizA = $_POST['matrizA'] ?? [];
        $matrizB = $_POST['matrizB'] ?? [];

        $resultado = $controller->subtrair(
            $matrizA,
            $matrizB
        );

    } elseif ($tipo === 'multiplicacao') {

        $matrizA = $_POST['matrizA'] ?? [];
        $matrizB = $_POST['matrizB'] ?? [];

        $resultado = $controller->multiplicar(
            $matrizA,
            $matrizB
        );

    } elseif ($tipo === 'transposta') {

        $matriz = $_POST['matriz'] ?? [];

        $resultado = $controller->transpor(
            $matriz
        );

    } else {

        throw new Exception(
            "Operação não identificada."
        );
    }

} catch (Throwable $e) {

    $erro = $e->getMessage();
}

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

<link rel="stylesheet" href="../templates/css/global.css">
<link rel="stylesheet" href="../templates/css/resultado.css">

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
        href="../index.php">
        class="header-button"
    >
        Início
    </a>

</header>


<main class="page">

    <!-- HERO -->

    <section class="result-hero">

        <span class="eyebrow">
            RESULTADO
        </span>

        <h1>
            Resultado da operação.
        </h1>

        <p>
            Confira o resultado produzido pelo algoritmo
            de Álgebra Linear.
        </p>

    </section>

    <section class="result-layout">

        <!-- RESULTADO -->

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

                <?php if ($erro === null): ?>

                    <span class="result-status success">
                        Concluído
                    </span>

                <?php else: ?>

                    <span class="result-status error">
                        Erro
                    </span>

                <?php endif; ?>

            </div>


            <div class="result-display">


                <?php if ($erro !== null): ?>

                    <div class="error-message">

                        <strong>
                            Não foi possível realizar o cálculo.
                        </strong>

                        <p>
                            <?= htmlspecialchars($erro) ?>
                        </p>

                    </div>


                <?php elseif (is_array($resultado)): ?>


                    <div class="result-matrix">

                        <?php foreach ($resultado as $linha): ?>

                            <div class="result-row">

                                <?php foreach ($linha as $valor): ?>

                                    <span>
                                        <?= htmlspecialchars(
                                            (string) $valor
                                        ) ?>
                                    </span>

                                <?php endforeach; ?>

                            </div>

                        <?php endforeach; ?>

                    </div>


                <?php else: ?>

                    <p>
                        Nenhum resultado foi encontrado.
                    </p>

                <?php endif; ?>


            </div>

        </div>


        <!-- RESUMO -->

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
                        <?= htmlspecialchars($nomeOperacao) ?>
                    </strong>

                </div>

                <div>

                    <span>
                        Entrada
                    </span>

                    <strong>
                        Matriz
                    </strong>

                </div>

                <div>

                    <span>
                        Resultado
                    </span>

                    <strong>

                        <?php if ($erro === null): ?>

                            Calculado

                        <?php else: ?>

                            Não calculado

                        <?php endif; ?>

                    </strong>

                </div>

                <div>

                    <span>
                        Status
                    </span>

                    <?php if ($erro === null): ?>

                        <strong class="success">
                            Concluído
                        </strong>

                    <?php else: ?>

                        <strong class="error">
                            Erro
                        </strong>

                    <?php endif; ?>

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


    <!-- PRECISÃO -->

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