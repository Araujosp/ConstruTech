<?php
require_once 'init.php';

// print_r($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$ids = array_column($_SESSION['produtos'], 'id');
$novoId = $ids ? max($ids) + 1: 1;

$_SESSION['produtos'][] = [
    'id' => $novoId,
    'nome' => $_POST['nome'],
    'preco' => $_POST['preco'],
    'categoria' => $_POST['categoria'],
    'qtd_estoque' => $_POST['qtd_estoque']
];

}
    print '<pre>';
    print_r($_SESSION['produtos']);
    print '</pre>';

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
            <section class="list_estoque">
                <table class="estoque">
                    <tr class="linha_destaque">
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Preço Unit.</th>
                        <th>Valor Total</th>
                        <th>Status</th>
                        <td></td>
                    </tr>

                    <?php foreach ($_SESSION['produtos'] as $produto) {
                        ?>
                    <tr>
                    <td><?php echo $produto['nome']?></td>
                    <td><?php echo $produto['categoria']?></td>
                    <td><?php echo $produto['qtd_estoque']?></td>
                    <td><?php echo $produto['preco']?></td>
                    <td><?php echo $produto['preco'] * $produto['qtd_estoque'] ?></td>
                    <td>Critico</td>
                    <td><img src="./img/trash.png" alt="" class="lixo_icon"></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </section>
        <section class="list_incluir_item">
            <h1>+ Adicionar Novo Item</h1>
            <form action="index.php" method = 'POST'>
                <label for="">Nome *</label>
                <input type="text" placeholder="Ex: Furadeira" name="produto">
                <label for="">Categoria *</label>
                <select name="categoria" id="" name="categoria">
                    <option value="bruto">Bruto</option>
                    <option value="Acabamento">Acabamento</option>
                    <option value="Feramenta">Ferramenta</option>
                </select>
                <label for="">Quantidade *</label>
                <input type="text" placeholder="0" name="qtd_estoque">
                <label for="">Preço Unitário (R$)</label>
                <input type="text" placeholder="0,00" name="preco">
                <input type="submit" value="+ Adicionar ao Estoque" name="adicionar_item">
            </form>
        </section>
    </main>
    <footer class="footer">
        <p>4 produto(s) cadastrados. 157 unidade(s) total</p>
        <p id="chama-o-dev">@Desenvolvido por : Chama o Dev</p>
        <p>valor total: R$8.128,00</p>
    </footer>
</body>
</html>