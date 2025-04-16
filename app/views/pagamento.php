<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/pagamento.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Tela Pagamento</title>
</head>
<body>
    <form class="formulario">
        <div class="container">
            <div class="titulo"></div>
            <h1><b>Cartão</b></h1>

            <label>
                <p>Primeiro nome</p>
                <input id="primanome" type="text" />
            </label>

            <label>
                <p>Segundo nome</p>
                <input id="segundo" type="text" />
            </label>

            <label>
                <p>Endereco</p>
                <input id="enderecp" type="text" />
            </label>

            <label>
                <p>Bairro</p>
                <input id="telefone" type="text" />
            </label>

            <label>
                <p>Cidade</p>
                <input id="telefone" type="text" />
            </label>

            <label>
                <p>Telefone</p>
                <input id="telefone" type="text" />
            </label>  
            <br><br>

            <div class="check">
                <input type="checkbox" id="checkbox" />
                <p> Salve essas informações para uma próxima vez</p>
            </div>
        </div>

        <div class="cont">
            <h1><b>Resumo da compra</b></h1>
            <?php if (!empty($itens)): ?>
                <?php foreach ($itens as $item): ?>
                    <div class="item">
                        <img src="data:image/png;base64,<?= base64_encode($item['foto']) ?>" alt="<?= htmlspecialchars($item['nome']) ?>">
                        <p><?= htmlspecialchars($item['nome']) ?></p>
                        <span>R$ <?= number_format($item['valor_total'], 2, ',', '.') ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="pag">
                <p>Subtotal: <strong>R$ <?= number_format(array_sum(array_column($itens, 'valor_total')), 2, ',', '.') ?></strong></p>
                <hr>
                <p>Frete: <strong>Grátis</strong></p>
                <hr>
                <p>Total: <strong>R$ <?= number_format(array_sum(array_column($itens, 'valor_total')), 2, ',', '.') ?></strong></p>
            </div>

            <div class="banco">
                <label><input type="radio" name="payment" value="bank"> Banco</label>
                <img src="public/img/cartao1.png" alt="" width="220">
            </div>
            
            <label><input type="radio" name="payment" value="cod" checked> Dinheiro na Entrega</label>

            <div class="botao">
                <button id="applyCoupon">Comprar</button>
            </div>
        </div>
    </form>

    <div id="popup-sucesso" class="popup">
        <div class="popup-conteudo">
            <h2>Compra realizada com sucesso!</h2>
            <button id="fechar-popup">Fechar</button>
        </div>
    </div>
    
    <script src="public/js/pagamento.js"></script>
</body>
</html>