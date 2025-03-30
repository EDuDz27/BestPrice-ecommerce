<?php

require_once 'config/database.php';
require_once 'app\models\ProdutoModel.php';

class HomeController
{
    private $produtoModel;

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();
    }
    public function index()
    {

        $produtos = $this->produtoModel->listarProdutosComValor();
        include 'app/views/home.php';
    }
}

?>