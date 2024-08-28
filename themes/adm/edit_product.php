<?php
$this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url("themes/adm/assets/css/products.css"); ?>">
    <script type='text/javascript' src='<?= url("themes/adm/assets/js/edit-product.js"); ?>' async></script>
    <title>Mangás livre</title>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Produtos</h1>
        <form id="adminForm">
            <label for="name">Nome do produto</label>
            <input type="text" id="name_prod" name="name" required>

            <label for="value">Valor</label>
            <input type="number" id="value" name="value" required>

            <label for="qtda">Quantidade</label>
            <input type="number" id="qtd_prod" name="qts_prod" required>

            <label for="image">Imagem do produto</label>
            <input type="text" id="url_prod" name="image" required>

            <label for="categoria">Categoria</label>
            <input type="text" id="category" name="category" required>

            <label for="name">Nome do Autor</label>
            <input type="text" id="autor" name="name" required>

            <label for="productDescription">Sinopse do Produto</label>
            <textarea id="productDescription" name="productDescription" rows="5"></textarea>

            <button type="submit">Submeter produto</button>
        </form>
        <h1>Produtos ativos</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th>Autor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <form id="apgproduct">
        
        <label for="apg_prodct" id="apg">coloque o id do produto a ser apagado</label>
        <input type="number" id="apaga_prod" required>

        <button type="submit">Apagar</button>

        </form>
    </div>
</body>
</html>