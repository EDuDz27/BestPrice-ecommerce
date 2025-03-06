<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Endereço</title>
    <link rel="stylesheet" href="public/css/endereco.css">
</head>

<body>

    <?php include 'header.html' ?>

    <div class="container">
        <h2>Buscar Endereço pelo CEP</h2>
        <form action="endereco@cep" method="POST">
            <label>CEP:</label>
            <input type="text" name="cep" required maxlength="8" value="<?= $_POST['cep'] ?? '' ?>">
            <button type="submit">Buscar</button>
        </form>

        <?php if (!empty($erro))
            echo "<p style='color: red;'>$erro</p>"; ?>

        <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
            echo "<p style='color: green;'>Endereço salvo com sucesso!</p>";
        } ?>

        <?php if (!empty($endereco) && !isset($endereco['erro'])): ?>

            <form action="endereco@salvar" method="POST">
                <input type="hidden" name="cep" value="<?= htmlspecialchars($_POST['cep']) ?>">

                <label>Rua:</label>
                <input type="text" name="rua" required value="<?= htmlspecialchars($endereco['logradouro'] ?? '') ?>">

                <label>Bairro:</label>
                <input type="text" name="bairro" required value="<?= htmlspecialchars($endereco['bairro'] ?? '') ?>">

                <label>Cidade:</label>
                <input type="text" name="cidade" required value="<?= htmlspecialchars($endereco['localidade'] ?? '') ?>">

                <label>Estado:</label>
                <input type="text" name="estado" required value="<?= htmlspecialchars($endereco['estado'] ?? '') ?>">

                <label>UF:</label>
                <input type="text" name="uf" required value="<?= htmlspecialchars($endereco['uf'] ?? '') ?>">

                <label>Número:</label>
                <input type="text" name="numero" required>

                <label>Complemento:</label>
                <input type="text" name="complemento">

                <button type="submit">Salvar Endereço</button>
            </form>

        <?php endif; ?>
    </div>

    <?php include 'footer.html' ?>

</body>

</html>