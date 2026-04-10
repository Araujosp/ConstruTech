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
        'categoria' => $_POST['categoria']  
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
                <tr>
                    <td>Barra de Ferro</td>
                    <td>Bruto</td>
                    <td>30</td>
                    <td>R$ 15,00</td>
                    <td>R$ 450,00</td>
                    <td>Critico</td>
                    <td><img src="./img/trash.png" alt="" class="lixo_icon"></td>
                </tr>
                <tr>
                    <td>Furadeira</td>
                    <td>Ferramenta</td>
                    <td>7</td>
                    <td>R$ 70,00</td>
                    <td>R$ 490,00</td>
                    <td>Médio</td>
                    <td><img src="./img/trash.png" alt="" class="lixo_icon"></td>
                </tr>
                <tr>
                    <td>Gesso</td>
                    <td>Acabamento</td>
                    <td>30</td>
                    <td>R$ 20,00</td>
                    <td>R$ 600,00</td>
                    <td>Normal</td>
                    <td><img src="./img/trash.png" alt="" class="lixo_icon"></td>
                </tr>
                <tr>
                    <td>Enxada</td>
                    <td>Ferramenta</td>
                    <td>15</td>
                    <td>R$ 10,00</td>
                    <td>R$ 150,00</td>
                    <td>Normal</td>
                    <td><img src="./img/trash.png" alt="" class="lixo_icon"></td>
                </tr>
                <tr>
                    <td>Massa Corrida 30kg</td>
                    <td>Tintas House</td>
                    <td>30</td>
                    <td>R$ 100,00</td>
                    <td>R$ 3.000,00</td>
                    <td>Critico</td>
                    <td><img src="./img/trash.png" alt="" class="lixo_icon"></td>
                </tr>
                <tr>
                    <td>Porcelanato 45x45</td>
                    <td>Acabamento</td>
                    <td>120</td>
                    <td>R$ 80,00</td>
                    <td>R$ 9.600,00</td>                    <td>Medio</td>
                    <td><img src="./img/trash.png" alt="" class="lixo_icon"></td>
                </tr>
            </table>
        </section>
        <section class="list_incluir_item">
            <h1>+ Adicionar Novo Item</h1>
            <form action="">
                <label for="">Nome *</label>
                <input type="text" placeholder="Ex: Furadeira" name="produto">
                <label for="">Categoria *</label>
                <select name="categoria" id="" name="categoria">
                    <option value="">Bruto</option>
                    <option value="">Acabamento</option>
                    <option value="">Ferramenta</option>
                </select>
                <label for="">Quantidade *</label>
                <input type="text" placeholder="0" name="quantidade">
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