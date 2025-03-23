<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="public/css/add-produto.css">
</head>

<body>

    <section class="container">
        <form action="produto@salvar" method="POST" enctype="multipart/form-data">
            <fieldset class="tamanho">
                <legend><b>Adicionar Catálogo</b></legend>

                <div class="form-group">
                    <label for="nome">Nome do produto</label>
                    <input type="text" name="nome" id="nome" required>
                </div>

                <div class="form-group">
                    <label for="id_categoria">Categoria</label>
                    <input type="text" name="id_categoria" id="id_categoria" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Adicionar Imagem</label>
                    <input type="file" name="foto" id="foto">
                </div>

                <div class="form-buttons">
                    <input class="btn" type="submit" value="Enviar">

                </div>
            </fieldset>

            <div class="adProduct">
                <div class="btn3">
                    <button type="button" id="btn2" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>

                </div>
                <div class="titulo">

                    <label>Adicionar</label>

                    <label>Imagem</label>

                    <label>Produto</label>

                    <label>Detalhes</label>

                    <label>Quantidade</label>

                    <label>Preço</label>
                </div>

                <?php

                if (!empty($produtos)) {
                    foreach ($produtos as $produto) {

                        $fotoBlob = $produto['foto'];
                        $foto = base64_encode($fotoBlob);
                        
                        $valor = number_format($produto['valor_un'], 2, ',', '.');

                        echo "<div class='box-itens'>

                            <div class='linha'>
                                <input type='checkbox' name='produtos[]' value='{$produto['id_estoque']}'> 
                            </div>

                            <div class='linha'>
                                <img src='data:image/png;base64," . $foto . "' width='70' height='50'>
                            </div>
                                
                            <div class='linha'>
                                <p>{$produto['nome']}</p>
                            </div>

                            <div class='linha'>
                                <p>{$produto['descricao']}</p>
                            </div>
                                                            
                            <div class='linha'>
                                <p>{$produto['quantidade']}</p>
                            </div>

                            <div class='linha'>
                                <p>R$ {$valor}</p>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<p>Nenhum produto encontrado no estoque.</p>";
                }
                ?>

            </div>

        </form>

    </section>

    <!-- Modal para o botão  bootstrap-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <fieldset class="tamanho">
                        <form>
                            <legend><b>Adicionar Catálogo</b></legend>

                            <div class="form-group">
                                <label for="nome">Nome do produto</label> <br>
                                <input type="text" name="nome" id="nome">
                            </div>

                            <div class="form-group">
                                <label for="categoria">Categoria</label> <br>
                                <input type="text" name="categoria" id="categoria">
                            </div>

                            <div class="form-group">
                                <label for="detalhes">Detalhes</label> <br>
                                <textarea name="detalhes" id="detalhes" cols="30" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Adicionar Imagem</label> <br>
                                <input type="file" name="imagem" id="imagem">
                            </div>

                            <div class="form-buttons">
                                <input class="btn" type="button" value="Enviar">

                            </div>

                        </form>
                    </fieldset>
                </div>

            </div>
        </div>
    </div>

</body>

</html>