<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda de Contatos</title>
    <link rel="stylesheet" href="<?= base_url('css/estilo.css') ?>">
</head>
<body>
    <header>
        <h1>Agenda de Contatos</h1>
        <a href="<?= base_url('contatos') ?>">Início</a>
    </header>
    <main>
        <?= $this->renderSection('conteudo') ?>
    </main>
</body>
</html>
