<?php
    include_once "data.php";
?>

<!doctype html> 
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../styles.css">
        <title>Document</title>
    </head>
    <body>
        <main class="main_cad">
            <img src="../imagens/logo-sem-fundo.png" alt="logo_png" class="logo_login">
            <div class="card_cad">
                <h1 class="titulo_cad">Cadastro</h1>
                <form action="" class="form_cad">
                    <div class="campo_cad">
                        <img src="../img/user.png" alt="">
                        <input type="text" placeholder="Nome Completo" class="input_login">
                    </div>
                    <div class="campo_cad">
                        <img src="../img/mail.png" alt="">
                        <input type="text" placeholder="nome@construtech.com" class="input_login">
                    </div>
                    <div class="campo_cad">
                        <img src="../img/briefcase-business.png" alt="">
                        <input type="text" placeholder="Função" class="input_login">
                    </div>
                    <div class="campo_cad">
                        <img src="../img/id-card.png" alt="">
                        <input type="number" placeholder="ID Colaborador" class="input_login">
                    </div>
                    <a href="login.php" class="btn_login">
                        <img src="../img/hard-hat.png" alt="icone_Capacete" class="img_cap">
                        <p>Finalizar</p>
                    </a>
                </form>
            </div>
        </main>
    </body>
</html>
