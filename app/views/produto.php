<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Best Price - Premium Shopping Experience</title>
    <link rel="stylesheet" href="public/css/produto.css">
    <script src="public/js/menu.js" defer></script>
</head>

<body>

    <?php include("header.html"); ?>

    <div class="container">
        <div class="produto">
            <div class="placeholder">
                <img src="imgs/Frame 612.svg" alt="Produto 1">
            </div>
            <div class="produto-info">
                <div class="descricao-produto">
                    <h2>Pão Francês</h2>

                    <p class="preco">R$ 10,00</p>
                    <p>PlayStation 5 Controller Skin High quality vinyl with air channel adhesive for easy bubble free install & mess free removal Pressure sensitive.</p>
                    <hr>
                    <div class="colours">
                    </div>
                    <div class="botoes-size">
                        <p>Tamanho:</p>
                        <button type="button">XS</button>
                        <button type="button">S</button>
                        <button type="button">M</button>
                        <button type="button">L</button>
                        <button type="button">XL</button>
                    </div>
                    <p class="quant">Quantidade:</p>
                    <div class="quantity-container">
                        <button class="btn" onclick="decrease()">−</button>
                        <span class="quantity" id="quantity">1</span>
                        <button class="btn" onclick="increase()">+</button>
                    </div>
                    <div class="botoes">
                        <button class="bt-carrinho">Adicionar ao Carrinho</button>
                        <button class="buy">Comprar</button>

                    </div>
                    <div class="extra-infos">
                        <div class="frete-gratis">
                            <div>
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <div>
                                <h3>Frete Grátis</h3>
                                <a href="">Insira seu endereço para completar sua compra. </a>
                            </div>
                        </div>
                        <hr>
                        <div class="reembolso">
                            <div>
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <div>
                                <h3>Pedir Reembolso</h3>
                                <p>Até 30 dias para solicitação do reembolso.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <?php include("footer.html"); ?>


    <script src="produto.js"></script>
</body>

</html>