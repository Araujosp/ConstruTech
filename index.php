<?php
require_once 'init.php';

// print_r($_POST);
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
//print '<pre>';
//print_r($_SESSION['produtos']);
//print '</pre>';

?>


<html lang="pt-br">

<head>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="imagens/logo-sem-fundo.png">
    <title>ConstruTech</title>
</head>

<body>
    <header class="menu">
        <img src="imagens/logo-sem-fundo.png">
        <div class="title-header">
            <img src="imagens/estoque-pronto.png" alt="">
            <h2>controle de estoque</h2>
        </div>
    </header>

    <main>
        <h1 id="title_main">Gerenciamento De Estoque</h1>
        <section class="list_estoque">
            <table class="estoque">
                <tr class="linha_destaque">
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    <th>Preço Unit.</th>
                    <th>Fornecedor</th>
                    <th>Valor Total</th>
                    <th>Status</th>
                    <td></td>
                </tr> 
                <?php 
                $total_geral = 0;
                $total_unidades = 0;
                $qtd_produtos = count($_SESSION['produtos']); 
                ?>
                <?php foreach ($_SESSION['produtos'] as $produto) { ?> 
                    <tr>
                        <td><?php echo $produto['nome'] ?></td>
                        <td><?php echo $produto['categoria'] ?></td>
                        <td><?php echo $produto['qtd_estoque'] ?></td>
                        <td><?php echo $produto['preco'] ?></td>
                        <td><?php echo $produto['fornecedor'] ?></td>

                        <?php
                        $valor_total = (float)$produto['preco'] * (int)$produto['qtd_estoque'];
                        $total_geral += $valor_total;
                        $total_unidades += (int)$produto['qtd_estoque'] ;
                        ?>

                        <td><?php echo $valor_total ?></td>
                        <td>Critico</td>
                        <td><img src="./img/trash.png" alt="" class="lixo_icon"></td> 
                    </tr>
                    <?php } ?>
            </table>
        </section>
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
            <input type="submit" value="+ Adicionar ao Estoque" name="adicionar_item" class="btn">
        </div>

    </form>
</section>
    </main>
    <footer class="footer">
        <p><?php echo $qtd_produtos?> produto(s) cadastrados.
            <?php echo $total_unidades?> unidade(s) total</p>
        <p id="chama-o-dev">@Desenvolvido por: Chama o Dev</p>
        <p>valor total: R$<?php echo $total_geral ?></p>
    </footer>
</body>

</html>