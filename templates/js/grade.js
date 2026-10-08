(function () {
    var form = document.querySelector('form[data-grade]');
    if (!form) { return; }

    var modo = form.getAttribute('data-grade');
    var seletor = form.querySelector('#ordem');
    var alvo = form.querySelector('#grade');
    var variaveis = ['x', 'y', 'z'];

    function campo(nome, dica) {
        var input = document.createElement('input');
        input.type = 'number';
        input.name = nome;
        input.placeholder = dica;
        input.step = 'any';
        input.required = true;
        return input;
    }

    function texto(conteudo) {
        var span = document.createElement('span');
        span.textContent = conteudo;
        return span;
    }

    function montar() {
        var n = parseInt(seletor.value, 10);
        var i, j;
        alvo.innerHTML = '';

        if (modo === 'matriz') {
            alvo.style.gridTemplateColumns = 'repeat(' + n + ', 72px)';
            for (i = 0; i < n; i++) {
                for (j = 0; j < n; j++) {
                    alvo.appendChild(campo('matriz[' + i + '][' + j + ']', '0'));
                }
            }
            return;
        }

        for (i = 0; i < n; i++) {
            var equacao = document.createElement('div');
            equacao.className = 'equation';
            equacao.style.display = 'flex';
            equacao.style.flexWrap = 'wrap';
            equacao.style.alignItems = 'center';
            equacao.style.justifyContent = 'center';
            equacao.style.gap = '8px';

            for (j = 0; j < n; j++) {
                equacao.appendChild(campo('matriz[' + i + '][' + j + ']', '0'));
                equacao.appendChild(texto(variaveis[j] + (j < n - 1 ? ' +' : ' =')));
            }
            equacao.appendChild(campo('termos[' + i + ']', '0'));
            alvo.appendChild(equacao);
        }
    }

    seletor.addEventListener('change', montar);
    montar();
})();
