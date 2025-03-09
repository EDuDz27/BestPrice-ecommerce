<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/perfil.css" />
</head>

<body>

    <!-- Cabeçalho / NavBar -->
    <?php include 'header.html'; ?>

    <section class="container">
        <div class="form-perfil">
            <div class="editperfil">
                <h1>Editar Perfil</h1>
                
                <div class="editar" >
                    <div>
                        <label>Primeiro nome</label>
                        <input id="primanome" type="text" value="<?php echo htmlspecialchars($userInfo['nome']); ?>" readonly />
                    </div>
                    <div>
                        <label>E-mail</label>
                        <input id="email" type="email" value="<?php echo htmlspecialchars($userInfo['email']); ?>" readonly />
                    </div>          
                    <div>
                        <label>Telefone</label>
                        <input id="telefone" type="text" value="<?php echo htmlspecialchars($userInfo['telefone']); ?>" readonly />
                    </div>
                    <div>
                        <label>Endereço</label>
                        <input id="endereco" type="text" value="<?php echo htmlspecialchars($userInfo['endereco']); ?>" readonly />
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
                <div class="botoes">
                <form action="logout">
                    <button type="submit" class="botao-sair">Sair</button>
                </form>
                </div>
            </div>            
        </div>
    </section>

    <!-- Rodapé -->
    <?php include 'footer.html' ?>

</body>

</html>