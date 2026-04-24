<?php

//password_hash("senha1234", PASSWORD_DEFAULT);

require_once '../init.php';

$usuario = [
    [
    'id' => '001',
    'senha' => '$2y$10$6QENX6wAKhTsH/LsrQMI0uLjRh76nu79U/1RgXdQLVbrKQ9C3Av.a',
    'email' => 'adm@construtech.com'
    ]
];

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $email = $_POST["email"];
    $senha = $_POST["senha"];
 
    $loginValido = false;

    foreach($usuario as $user){
            
        if ($user["email"] === $email && password_verify($senha, $user["senha"])){

            $loginValido = true;
            $_SESSION["usuario"] = $email;
            header("Location: ../index.php");
            exit;
        }
    }

    if (!$loginValido) {
        $erro = "Email ou senha incorretos!";
    }
}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles.css">
    <title>Login</title>
</head>
<body class="body_login">
    <main class="main_login">
        <img src="../imagens/logo-sem-fundo.png" alt="logo_png" class="logo_login">

        <h1 class="titulo_login">Acessar Conta</h1>
        <form method="POST" class="form_login">
    
            <div class="login_campos">
                <label>E-mail</label>
                <div class="campo_input">
                    <img src="../img/mail1.png" class="img_form">
                    <input type="email" placeholder="Email" class="input_login"
                    name="email"
                    required>
                </div>
            </div>

            <div class="login_campos">
                <div class="senha_font">
                <label>Senha</label>
                <a href="#" class="forget">Esquece a senha</a>
                </div>
                <div class="campo_input">
                    <img src="../img/lock.png" alt="icone_cadeado" class="img_form">
                    <input type="password" placeholder="••••••••" class="input_login"
                    name="senha"
                    required>
                </div>
            </div>

            <div class="check_forget">
            <input type="checkbox"><label class="text">Manter-me conectado neste canteiro</label>
            </div>

         
            <button type="submit" class = "btn_login"> <img src="../img/hard-hat.png" alt="icone_Capacete" class="img_cap">Entrar</button>
            
            <div>
                <p>Email: <span>adm@construtech.com</span> </p>
                <p>Senha: <span>adm123</span></p>
            </div>
        
        </form>

        <?php if (!empty($erro)): ?>
        <p style="color:red;"><?php echo $erro; ?></p>
        <?php endif; ?>
    </main>
</body>
</html>
