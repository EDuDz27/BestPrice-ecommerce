<?php
class UserModel
{
    private $conn;
    private $table_name = "usuario";
    public $email;
    public $senha;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function login()
    {
        // Verifica se o usuário já está logado (sessão)
        session_start();
        if (isset($_SESSION['user_email'])) {
            return true; // O usuário já está logado
        }

        // Caso o usuário não esteja logado, verifica as credenciais
        $query = "SELECT email, senha FROM " . $this->table_name . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);

        $stmt->execute();

        // Se o usuário existir e a senha for válida, faz o login
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se a senha está correta
            if (password_verify($this->senha, $row['senha'])) {
                // Inicia a sessão e armazena o email na sessão
                $_SESSION['user_email'] = $row['email'];
                return true;
            }
        }

        return false;
    }

    public function buscaEndereco($id_endereco)
    {
        // Verifica se o id_endereco foi passado
        if (!$id_endereco) {
            return null;
        }

        // Query para buscar todas as colunas da tabela endereco usando o id_endereco
        $query = "SELECT Rua, Bairro, Cidade, UF, Numero, Complemento FROM endereco WHERE id_endereco = :id_endereco LIMIT 1";

        // Preparando a query
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_endereco', $id_endereco);

        // Executando a consulta
        $stmt->execute();

        // Verifica se o resultado da consulta existe
        if ($stmt->rowCount() > 0) {
            // Obtém o resultado
            $endereco = $stmt->fetch(PDO::FETCH_ASSOC);

            // Concatena todos os dados em uma única linha
            $enderecoCompleto = "{$endereco['Rua']},
                                N° {$endereco['Numero']},
                                {$endereco['Bairro']},
                                {$endereco['Cidade']} - 
                                {$endereco['UF']}, " .
                (!empty($endereco['Complemento']) ? 'Complemento: ' . $endereco['Complemento'] : '');

            return $enderecoCompleto;
        }

        // Se não encontrar o endereço, retorna null
        return null;
    }

    public function getUserInfo()
    {
        if (!isset($_SESSION['user_email'])) {
            return null;
        }

        $query = "SELECT nome, email, telefone, id_endereco FROM " . $this->table_name . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $_SESSION['user_email']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $endereco = $this->buscaEndereco($user['id_endereco']);

            return [
                'nome' => $user['nome'],
                'email' => $user['email'],
                'telefone' => $user['telefone'],
                'endereco' => $endereco
            ];
        }

        return null;
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        return true;
    }
}
?>