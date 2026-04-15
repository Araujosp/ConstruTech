<?php

require_once 'init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ids = array_column($_SESSION['produtos'], 'id');
    $novoId = $ids ? max($ids) + 1 : 1;

    $_SESSION['produtos'][] = [
        'id' => $novoId,
        'nome' => $_POST['nome'],
        'preco' => $_POST['preco'],
        'categoria' => $_POST['categoria'],
        'qtd_estoque' => $_POST['qtd_estoque'],
        'fornecedor' => $_POST['fornecedor']
    ];
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section class="list_incluir_item">
    <h1 id="title_main">+ Adicionar Novo Item</h1>

    <form action="index.php" method="POST" class="form-grid">
        <div class="form-group">
            <label>Nome *</label>
            <input type="text" placeholder="Ex: Furadeira" name="nome">
        </div>

        <div class="form-group">
            <label>Categoria *</label>
            <select name="categoria">
                <option value="">Selecione</option>
                <option value="bruto">Bruto</option>
                <option value="acabamento">Acabamento</option>
                <option value="ferramenta">Ferramenta</option>
            </select>
        </div>

        <div class="form-group">
            <label>Quantidade *</label>
            <input type="text" placeholder="0" name="qtd_estoque">
        </div>

        <div class="form-group">
            <label>Preço Unitário (R$) *</label>
            <input type="text" placeholder="0,00" name="preco">
        </div>

        <div class="form-group">
            <label>Fornecedor</label>
            <input type="text" placeholder="Ex: Distribuidora ABC" name = "fornecedor">
        </div>

        <div class="form-group">
            <label>Local</label>
            <select>
                <option>Selecione</option>
            </select>
        </div>

        <div class="form-group full">
            <a href="index.php"><input type="submit" value="+ Adicionar ao Estoque" name="adicionar_item" class="btn"></a>
        </div>

    </form>
</section>
</body>
</html>