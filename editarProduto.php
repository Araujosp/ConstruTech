<?php
require_once 'init.php';

//var_dump($_GET);
//exit;

if (isset($_GET['editar'])){
    $produtoEditado =($_GET['editar']);
     foreach ($_SESSION['produtos'] as $key => $produto){
        if($produto['id'] == $produtoEditado){
            $produtoSelecionado=$produto;
            break;
        }
     }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {

        foreach ($_SESSION['produtos'] as $key => $produto) {

            if ($produto['id'] == (int) $_POST['id']) {

                $_SESSION['produtos'][$key]['nome'] = $_POST['nome'] ?? '';
                $_SESSION['produtos'][$key]['preco'] = $_POST['preco'] ?? 0;
                $_SESSION['produtos'][$key]['qtd_estoque'] = $_POST['qtd_estoque'] ?? 0;
                $_SESSION['produtos'][$key]['categoria'] = $_POST['categoria'] ?? '';
                $_SESSION['produtos'][$key]['fornecedor'] = $_POST['fornecedor'] ?? '';
                $_SESSION['produtos'][$key]['local'] = $_POST['local'] ?? '';
                break;
            }
        }
    }
    
    header('Location: index.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar Produto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
        <header class="menu">
        <img src="imagens/logo-sem-fundo.png">
        <div class="title-header">
            <img src="imagens/estoque-pronto.png" alt="">
            <h2>Editar Produto</h2>
        </div>
        <a href="index.php" class="title-header btn_cadastrar_produto">Voltar ao Estoque</a>
    </header>
    <section class="list_incluir_item">
        <form method="POST" class="formulario">

            <input type="hidden" name="id" value="<?php echo $produtoSelecionado['id']; ?>">

            <h1 id="title_main">Editar o Produto</h1>

            <div class="form-grid">
                <div class="form-group">
                    <label>Nome *</label>
                    <input type="text" placeholder="Ex: Furadeira" name="nome" required value ="<?php echo $produtoSelecionado['nome'] ?>">
                </div>
    
                <div class="form-group">
                    <label>Categoria *</label>
                   <select name="categoria" required>
                        <option value="">Selecione</option>
                        <option value="bruto" <?php if ($produtoSelecionado['categoria'] == 'bruto') echo 'selected'; ?>>Bruto</option>
                        <option value="acabamento" <?php if ($produtoSelecionado['categoria'] == 'acabamento') echo 'selected'; ?>>Acabamento</option>
                        <option value="ferramentas" <?php if ($produtoSelecionado['categoria'] == 'ferramentas') echo 'selected'; ?>>Ferramentas</option>
                    </select>
                </div>
    
                <div class="form-group">
                    <label>Quantidade *</label>
                    <input type="text" placeholder="0" name="qtd_estoque" required value ="<?php echo $produtoSelecionado['qtd_estoque'] ?>" >
                </div>
    
                <div class="form-group">
                    <label>Preço Unitário (R$) *</label>
                    <input type="text" placeholder="0,00" name="preco" required value ="<?php echo $produtoSelecionado['preco'] ?>">
                </div>
    
                <div class="form-group">
                    <label>Fornecedor</label>
                    <input type="text" placeholder="Ex: Distribuidora ABC" name = "fornecedor" required value ="<?php echo $produtoSelecionado['fornecedor'] ?>">
                </div>
    
                <div class="form-group">
                    <label>Local</label>
                  <select name="local" required>
                        <option value="">Selecione</option>
                        <option value="Estoque Principal" <?php if ($produtoSelecionado['local'] == 'Estoque Principal') echo 'selected'; ?>>Estoque Principal</option>
                        <option value="Estoque 2" <?php if ($produtoSelecionado['local'] == 'Estoque 2') echo 'selected'; ?>>Estoque 2</option>
                        <option value="Armazém A" <?php if ($produtoSelecionado['local'] == 'Armazém A') echo 'selected'; ?>>Armazém A</option>
                 </select>
                </div>
    
                <div class="form-group full">
                    <input type="submit" value="+ Alterar no Estoque" name="adicionar_item" class="btn">
                </div>
            </div>
        </form>
    </section>
</body>
</html>