<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<div class="cartao">
    <h2>Contatos</h2>

    <?php if (session()->getFlashdata('msg')): ?>
        <p class="ok"><?= esc(session()->getFlashdata('msg')) ?></p>
    <?php endif; ?>

    <div class="barra">
        <input type="search" id="busca" placeholder="Buscar por nome, e-mail ou telefone..." aria-label="Buscar contatos">
        <a class="btn" href="<?= base_url('contatos/novo') ?>">+ Novo contato</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contatos as $c): ?>
                <tr data-busca="<?= esc(mb_strtolower($c['nome'] . ' ' . $c['email'] . ' ' . $c['telefone'])) ?>">
                    <td>
                        <div class="pessoa">
                            <span class="avatar"><?= esc(mb_strtoupper(mb_substr($c['nome'], 0, 1))) ?></span>
                            <span><?= esc($c['nome']) ?><br><small class="muted"><?= esc($c['email']) ?></small></span>
                        </div>
                    </td>
                    <td data-label="Telefone"><?= esc($c['telefone']) ?></td>
                    <td data-label="Endereço" class="muted"><?= esc($c['endereco']) ?: '—' ?></td>
                    <td>
                        <div class="acoes">
                            <a class="btn btn-sec btn-mini" href="<?= base_url('contatos/editar/' . $c['id']) ?>">Editar</a>
                            <form action="<?= base_url('contatos/excluir/' . $c['id']) ?>" method="post" class="inline" data-confirm="Excluir esse contato?">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn-perigo">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (empty($contatos)): ?>
        <p class="vazio">Nenhum contato cadastrado ainda.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
