<?php

require_once 'config/database.php';
require_once 'app/models/CadastroModel.php';

class CadastroController
{
    private $cadastroModel;

    public function __construct()
    {
        $this->cadastroModel = new CadastroModel();
    }

    public function verificaSessao()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            session_abort();
            $this->showForm();
        } else {
            header("Location: perfil");
            exit();
        }
    }

    public function showForm()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            include 'app/views/cadastro_form.php';
        }
    }


    public function salvar()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Recebe os dados do formulário
            $this->cadastroModel->nome = trim($_POST['nome']);
            $this->cadastroModel->email = trim($_POST['email']);
            $this->cadastroModel->senha = $_POST['senha'];
            $confirm_senha = $_POST['confirm_senha'];
            $this->cadastroModel->telefone = trim($_POST['telefone']);

            // 💡 Validação no Backend 💡
            if (empty($this->cadastroModel->nome) || empty($this->cadastroModel->email) || empty($this->cadastroModel->senha) || empty($confirm_senha)) {
                $error = "Todos os campos são obrigatórios!";
                include 'app/views/cadastro_form.php';
                exit;
            }

            // Verifica se o e-mail já existe
            if ($this->cadastroModel->checkEmailExistente()) {
                $error = "O e-mail já está cadastrado!";
                include 'app/views/cadastro_form.php';
                exit;
            }

            if ($this->cadastroModel->senha !== $confirm_senha) {
                $error = "As senhas não coincidem!";
                include 'app/views/cadastro_form.php';
                exit;
            }

            if (strlen($this->cadastroModel->senha) < 8) {
                $error = "A senha deve ter pelo menos 8 caracteres!";
                include 'app/views/cadastro_form.php';
                exit;
            }

            if (!preg_match('/[A-Z]/', $this->cadastroModel->senha) || !preg_match('/[0-9]/', $this->cadastroModel->senha)) {
                $error = "A senha deve conter pelo menos uma letra maiúscula e um número!";
                include 'app/views/cadastro_form.php';
                exit;
            }

            // Criptografa a senha antes de salvar
            $this->cadastroModel->senha = password_hash($this->cadastroModel->senha, PASSWORD_DEFAULT);

            // Salva o usuário
            if ($this->cadastroModel->salvar()) {
                echo "Cadastro realizado com sucesso!";
            } else {
                echo "Erro ao cadastrar o usuário!";
            }
        } else {
            $this->verificaSessao();
        }
    }
}
