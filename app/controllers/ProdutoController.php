<?php
require_once 'config/database.php';
require_once 'app\models\ProdutoModel.php';

class ProdutoController
{

    private $produtoModel;

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();
    }

    public function index()
    {
        include 'app/views/produto.php';
    }

    public function adicionarCatalogo()
    {
        $produtos = $this->produtoModel->listarEstoque();
        include 'app\views\add-produto.php';
    }

    public function salvarProduto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $id_categoria = $_POST['id_categoria'];
            $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
                $fotoBinario = file_get_contents($_FILES['foto']['tmp_name']);
            } else {
                $fotoBinario = null;  // No photo uploaded, set as null
            }

            if (isset($_POST['produtos']) && !empty($_POST['produtos'])) {
                $this->produtoModel->adicionarProduto($nome, $id_categoria, $descricao, $fotoBinario);
            } else {
                die("Nenhum item de estoque selecionado");
            }


        }

        header("Location: add-produto");
        exit;
    }
}
?>