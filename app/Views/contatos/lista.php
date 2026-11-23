<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<h2>Contatos</h2>

<?php if (session()->getFlashdata('msg')): ?>
    <p class="ok"><?= esc(session()->getFlashdata('msg')) ?></p>
<?php endif; ?>

<a class="botao" href="<?= base_url('contatos/novo') ?>">Novo contato</a>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contatos as $c): ?>
            <tr>
                <td><?= esc($c['nome']) ?></td>
                <td><?= esc($c['email']) ?></td>
                <td><?= esc($c['telefone']) ?></td>
                <td><?= esc($c['endereco']) ?></td>
                <td>
                    <a href="<?= base_url('contatos/editar/' . $c['id']) ?>">Editar</a>
                    <form action="<?= base_url('contatos/excluir/' . $c['id']) ?>" method="post" class="inline" onsubmit="return confirm('Excluir esse contato?')">
                        <?= csrf_field() ?>
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php if (empty($contatos)): ?>
            <tr><td colspan="5">Nenhum contato cadastrado.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
