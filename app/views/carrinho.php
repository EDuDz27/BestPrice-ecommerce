<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="public/css/carrinho.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body class="carrinho-body">
    <header class="carrinho-header">
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
                        <?php if (!empty($itens)): ?>
                            <?php foreach ($itens as $item): ?>
                                <tr>
                                    <td>
                                        <div class="product">
                                            <img width="120px" height="auto"
                                                src="data:image/png;base64,<?= base64_encode($item['foto']) ?>"
                                                alt="<?= htmlspecialchars($item['nome']) ?>" />
                                            <div class="info">
                                                <div class="name"><?= htmlspecialchars($item['nome']) ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>R$ <?= number_format($item['valor_un'], 2, ',', '.') ?></td>
                                    <td>
                                        <div class="qty">
                                            <button class="carrinho-button bx bx-minus"
                                                onclick="decreaseQuantity(<?= $item['id_pedido'] ?>)"></button>
                                            <input class="quantity" type="number" value="<?= $item['quantidade'] ?>" min="1"
                                                max="<?= $item['quantidade_estoque'] ?>" data-pedido="<?= $item['id_pedido'] ?>"
                                                data-max="<?= $item['quantidade_estoque'] ?>"
                                                data-preco="<?= $item['valor_un'] ?>"
                                                onchange="updateQuantity(<?= $item['id_pedido'] ?>, this.value)" />
                                            <button class="carrinho-button bx bx-plus"
                                                onclick="increaseQuantity(<?= $item['id_pedido'] ?>, <?= $item['quantidade_estoque'] ?>)"></button>
                                        </div>
                                    </td>
                                    <td class="total-item">R$ <?= number_format($item['valor_total'], 2, ',', '.') ?></td>
                                    <td>
                                        <button class="remove" onclick="removeItem(<?= $item['id_pedido'] ?>)">
                                            <i class="bx bx-x"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align: center;">Seu carrinho está vazio</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </section>
            <aside class="carrinho-aside">
                <div class="box">
                    <header>Resumo da compra</header>
                    <div class="info">
                        <div>
                            <span>Sub-total</span>
                            <span class="subtotal">R$
                                <?= number_format(array_sum(array_column($itens, 'valor_total')), 2, ',', '.') ?></span>
                        </div>
                        <div><span>Frete</span><span>Gratuito</span></div>
                        <div>
                            <button class="carrinho-button">
                                Adicionar cupom de desconto
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                    <footer>
                        <span>Total</span>
                        <span class="total-geral">R$
                            <?= number_format(array_sum(array_column($itens, 'valor_total')), 2, ',', '.') ?></span>
                    </footer>
                </div>
                <button class="carrinho-button" onclick="finalizarCompra()">Finalizar Compra</button>
            </aside>
        </div>
    </main>

    <script>
        // Função para formatar valores monetários
        function formatarValor(valor) {
            return valor.toFixed(2).replace('.', ',');
        }

        // Função para calcular e atualizar totais
        function atualizarTotais() {
            let subtotal = 0;

            // Calcula o total de cada item e o subtotal geral
            document.querySelectorAll('tbody tr').forEach(row => {
                const input = row.querySelector('.quantity');
                const precoUnitario = parseFloat(input.dataset.preco);
                const quantidade = parseInt(input.value);
                const totalItem = precoUnitario * quantidade;

                // Atualiza o total do item
                row.querySelector('.total-item').textContent = `R$ ${formatarValor(totalItem)}`;

                subtotal += totalItem;
            });

            // Atualiza o subtotal e total geral
            document.querySelector('.subtotal').textContent = `R$ ${formatarValor(subtotal)}`;
            document.querySelector('.total-geral').textContent = `R$ ${formatarValor(subtotal)}`;
        }

        // Adiciona event listeners para todos os inputs de quantidade
        document.addEventListener('DOMContentLoaded', function () {
            const quantityInputs = document.querySelectorAll('.quantity');
            quantityInputs.forEach(input => {
                input.addEventListener('input', function () {
                    const max = parseInt(this.dataset.max);
                    let value = parseInt(this.value);

                    // Se o valor for menor que 1, define como 1
                    if (value < 1 || isNaN(value)) {
                        this.value = 1;
                        value = 1;
                    }

                    // Se o valor for maior que o máximo, define como o máximo
                    if (value > max) {
                        this.value = max;
                        value = max;
                    }

                    // Atualiza os totais na interface
                    atualizarTotais();

                    // Atualiza a quantidade no servidor
                    updateQuantity(parseInt(this.dataset.pedido), value);
                });
            });
        });

        function updateQuantity(id_pedido, quantidade) {
            const input = document.querySelector(`input[data-pedido="${id_pedido}"]`);
            const max = parseInt(input.dataset.max);

            // Garante que a quantidade está dentro dos limites
            if (quantidade < 1) quantidade = 1;
            if (quantidade > max) quantidade = max;

            fetch('carrinho@atualizar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id_pedido=${id_pedido}&quantidade=${quantidade}`
            })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        alert('Erro ao atualizar quantidade. Verifique se há estoque suficiente.');
                        // Reverte a quantidade para o valor anterior
                        input.value = data.quantidade_anterior;
                        atualizarTotais();
                    }
                });
        }

        function increaseQuantity(id_pedido, max_quantidade) {
            const input = document.querySelector(`input[data-pedido="${id_pedido}"]`);
            let quantidade = parseInt(input.value);
            if (quantidade < max_quantidade) {
                input.value = quantidade + 1;
                atualizarTotais();
                updateQuantity(id_pedido, quantidade + 1);
            }
        }

        function decreaseQuantity(id_pedido) {
            const input = document.querySelector(`input[data-pedido="${id_pedido}"]`);
            let quantidade = parseInt(input.value);
            if (quantidade > 1) {
                input.value = quantidade - 1;
                atualizarTotais();
                updateQuantity(id_pedido, quantidade - 1);
            }
        }

        function removeItem(id_pedido) {
            if (confirm('Deseja realmente remover este item do carrinho?')) {
                fetch(`carrinho@remover?id=${id_pedido}`, {
                    method: 'GET'
                })
                    .then(response => {
                        if (response.ok) {
                            window.location.reload();
                        } else {
                            alert('Erro ao remover item do carrinho');
                        }
                    });
            }
        }

        function finalizarCompra() {
            if (confirm('Deseja prosseguir para o pagamento?')) {
                window.location.href = 'pagamento';
            }
        }
    </script>
</body>

</html>