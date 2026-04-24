<?php
require_once 'init.php';

if(!isset($_SESSION['usuario'])){
    header("Location: login/login.php");
    exit;
}



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
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body>
    <header class="menu">
        <img src="imagens/logo-sem-fundo.png" alt="">
        <div class="title-header">
            <img src="imagens/estoque-pronto.png" alt="">
            <h2>Controle de Estoque</h2>
        </div>
        <a href="cadastro.php" class="title-header btn_cadastrar_produto">cadastrar produto</a>
    </header>
    <main class="main_index">
        <section class="list_estoque">
            <form method="GET" class="estoque">
                <div class="filtro" >
                    <img src="img/funnel.png" alt="">
                    <p>Filtro:</p>
                    <select name="" id="" class="filtragem">
                        <option value="">Todas Categorias</option>
                        <?php 
                            foreach($_SESSION['produtos'] as $produto) {
                                $categorias[] = $produto['categoria'];
                            }
                            $categorias = array_unique($categorias);
                            $filtro = $_GET['fornecedor'] ?? '';

                            foreach($categorias as $categoria): 
                        ?>
                        <option value="" <?php ($categoria === $filtro) ? 'selected' : '' ?>><?php echo "$categoria";?></option>
                        <?php endforeach; ?>
                    </select>   
                    <select name="" id="" class="filtragem">
                        <option value="">Todos Locais</option>
                        <?php 
                            foreach($_SESSION['produtos'] as $produto) {
                                $locais[] = $produto['local'];
                            }
                            $locais = array_unique($locais);

                            foreach($locais as $local): 
                        ?>
                        <option value=""><?php echo "$local";?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="" id="" class="filtragem">
                        <option value="">Todos Status</option>
                        <option value="">Bom</option>
                        <option value="">Razoavel</option>
                        <option value="">Critico</option>
                    </select>
                    <select name="fornecedor" class="filtragem">
                        <option value="">Todos os fornecedores</option>
                        <?php 
                            foreach($_SESSION['produtos'] as $produto) {
                                $fornecedores[] = $produto['fornecedor'];
                            }
                            $fornecedores = array_unique($fornecedores);
                            $filtro = $_GET['fornecedor'] ?? '';

                            foreach($fornecedores as $fornecedor): 
                        ?>
                        <option value="<?php htmlspecialchars($fornecedor); ?>" <?php ($fornecedor === $filtro) ? 'selected' : '' ?>>
                            <?php echo "$fornecedor";?><?php htmlspecialchars($fornecedor) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <table>
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
                        <td></td>
                    </tr> 
                    <?php 
                        $total_geral = 0;
                        $total_unidades = 0;
                        $qtd_produtos = count($_SESSION['produtos']); 
                    ?>
                    <?php foreach ($_SESSION['produtos'] as $produto) {?> 
                    <?php if($filtro && $produto['fornecedor'] !== $filtro) continue; ?>
                    <tr>
                        <td><span class="negrito">
                            <?php 
                                echo $produto['nome'];
                                htmlspecialchars($produto['fornecedor']);
                            ?></span></td>
                        <td><?php echo $produto['categoria'] ?></td>

                        <td class='crementos' >
                            <a href="?decrementar=<?php echo $produto ['id']; ?>">➖</a>
                            </td>         
                        <td><?php echo $produto['qtd_estoque'] ?></td>

                        <td class='crementos' >
                            <a href="?incrementar=<?php echo $produto ['id']; ?>">➕</a>
                        </td>

                        <td>R$ <?php echo $produto['preco'] ??'sem preço';?></td>
                        <td><?php echo $produto['fornecedor'] ??'Sem fornecedor'; ?><?= htmlspecialchars($produto['fornecedor']) ?></td>
                        <td><?php echo $produto['local'] ?? 'sem local'; ?></td>

                        <?php
                        $valor_total = (float)$produto['preco'] * (int)$produto['qtd_estoque'];
                        $total_geral += $valor_total;
                        $total_unidades += (int)$produto['qtd_estoque'] ;
                        ?>

                        <td><span class="negrito">R$ <?php echo $valor_total ?></span></td>
                        <td>
                        <?php
                            $estoque = $produto['qtd_estoque'] ?? 0;
                            if($estoque >= 50) {
                                echo '<p class="status_bom">Bom</p>';
                            }elseif ($estoque < 50 && $estoque >= 20 ) {
                                echo '<p class="status_razoavel">Razoavel</p>';
                            }elseif ($estoque < 20) {
                                echo '<p class="status_critico">Critico</p>';
                            }
                        ?>
                        </td>
                        <td>
                            <a href="?deletar=<?php echo $produto['id']; ?>">
                                <img src="./img/trash.png" class="lixo_icon" alt="">
                            </a>
                        </td>
                        <td>
                            <a href="editarProduto.php?editar=<?php  echo $produto['id'];?>"><img src="imagens/editar.png" alt="imagem para editar o produto">
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="6">
                            <p><?php echo $qtd_produtos?> produto(s) cadastrados.
                            <?php echo $total_unidades?> unidade(s) total</p>
                        </td>
                        <td colspan="6">
                            <p class="valor_total">Valor Total: <span>R$ <?php echo $total_geral ?></span></p>
                        </td>
                    </tr>
                </table>
            </form>
        </section>
    </main>
</body>

</html>