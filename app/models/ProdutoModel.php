<?php

class ProdutoModel
{
    private $conn;
    public $nome;
    public $id_categoria;
    public $descricao;
    public $fotoBinario;
    public $produtosSelecionados;
    public $id_produto;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function adicionarProduto($nome, $id_categoria, $descricao, $fotoBinario)
    {
        if (empty($nome) || empty($id_categoria)) {
            die("Todos os campos precisam ser preenchidos.");
        }

        $sql = "INSERT INTO produto (Nome, Id_Categoria, Descricao, Foto) VALUES (:Nome, :Id_Categoria, :Descricao, :Foto)";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':Nome' => $nome,
            ':Id_Categoria' => $id_categoria,
            ':Descricao' => $descricao,
            ':Foto' => $fotoBinario
        ]);

        $id_produto = $this->conn->lastInsertId();
        $this->atualizarEstoque($id_produto);
    }

    public function listarEstoque()
    {
        $sql = "SELECT id_estoque, id_produto, nome, foto, descricao, quantidade, valor_un FROM estoque";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $produtos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produtos[] = $row;
        }

        return $produtos;
    }

    public function atualizarEstoque($id_recebido)
    {
        $id_produto = $id_recebido;

        $produtosSelecionados = $_POST['produtos'];

        $produtosSelecionados = array_map('intval', $produtosSelecionados);
        $placeholders = str_repeat('?,', count($produtosSelecionados) - 1) . '?';

        $sqlUpdate = "UPDATE estoque SET Id_produto = ? WHERE Id_Estoque IN ($placeholders)";

        $stmtUpdate = $this->conn->prepare($sqlUpdate);
        $stmtUpdate->bindValue(1, $id_produto, PDO::PARAM_INT);

        $params = array_merge([$id_produto], $produtosSelecionados);
        $stmtUpdate->execute($params);

    }


}
?>