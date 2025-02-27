<?php

require_once 'app\models\CadastroModel.php';

class UserController {

    private $db;
    private $user;
    private $confirm_senha;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->user = new User($this->db);
    }

    public function showForm() {
        // Exibe o formulário de cadastro
        include 'app/views/Cadastro_form.html'; 
    }

    public function handleForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recebe os dados do formulário
            $this->user->nome = $_POST['nome'];
            $this->user->email = $_POST['email'];
            $this->user->senha = $_POST['senha'];
            $confirm_senha = $_POST['confirm_senha'];
            if ($this->user->senha !== $confirm_senha) {
                echo "As senhas não coincidem!";  // Se as senhas forem diferentes
                die;
            } else {
            $this->user->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha
            $this->user->telefone = $_POST['telefone'];
            }

            // Verifica se o email já existe
            if ($this->user->checkEmailExistente()) {
                echo "Este email já está cadastrado!";
                die;
            } else {
                // Tenta cadastrar o usuário
                if ($this->user->cadastrar()) {
                    echo "Cadastro realizado com sucesso!";
                } else {
                    echo "Erro ao cadastrar o usuário!";
                    die;
                }
            }
        }
    }
}
?>
