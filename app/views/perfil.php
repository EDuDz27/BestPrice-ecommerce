<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="perfil.css" />
</head>

<body>

    <!-- Cabeçalho / NavBar -->
    <?php include 'header.html'; ?>

    <section class="container">
        <div class="form-perfil">
            <div class="editperfil">
                <h1>Editar Perfil</h1>

                <div class="editar">
                    <div>
                        <label>Nome</label>
                        <input id="primanome" type="text" value="<?php echo htmlspecialchars($userInfo['nome']); ?>"
                            readonly />
                    </div>
                    <div>
                        <label>E-mail</label>
                        <input id="email" type="email" value="<?php echo htmlspecialchars($userInfo['email']); ?>"
                            readonly />
                    </div>
                    <div>
                        <label>Telefone</label>
                        <input id="telefone" type="text" value="<?php echo htmlspecialchars($userInfo['telefone']); ?>"
                            readonly />
                    </div>
                    <div>
                        <label>Endereço</label>
                        <div class="p" style="display: flex;">
                            <input type="text" name="cep" placeholder="Coloque o seu CEP aqui" required maxlength="8"
                                value="<?= $_POST['cep'] ?? '' ?>">
                            <button class="botao-buscar" type="submit" name="buscar_cep">Buscar</button>
                        </div>
                    </div>
                    <input type="hidden" name="cep" value="<?= htmlspecialchars($_POST['cep']) ?>">
                    <div>
                        <label>Rua:</label>
                        <input type="text" name="rua" required
                            value="<?= htmlspecialchars($endereco['logradouro'] ?? '') ?>">
                    </div>
                    <div>
                        <label>Bairro:</label>
                        <input type="text" name="bairro" required
                            value="<?= htmlspecialchars($endereco['bairro'] ?? '') ?>">
                    </div>
                    <div>
                        <label>Cidade:</label>
                        <input type="text" name="cidade" required
                            value="<?= htmlspecialchars($endereco['localidade'] ?? '') ?>">
                    </div>
                    <div>
                        <label>Estado:</label>
                        <input type="text" name="estado" required
                            value="<?= htmlspecialchars($endereco['uf'] ?? '') ?>">
                    </div>
                    <div>
                        <label>UF:</label>
                        <input type="text" name="uf" required value="<?= htmlspecialchars($endereco['uf'] ?? '') ?>">
                    </div>
                    <div>
                        <label>Número:</label>
                        <input type="text" name="numero" required>
                    </div>
                    <div>
                        <label>Complemento:</label>
                        <input type="text" name="complemento">
                        <div class="botoes">
                            <button type="submit" class="botao-salvar" name="salvar_endereco">Salvar Endereço</button>
                        </div>
                    </div>

                </div>

                <h1>Editar Senha</h1>
                <div class="editsenha">
                    <div>
                        <label>Senha Atual</label>
                        <input id="senhaAtual" type="password" />
                    </div>
                    <div>
                        <label>Nova Senha</label>
                        <input id="novaSenha" type="password" />
                    </div>
                    <div>
                        <label>Confirmar Senha</label>
                        <input id="confirmarNovaSenha" type="password" />
                    </div>
                </div>
                <div action="logout" class="botoes">
                    <button type="submit" class="botao-sair">Sair</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    <?php include 'footer.html' ?>

</body>

</html>
