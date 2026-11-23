<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<div class="cartao">
    <h2><?= $contato ? 'Editar contato' : 'Novo contato' ?></h2>

    <?php $erros = session()->getFlashdata('erros'); ?>
    <?php if ($erros): ?>
        <ul class="erro">
            <?php foreach ($erros as $e): ?>
                <li><?= esc($e) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= $contato ? base_url('contatos/atualizar/' . $contato['id']) : base_url('contatos/salvar') ?>" method="post" data-cep-url="<?= base_url('cep') ?>">
        <?= csrf_field() ?>

        <div class="grade">
            <div class="cheio">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="<?= esc(old('nome', $contato['nome'] ?? '')) ?>">
            </div>
            <div>
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" value="<?= esc(old('email', $contato['email'] ?? '')) ?>">
            </div>
            <div>
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(45) 99999-0000" value="<?= esc(old('telefone', $contato['telefone'] ?? '')) ?>">
            </div>
            <div>
                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" inputmode="numeric" placeholder="00000-000" value="<?= esc(old('cep', $contato['cep'] ?? '')) ?>">
                <div class="dica" id="cep-aviso"></div>
            </div>
            <div>
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" value="<?= esc(old('endereco', $contato['endereco'] ?? '')) ?>">
            </div>
        </div>

        <div class="rodape-form">
            <button type="submit">Salvar</button>
            <a class="btn btn-sec" href="<?= base_url('contatos') ?>">Cancelar</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
