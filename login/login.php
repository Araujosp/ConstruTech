<!doctype html>
<html lang="en">
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
        <form action="" class="form_login">
            <div class="login_campos">
                <label for="">E-mail</label>
                <div class="campo_input">
                    <img src="../img/mail1.png" alt="" class="img_form">
                    <input type="email" placeholder="Email" class="input_login" name="nome">
                </div>
            </div>

            <div class="login_campos">
                <div class="senha_font">
                <label for="">Senha</label>
                <a href="#" class="forget">Esquece a senha</a>
                </div>
                <div class="campo_input">
                    <img src="../img/lock.png" alt="icone_cadeado" class="img_form">
                    <input type="password" placeholder="••••••••" class="input_login" name="senha">
                </div>
            </div>
            <div class="check_forget">
            <input type="checkbox"><label for="" class="text">Manter-me conectado neste canteiro</label>
            </div>
            <a href="#" class="btn_login">
                <img src="../img/hard-hat.png" alt="icone_Capacete" class="img_cap">
                <p>Entrar na Obra</p>
            </a>
            <div class="divider">
                <span class="text_divider">OU</span>
            </div>
            <a href="#" class="btn_login btn_solicitacao">
                <p>Solicitar acesso ao Gestor</p>
            </a>
            <p class="text">Novo na Empresa ? <a href="#" class="new_login">Cadastre seu Perfil</a></p>
        </form>
    </main>
</body>
</html>
