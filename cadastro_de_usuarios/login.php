<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a href="home.php">Voltar</a>
    <div class="tela-login">
        <!--tela de login onde serão digitados os dados para logar-->
        <h1 class="login-title">Login</h1>
        <form action="testLogin.php" method="POST">
        <input id="dados-login" name="email" type="text" placeholder="Email">
        <br><br>
        <input id="dados-login" name="senha" type="password" placeholder="Senha">
        <br><br>
        <input class="inputSubmit" type="submit" name="submit" value="Enviar"></input>
        </form>
    </div>
</body>
</html>