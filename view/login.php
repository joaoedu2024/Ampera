<?php
if (isset($_SESSION['id_perfil'])) { // se já estiver logado vai para menu
    header("Location: menu");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="/Ampera/view/CSS/login.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
</head>

<body>
    <div class="login-container">
        <h1>Faça Login</h1>

        <div class="need-account">
            Não tem uma conta? <a href="cadastro" id="registroText">Registre-se</a>
        </div>

        <br><br>
        <form action="/Ampera/autenticar" method="POST">
            <div class="floating-label-container">
                <input type="text" name="login" placeholder=" " />
                <label for="login">Login</label>
            </div>
            <div class="floating-label-container">
                <input type="password" name="senha" placeholder=" " />
                <label for="senha">Senha</label>
            </div>

            <br>
            <button class="login-btn" id="entrarText" type="submit">Entrar</button>
        </form>
        <div class="divider">ou</div>

        <button class="google-btn"><img src="/Ampera/imagens/google.png" class="google">Continuar com o Google</button>

        <div class="forgot-password">
            <a href="#">Esqueceu a senha?</a>
        </div>
    </div>
</body>
</html>