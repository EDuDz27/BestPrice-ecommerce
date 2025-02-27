<?php

class User {
    private $conn;
    private $table_name = "usuario"; // Nome da tabela no banco

    public $nome;
    public $email;
    public $senha;
    public $telefone;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Verificar se o email já existe
    public function checkEmailExistente() {
        $query = "SELECT Id_User FROM " . $this->table_name . " WHERE email = :email";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true; // Email já existe
        }
        return false; // Email não existe
    }

    // Cadastrar novo usuário
    public function cadastrar() {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :telefone)";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':telefone', $this->telefone);

        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    
}
?>
