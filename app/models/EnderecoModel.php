<?php
class EnderecoModel
{
    private $conn;

    public $cep;
    public $rua;
    public $bairro;
    public $cidade;
    public $uf;
    public $numero;
    public $complemento;
    
    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function salvar()
    {
        $query = "INSERT INTO endereco (CEP, Rua, Bairro, Cidade, UF, Numero, Complemento) VALUES (:CEP, :Rua, :Bairro, :Cidade, :UF, :Numero, :Complemento)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':CEP',        $this->cep);
        $stmt->bindParam(':Rua',        $this->rua);
        $stmt->bindParam(':Bairro',     $this->bairro);
        $stmt->bindParam(':Cidade',     $this->cidade);
        $stmt->bindParam(':UF',         $this->uf);
        $stmt->bindParam(':Numero',     $this->numero);
        $stmt->bindParam(':Complemento', $this->complemento);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

}
