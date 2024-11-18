<?php
    
    if(isset($_POST['submit']))
    {

        include_once('config.php');


        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nascimento = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);


    // Insere o estado na tabela tb_estado
    $sql_insert_estado = "INSERT INTO tb_estado (nome) VALUES ('$estado')";
    mysqli_query($conn, $sql_insert_estado);
    $id_estado = mysqli_insert_id($conn);

    // Insere o endereço na tabela tb_endereco
    $sql_insert_endereco = "INSERT INTO tb_endereco (cidade, cep, id_estado) VALUES ('$cidade', '$cep', $id_estado)";
    mysqli_query($conn, $sql_insert_endereco);
    $id_endereco = mysqli_insert_id($conn);

    // Insere o usuário na tabela tb_usuario
    $sql_insert_usuario = "INSERT INTO tb_usuario (nome, email, cpf, sexo, data_nascimento, id_endereco, senha) VALUES ('$nome', '$email', '$cpf', '$sexo', '$data_nascimento', $id_endereco, '$senha')";
    mysqli_query($conn, $sql_insert_usuario);
    $id_usuario = mysqli_insert_id($conn);

    // Insere o telefone na tabela tb_telefone
    $sql_insert_telefone = "INSERT INTO tb_telefone (numero, id_usuario) VALUES ('$telefone', $id_usuario)";
    mysqli_query($conn, $sql_insert_telefone);

    // Exibe uma mensagem de sucesso
    //echo "Usuário cadastrado com sucesso!";

    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<a href="home.php">Voltar</a>
    <div class="box">
        <form action="" method="POST">
            <fieldset>
                <legend><b>Cadastro de Usuário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label class="labelInput" for="nome">Nome Completo</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label class="labelInput" for="senha">Senha</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label class="labelInput" for="email">Email</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                    <label class="labelInput" for="cpf">CPF</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="telefone" id="telefone" class="inputUser" required>
                    <label class="labelInput" for="telefone">Telefone</label>
                </div>

                <p>Sexo:</p>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>

                <label for="data_nascimento">Data de Nascimento:   </label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>

                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label class="labelInput" for="cidade">Cidade</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label class="labelInput" for="estado">Estado</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="cep" id="cep" class="inputUser" required>
                    <label class="labelInput" for="cep">CEP</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

</body>

</html>