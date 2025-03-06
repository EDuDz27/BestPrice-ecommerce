<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Price - Premium Shopping Experience</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="public\css\home.css">
</head>
<body>
   
    <!-- Cabeçalho / NavBar -->
    <?php include 'header.html'; ?>
    
    <!-- Banner principal -->
    <div class="banner">
        <div class="banner-content">
            <h2>Descubra o Melhor da Tecnologia</h2>
            <p>Produtos premium com preços imbatíveis</p>
            <a href="#products" class="cta-button">Ver Ofertas</a>
        </div>
    </div>


    <!-- Categorias -->
    <div class="categories">
        <div class="category">
            <i class="fas fa-mobile-alt"></i>
            <span>Smartphones</span>
        </div>
        <div class="category">
            <i class="fas fa-laptop"></i>
            <span>Notebooks</span>
        </div>
        <div class="category">
            <i class="fas fa-headphones"></i>
            <span>Áudio</span>
        </div>
        <div class="category">
            <i class="fas fa-tv"></i>
            <span>TVs</span>
        </div>
    </div>


    <!-- Seção de produtos -->
    <main id="products">
        <div style="display: flex; justify-content: center; height: 50px;">
                <h2 class="section-title">Produtos em Destaque</h2>
               </div>
         <!-- Produto 1 -->
         <div class="products">
        <div class="product-card">
            <div class="product-badge">Novo</div>
            <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3" alt="iPhone">
            <div class="product-info">
                <h3>iPhone 14 Pro</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="price">R$ 5.999,00</p>
                <p class="installments">12x de R$ 499,92 sem juros</p>
                <button class="buy-button"><i class="fas fa-shopping-cart"></i> Comprar</button>
            </div>
        </div>


        <!-- Produto 2 -->
        <div class="product-card">
            <div class="product-badge">-15%</div>
            <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3" alt="MacBook">
            <div class="product-info">
                <h3>MacBook Pro M2</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="price">R$ 9.899,00</p>
                <p class="installments">12x de R$ 824,92 sem juros</p>
                <button class="buy-button"><i class="fas fa-shopping-cart"></i> Comprar</button>
            </div>
        </div>


        <!-- Produto 3 -->
        <div class="product-card">
            <div class="product-badge">Oferta</div>
            <img src="https://images.unsplash.com/photo-1572536147248-ac59a8abfa4b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3" alt="TV Samsung">
            <div class="product-info">
                <h3>Smart TV OLED 65"</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p class="price">R$ 6.499,00</p>
                <p class="installments">12x de R$ 541,58 sem juros</p>
                <button class="buy-button"><i class="fas fa-shopping-cart"></i> Comprar</button>
            </div>
        </div>


        <!-- Produto 4 -->
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3" alt="Headphone">
            <div class="product-info">
                <h3>Headphone Pro Max</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="price">R$ 1.299,00</p>
                <p class="installments">12x de R$ 108,25 sem juros</p>
                <button class="buy-button"><i class="fas fa-shopping-cart"></i> Comprar</button>
            </div>
        </div>
    </div>
    </main>


    <!-- Newsletter -->
    <section class="newsletter">
        <div class="newsletter-content">
            <h3>Receba Nossas Ofertas</h3>
            <p>Cadastre-se para receber promoções exclusivas</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Seu melhor e-mail">
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </section>

    <!-- Rodapé -->
    <?php include 'footer.html' ?>
    
</body>
</html>
