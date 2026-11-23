<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<h2><?= $contato ? 'Editar contato' : 'Novo contato' ?></h2>

<?php $erros = session()->getFlashdata('erros'); ?>
<?php if ($erros): ?>
    <ul class="erro">
        <?php foreach ($erros as $e): ?>
            <li><?= esc($e) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="<?= $contato ? base_url('contatos/atualizar/' . $contato['id']) : base_url('contatos/salvar') ?>" method="post">
    <?= csrf_field() ?>

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" value="<?= esc(old('nome', $contato['nome'] ?? '')) ?>">

    <label for="email">E-mail</label>
    <input type="text" id="email" name="email" value="<?= esc(old('email', $contato['email'] ?? '')) ?>">

    <label for="telefone">Telefone</label>
    <input type="text" id="telefone" name="telefone" value="<?= esc(old('telefone', $contato['telefone'] ?? '')) ?>">

    <label for="cep">CEP</label>
    <input type="text" id="cep" name="cep" value="<?= esc(old('cep', $contato['cep'] ?? '')) ?>">

    <label for="endereco">Endereço</label>
    <input type="text" id="endereco" name="endereco" value="<?= esc(old('endereco', $contato['endereco'] ?? '')) ?>">

    <button type="submit">Salvar</button>
    <a href="<?= base_url('contatos') ?>">Cancelar</a>
</form>

<script>
    const campoCep = document.getElementById('cep');

    campoCep.addEventListener('blur', function () {
        const cep = campoCep.value.replace(/\D/g, '');
        if (cep.length !== 8) {
            return;
        }

        fetch('<?= base_url('cep') ?>/' + cep)
            .then(resposta => resposta.json())
            .then(dados => {
                if (dados.endereco) {
                    document.getElementById('endereco').value = dados.endereco;
                } else {
                    alert('CEP não encontrado');
                }
            })
            .catch(() => alert('Não deu pra consultar o CEP agora'));
    });
</script>

<?= $this->endSection() ?>
