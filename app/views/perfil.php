<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perfil</title>
  <link rel="stylesheet" href="public/css/perfil.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Carregar o JS do Bootstrap para o Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
            <label>Primeiro nome</label>
            <input
              id="primanome"
              type="text"
              value="<?php echo htmlspecialchars($userInfo['nome']); ?>"
              readonly />
          </div>
          <div>
            <label>E-mail</label>
            <input
              id="email"
              type="email"
              value="<?php echo htmlspecialchars($userInfo['email']); ?>"
              readonly />
          </div>
          <div>
            <label>Telefone</label>
            <input
              id="telefone"
              type="text"
              value="<?php echo htmlspecialchars($userInfo['telefone']); ?>"
              readonly />
          </div>
          <div>
            <label>Endereço</label>
            <div style="display: flex; align-items: center">
            <select class="endereco" name="endereco" id="endereco">
              <?php
                if (!empty($userInfo['endereco'])) {
                foreach ($userInfo['endereco'] as $endereco) {
                  echo "<option value=\"$endereco\">$endereco</option>";
                }
                  } else {
                  echo "<option value=\"\">Nenhum endereço encontrado</option>";
                  }
              ?>
            </select>
              <a href="endereco" style="text-decoration: none;">
                <i style="margin-left: 10px; margin-right: 10px;" id="plus" class="bi bi-plus"></i>
              </a>
              <a href="" style="text-decoration: none;" data-bs-toggle='modal'
              data-bs-target='#excluirenderecomodal'>
              <id= class="bi bi-trash3-fill" id="trash"></id=>
              </a>
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
        <a href="logout" class="botoes">
          <button type="submit" class="botao-sair">Sair</button>
        </a>
      </div>
    </div>
  </section>
  <!--FormModal-->
  <div class="modal fade" id="excluirenderecomodal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="excluirenderecomodal">Excluir Endereço</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 style="text-align: center;" id="EnderecoNomeExcluir">Deseja realmente excluir este endereço?</h5>
                        <div class="botoes-confirm" style="display: flex; justify-content: center; gap:20px;">
                            <a href="#" id="btnConfirmarExclusao" class="btn btn-danger">Sim</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <!--Fim FormModal-->


  <!-- Rodapé -->
  <?php include 'footer.html' ?>
</body>

</html>
