<?php
require_once 'init.php';

if (isset($_GET['deletar'])) {
    $idDeletar = $_GET['deletar'];
    foreach ($_SESSION['produtos'] as $key => $produto) {
        if ($produto['id'] == $idDeletar) {
            unset($_SESSION['produtos'][$key]);
        }
    }
}

if(isset($_GET['incrementar'])){
    $incrementar= $_GET['incrementar'];
    foreach($_SESSION['produtos'] as $key => $produto){
        if ($produto ['id'] == $incrementar){
        $_SESSION['produtos'][$key]['qtd_estoque'] +=1;
        }
    }
}

if (isset($_GET['decrementar'])) {
    $decrementar = $_GET['decrementar'];

    foreach ($_SESSION['produtos'] as $key => $produto) {
        if ($produto['id'] == $decrementar) {

            if ($_SESSION['produtos'][$key]['qtd_estoque'] > 1) {
                $_SESSION['produtos'][$key]['qtd_estoque'] -= 1;
            } else {
                unset($_SESSION['produtos'][$key]);
            }

        }
    }
}

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
        'fornecedor' => $_POST['fornecedor'],
        'local' => $_POST['local']
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
            <h2>Controle de Estoque</h2>
        </div>
        <a href="cadastro.php" class="title-header btn_cadastrar_produto">cadastrar produto</a>
    </header>
    <main>
        <section class="list_estoque">
            <table class="estoque">
                <tr class="linha_destaque">
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th></th>
                    <th>Quantidade</th>
                    <th></th>
                    <th>Preço Unit.</th>
                    <th>Fornecedor</th>
                    <th>Local</th>
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

                        <td class='crementos' >
                            <a href="?decrementar=<?php echo $produto ['id']; ?>">➖</a>
                            </td>         
                        <td><?php echo $produto['qtd_estoque'] ?></td>

                        <td class='crementos' >
                            <a href="?incrementar=<?php echo $produto ['id']; ?>">➕</a>
                            </td>

                        <td><?php echo $produto['preco'] ?></td>
                        <td><?php echo $produto['fornecedor'] ?></td>
                        <td><?php echo $produto['local'] ?? 'sem local'; ?></td>

                        <?php
                        $valor_total = (float)$produto['preco'] * (int)$produto['qtd_estoque'];
                        $total_geral += $valor_total;
                        $total_unidades += (int)$produto['qtd_estoque'] ;
                        ?>

                        <td><?php echo $valor_total ?></td>
                        <td>Critico</td>
                        <td>
                        <a href="?deletar=<?php echo $produto['id']; ?>">
                            <img src="./img/trash.png" class="lixo_icon">
                        </a>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
        </section>
    </main>
    <footer class="footer">
        <p><?php echo $qtd_produtos?> produto(s) cadastrados.
            <?php echo $total_unidades?> unidade(s) total</p>
        <p id="chama-o-dev">@Desenvolvido por: Chama o Dev</p>
        <p class="valor_total">Valor Total: <span>R$ <?php echo $total_geral ?></span></p>
    </footer>
</body>

</html>