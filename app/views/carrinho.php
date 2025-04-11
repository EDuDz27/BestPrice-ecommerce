<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="../../public/css/carrinho.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
  </head>
  <body>
    <header>
      <span>Carrinho de compras do <b>Best Price</b></span>
    </header>
    <main>
      <div class="page-title">Seu Carrinho</div>
      <div class="content">
        <section>
          <table>
            <thead>
              <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>-</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="product">
                    <img src="https://picsum.photos/100/120" alt="" />
                    <div class="info">
                      <div class="name">Nome do produto</div>
                      <div class="category">Categoria</div>
                    </div>
                  </div>
                </td>
                <td>R$ 120</td>
                <td>
                  <div class="qty">
                    <button class="bx bx-minus"></button>
                    <input class="quantity" type="number" value="2" min="1"/>
                    <button class="bx bx-plus"></button>
                  </div>
                </td>
                <td>R$ 240</td>
                <td>
                  <button class="remove"><i class="bx bx-x"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </section>
        <aside>
          <div class="box">
            <header>Resumo da compra</header>
            <div class="info">
              <div><span>Sub-total</span><span>R$ 418</span></div>
              <div><span>Frete</span><span>Gratuito</span></div>
              <div>
                <button>
                  Adicionar cupom de desconto
                  <i class="bx bx-right-arrow-alt"></i>
                </button>
              </div>
            </div>
            <footer>
              <span>Total</span>
              <span>R$ 418</span>
            </footer>
          </div>
          <button>Finalizar Compra</button>
        </aside>
      </div>
    </main>

    <script>
      // Quando o botão de diminuir for clicado
      document.querySelectorAll('.bx-minus').forEach(button => {
        button.addEventListener('click', (event) => {
          const row = event.target.closest('tr');
          const qtyInput = row.querySelector('.quantity');
          let quantity = parseInt(qtyInput.value);
          
          if (quantity > 1) {
            quantity--; // Diminui a quantidade
            qtyInput.value = quantity;
            updateTotal(row, quantity);
          }
        });
      });

      // Quando o botão de aumentar for clicado
      document.querySelectorAll('.bx-plus').forEach(button => {
        button.addEventListener('click', (event) => {
          const row = event.target.closest('tr');
          const qtyInput = row.querySelector('.quantity');
          let quantity = parseInt(qtyInput.value);
          
          quantity++; // Aumenta a quantidade
          qtyInput.value = quantity;
          updateTotal(row, quantity);
        });
      });

      // Função para atualizar o total do produto
      function updateTotal(row, quantity) {
        const price = parseFloat(row.querySelector('td:nth-child(2)').textContent.replace('R$', '').trim());
        const totalCell = row.querySelector('td:nth-child(4)');
        totalCell.textContent = `R$ ${(price * quantity).toFixed(2)}`; // Atualiza o total
        updateCartSummary();
      }

      // Função para atualizar o resumo do carrinho
      function updateCartSummary() {
        let subtotal = 0;
        document.querySelectorAll('tbody tr').forEach(row => {
          const totalCell = row.querySelector('td:nth-child(4)');
          const total = parseFloat(totalCell.textContent.replace('R$', '').trim());
          subtotal += total;
        });
        
        // Atualiza o subtotal
        document.querySelector('.box .info div:first-child span:nth-child(2)').textContent = `R$ ${subtotal.toFixed(2)}`;
        document.querySelector('.box footer span:nth-child(2)').textContent = `R$ ${subtotal.toFixed(2)}`;
      }

      // Remover um produto
      document.querySelectorAll('.remove').forEach(button => {
        button.addEventListener('click', (event) => {
          const row = event.target.closest('tr');
          row.remove(); // Remove a linha
          updateCartSummary(); // Atualiza o resumo
        });
      });

      // Inicializa o total ao carregar a página
      document.querySelectorAll('tbody tr').forEach(row => {
        const qtyInput = row.querySelector('.quantity');
        const quantity = parseInt(qtyInput.value);
        updateTotal(row, quantity); // Atualiza o total do produto
      });
    </script>

  </body>
</html>
