<?php

$pageTitle = "Álgebra Linear em PHP";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $pageTitle ?></title>

    <link rel="stylesheet" href="templates/css/global.css">
    <link rel="stylesheet" href="templates/css/index.css">

</head>

<body>

    <header class="header">

        <div class="header-content">

            <a href="index.php" class="logo">

                <div class="logo-symbol">
                    λ
                </div>

                <div class="logo-text">

                    <strong>
                        Álgebra Linear
                    </strong>

                    <span>
                        Matemática • Lógica • PHP
                    </span>

                </div>

            </a>

            <nav class="nav">

                <a href="index.php" class="active">
                    Início
                </a>

                <a href="view/matrizes.php">
                    Matrizes
                </a>

                <a href="view/determinante.php">
                    Determinante
                </a>

                <a href="view/inversa.php">
                    Inversa
                </a>

                <a href="view/sistemas.php">
                    Sistemas
                </a>

            </nav>

            <a href="view/matrizes.php" class="header-button">
                Começar →
            </a>

        </div>

    </header>

    <main class="page">

        <section class="hero">

            <div class="hero-content">

                <span class="eyebrow">
                    Projeto de Integração Matemática
                </span>

                <h1>
                    Álgebra Linear <span>em PHP.</span>
                </h1>

                <p>
                    Uma aplicação para realizar operações com matrizes,
                    calcular determinantes, encontrar matrizes inversas
                    e resolver sistemas lineares.
                </p>

                <div class="hero-buttons">

                    <a href="view/matrizes.php" class="button primary">
                        Trabalhar com matrizes →
                    </a>

                    <a href="view/sistemas.php" class="button secondary">
                        Resolver sistema
                    </a>

                </div>

            </div>

            <div class="hero-visual">

                <div class="matrix-decoration">

                    <div class="matrix-box">

                        <div>
                            1&nbsp;&nbsp; 2
                        </div>

                        <div>
                            3&nbsp;&nbsp; 4
                        </div>

                        <small>
                            det(A) = -2
                        </small>

                    </div>

                </div>

            </div>

        </section>

        <section class="project-section">

            <div class="section-heading">

                <span class="eyebrow">
                    O projeto
                </span>

                <h2>
                    Matemática transformada em código.
                </h2>

                <p>
                    O projeto une lógica matemática, desenvolvimento web
                    e engenharia de software para implementar algoritmos
                    de Álgebra Linear em PHP.
                </p>

            </div>

            <div class="project-grid">

                <article class="project-card">

                    <div class="project-icon">
                        Σ
                    </div>

                    <span class="card-number">
                        01
                    </span>

                    <h3>
                        Operações matriciais
                    </h3>

                    <p>
                        Soma, subtração, multiplicação e transposição
                        de matrizes.
                    </p>

                    <a href="view/matrizes.php" class="card-link">
                        Acessar →
                    </a>

                </article>

                <article class="project-card">

                    <div class="project-icon">
                        Δ
                    </div>

                    <span class="card-number">
                        02
                    </span>

                    <h3>
                        Determinantes
                    </h3>

                    <p>
                        Cálculo de determinantes de matrizes
                        de ordem 1, 2 e 3.
                    </p>

                    <a href="view/determinante.php" class="card-link">
                        Acessar →
                    </a>

                </article>

                <article class="project-card">

                    <div class="project-icon">
                        A⁻¹
                    </div>

                    <span class="card-number">
                        03
                    </span>

                    <h3>
                        Matriz inversa
                    </h3>

                    <p>
                        Cálculo da matriz inversa utilizando
                        determinante e matriz adjunta.
                    </p>

                    <a href="view/inversa.php" class="card-link">
                        Acessar →
                    </a>

                </article>

                <article class="project-card">

                    <div class="project-icon">
                        x
                    </div>

                    <span class="card-number">
                        04
                    </span>

                    <h3>
                        Sistemas lineares
                    </h3>

                    <p>
                        Resolução e classificação de sistemas
                        utilizando a Regra de Cramer.
                    </p>

                    <a href="view/sistemas.php" class="card-link">
                        Acessar →
                    </a>

                </article>

            </div>

        </section>

        <section class="methodology">

            <span class="eyebrow">
                Como funciona
            </span>

            <h2>
                Matemática, algoritmo e testes.
            </h2>

            <p>
                Cada algoritmo é pensado para receber os dados,
                realizar o cálculo e apresentar um resultado,
                enquanto os testes automatizados verificam
                seu funcionamento.
            </p>

            <div class="methodology-grid">

                <div class="method-item">

                    <strong>
                        01. Entrada
                    </strong>

                    <span>
                        O usuário informa os valores da matriz
                        ou do sistema.
                    </span>

                </div>

                <div class="method-item">

                    <strong>
                        02. Processamento
                    </strong>

                    <span>
                        O PHP executa o algoritmo matemático
                        correspondente.
                    </span>

                </div>

                <div class="method-item">

                    <strong>
                        03. Validação
                    </strong>

                    <span>
                        O PHPUnit verifica os resultados
                        e os casos de erro.
                    </span>

                </div>

            </div>

        </section>

        <section class="technologies">

            <div class="section-heading">

                <span class="eyebrow">
                    Tecnologias
                </span>

                <h2>
                    Ferramentas utilizadas
                </h2>

            </div>

            <div class="tech-list">

                <span class="tech">
                    PHP 8.4
                </span>

                <span class="tech">
                    PHPUnit
                </span>

                <span class="tech">
                    HTML5
                </span>

                <span class="tech">
                    CSS3
                </span>

                <span class="tech">
                    Composer
                </span>

                <span class="tech">
                    Laravel Herd
                </span>

                <span class="tech">
                    Git
                </span>

                <span class="tech">
                    GitHub
                </span>

            </div>

        </section>

    </main>

    <footer class="footer">

        <div class="footer-content">

            <div>

                <strong>
                    Álgebra Linear em PHP
                </strong>

                <p>
                    Projeto de integração matemática • Camaçari - BA • 2026
                </p>

            </div>

            <div class="footer-links">

                <a href="index.php">
                    Início
                </a>

                <a href="view/matrizes.php">
                    Matrizes
                </a>

                <a href="view/sistemas.php">
                    Sistemas
                </a>

            </div>

        </div>

    </footer>

</body>
</html>
