<?php

require_once 'config\database.php';
require_once 'app\controllers\CadastroController.php';

// Inicia o controlador
$userController = new UserController();

// Verifica se é uma requisição POST ou GET
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userController->handleForm(); // Processa o formulário
} else {
    $userController->showForm(); // Exibe o formulário
}
?>
