(function () {
    function mascaraTel(v) {
        v = v.replace(/\D/g, '').slice(0, 11);
        if (v.length > 10) return v.replace(/^(\d{2})(\d{5})(\d{0,4}).*/, '($1) $2-$3');
        if (v.length > 6) return v.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
        if (v.length > 2) return v.replace(/^(\d{2})(\d*)/, '($1) $2');
        return v;
    }

    function mascaraCep(v) {
        v = v.replace(/\D/g, '').slice(0, 8);
        return v.length > 5 ? v.slice(0, 5) + '-' + v.slice(5) : v;
    }

    function buscarCep(campo) {
        var form = campo.form;
        var aviso = document.getElementById('cep-aviso');
        var cep = campo.value.replace(/\D/g, '');
        if (!form || !form.dataset.cepUrl || cep.length !== 8) return;

        aviso.textContent = 'Consultando CEP...';
        fetch(form.dataset.cepUrl + '/' + cep)
            .then(function (r) { return r.json(); })
            .then(function (d) {
                if (d.endereco) {
                    document.getElementById('endereco').value = d.endereco;
                    aviso.textContent = 'Endereço preenchido pelo CEP.';
                } else {
                    aviso.textContent = 'CEP não encontrado.';
                }
            })
            .catch(function () { aviso.textContent = 'Não deu para consultar o CEP agora.'; });
    }

    document.addEventListener('input', function (e) {
        var t = e.target;
        if (t.name === 'telefone') t.value = mascaraTel(t.value);
        else if (t.name === 'cep') t.value = mascaraCep(t.value);
        else if (t.id === 'busca') {
            var termo = t.value.toLowerCase();
            document.querySelectorAll('tbody tr[data-busca]').forEach(function (tr) {
                tr.hidden = tr.dataset.busca.indexOf(termo) === -1;
            });
        }
    });

    document.addEventListener('focusout', function (e) {
        if (e.target.name === 'cep') buscarCep(e.target);
    });

    document.addEventListener('submit', function (e) {
        var msg = e.target.dataset && e.target.dataset.confirm;
        if (msg && !window.confirm(msg)) e.preventDefault();
    });
})();
