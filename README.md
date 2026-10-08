# Álgebra Linear em PHP

Projeto de Integração Matemática — Escola SESI Milton Santos / SENAI Camaçari.
Dupla: Lucas Augusto e Eduarda Cardoso.

Aplicação web em PHP que implementa operações com matrizes e resolução de
sistemas lineares, validada com testes unitários automatizados (PHPUnit).

## Requisitos

- PHP 8.4
- Composer
- Laravel Herd (ou qualquer servidor PHP)
- Para o relatório de cobertura: extensão **Xdebug** (modo coverage) ou **PCOV**

## Instalação e execução

```bash
composer install
```

**Com Laravel Herd:** coloque a pasta do projeto no diretório monitorado pelo
Herd (ou use *Add site*) e abra o endereço `.test` do site.

**Sem Herd:**

```bash
php -S localhost:8000
# abra http://localhost:8000
```

A aplicação em si não depende do `vendor/` (usa `require_once`); o Composer é
necessário para os testes.

## Algoritmos implementados (`model/AlgebraLinear.php`)

| Algoritmo | Método |
|---|---|
| Soma, subtração, multiplicação, transposição | Definição elemento a elemento |
| Determinante | 1x1 direto · 2x2 `ad − bc` · 3x3 **Regra de Sarrus** · ordem > 3 **Laplace** |
| Matriz inversa | **Matriz adjunta**: `adj(A) / det(A)` (rejeita matriz singular) |
| Sistemas lineares | **Regra de Cramer** + classificação por posto (SPD / SPI / SI) |

Tolerância numérica dos testes: **0,0001** (`assertEqualsWithDelta`). Internamente,
"zero" é decidido de forma **relativa** à escala da matriz, para que matrizes com
valores pequenos (ex.: `0,001`) não sejam confundidas com singulares.

## Como rodar os testes

```bash
vendor/bin/phpunit
# ou
composer test
```

### Relatório de cobertura

```bash
# Windows (PowerShell)
$env:XDEBUG_MODE="coverage"; vendor/bin/phpunit --coverage-text --coverage-html coverage


O relatório HTML é gerado em `coverage/index.html`. Faça o print da execução
dos testes e da cobertura para a entrega. A cobertura é medida somente sobre
`model/` (os algoritmos), conforme `phpunit.xml`.

## Testes

| Arquivo | Casos do plano |
|---|---|
| `SomaMatrizesTest` | ID 1, 2, 3 |
| `SubtracaoMatrizesTest` | ID 4, 5 |
| `MultiplicacaoMatrizesTest` | ID 6, 7, 8 |
| `TransposicaoMatrizTest` | ID 9, 10 |
| `DeterminanteTest` | ID 11, 12, 13, 14, 15 |
| `InversaTest` | ID 16, 17, 18 |
| `SistemaLinearTest` | ID 19, 20, 21 |

Cada teste do plano tem o ID no nome do método (`id16_inversa_de_...`).
`tests/AlgebraLinearTestCase.php` concentra as fixtures (`setUp`/`tearDown`:
identidade e nula) e o helper `assertMatrizIgual()`.

## Matriz de rastreabilidade

| Requisito | Casos de teste | Status |
|---|---|---|
| Soma e subtração de matrizes | ID 1, 2, 3, 4, 5 | Implementado |
| Multiplicação de matrizes | ID 6, 7, 8 | Implementado |
| Transposição | ID 9, 10 | Implementado |
| Determinante (1x1, 2x2, 3x3) | ID 11, 12, 13, 14, 15 | Implementado |
| Inversa e detecção de singularidade | ID 16, 17, 18 | Implementado |
| Resolução e classificação de sistemas | ID 19, 20, 21 | Implementado |

## Estrutura

```
model/AlgebraLinear.php     algoritmos
controller/                 controllers (ponte entre as views e o model)
view/                       páginas (matrizes, determinante, inversa, sistemas, resultado)
templates/css, js           estilos e script que monta os campos conforme a ordem
tests/                      suíte PHPUnit
phpunit.xml                 configuração do PHPUnit e da cobertura
composer.json               dependências e autoload
```

