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
        if (isset($_SESSION['user_id'])) {
            return true; // O usuário já está logado
        }

        // Caso o usuário não esteja logado, verifica as credenciais
        $query = "SELECT id_user, email, senha FROM " . $this->table_name . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        // Se o usuário existir e a senha for válida, faz o login
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se a senha está correta
            if (password_verify($this->senha, $row['senha'])) {
                // Inicia a sessão e armazena o email na sessão
                $_SESSION['user_id'] = $row['id_user'];
                return true;
            }
        }

        return false;
    }

    public function buscaEnderecos()
    {
        // Verifica se o id_user está definido na sessão
        if (!isset($_SESSION['user_id'])) {
            return null;
        }

        // Obtém o id_user da sessão
        $id_user = $_SESSION['user_id'];

        // Query para buscar todas as colunas da tabela endereco usando o id_user
        $query = "SELECT Rua, Bairro, Cidade, UF, Numero, Complemento FROM endereco WHERE id_user = :id_user";

        // Preparando a query
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);

        // Executando a consulta
        $stmt->execute();

        // Verifica se o resultado da consulta existe
        if ($stmt->rowCount() > 0) {
            // Obtém todos os resultados
            $enderecos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Array para armazenar os endereços formatados
            $enderecosCompletos = [];

            foreach ($enderecos as $endereco) {
                $enderecosCompletos[] = $endereco['Rua'] . ', ' .
                    $endereco['Bairro'] . ', ' .
                    'N°' . $endereco['Numero'] . ', ' .
                    $endereco['Cidade'] . ' - ' .
                    $endereco['UF'] . ', ' .
                    (!empty($endereco['Complemento']) ? 'Complemento: ' . $endereco['Complemento'] : '');
            }

            return $enderecosCompletos;
        }

        // Se não encontrar nenhum endereço, retorna null
        return null;
    }

    public function getUserInfo()
    {
        if (!isset($_SESSION['user_id'])) {
            return null;
        }

        $query = "SELECT nome, email, telefone FROM " . $this->table_name . " WHERE id_user = :id_user LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_user', $_SESSION['user_id']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $endereco = [];
            $endereco = $this->buscaEnderecos();

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
