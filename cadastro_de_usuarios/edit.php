<?php

if(!empty($_GET['id'])) {

    include_once('config.php');

    $id = $_GET['id'];
    $sqlSelect = "
        SELECT 
            u.id,
            u.nome,
            u.email,
            u.senha,
            t.numero AS telefone,
            u.sexo AS genero,
            u.cpf,
            u.data_nascimento,
            e.cidade,
            e.cep,
            es.nome AS estado
        FROM tb_usuario u
        LEFT JOIN tb_endereco e ON u.id_endereco = e.id
        LEFT JOIN tb_estado es ON e.id_estado = es.id
        LEFT JOIN tb_telefone t ON u.id = t.id_usuario
        WHERE u.id = $id
        ORDER BY u.id DESC
    ";

    $result = $conn->query($sqlSelect);

    // Verifica se o resultado da consulta foi encontrado
    if($result->num_rows > 0) {
        // Atribui os dados à variáveis
        $user_data = mysqli_fetch_assoc($result);
        $nome = $user_data['nome'];
        $email = $user_data['email'];
        $cpf = $user_data['cpf'];
        $telefone = $user_data['telefone'];
        $sexo = $user_data['genero'];
        $data_nascimento = $user_data['data_nascimento'];
        $cidade = $user_data['cidade'];
        $estado = $user_data['estado'];
        $cep = $user_data['cep'];
        // Criptografa a senha
        $senha = password_hash($user_data['senha'], PASSWORD_BCRYPT);
    } else {
        header('Location: sistema.php');
    }

    // Inserção de dados na tabela tb_estado
    $sql_insert_estado = "INSERT INTO tb_estado (nome) VALUES ('$estado')";
    mysqli_query($conn, $sql_insert_estado);
    $id_estado = mysqli_insert_id($conn);

    // Inserção de dados na tabela tb_endereco
    $sql_insert_endereco = "INSERT INTO tb_endereco (cidade, cep, id_estado) VALUES ('$cidade', '$cep', $id_estado)";
    mysqli_query($conn, $sql_insert_endereco);
    $id_endereco = mysqli_insert_id($conn);

    // Inserção de dados na tabela tb_usuario
    $sql_insert_usuario = "INSERT INTO tb_usuario (nome, email, cpf, sexo, data_nascimento, id_endereco, senha) VALUES ('$nome', '$email', '$cpf', '$sexo', '$data_nascimento', $id_endereco, '$senha')";
    mysqli_query($conn, $sql_insert_usuario);
    $id_usuario = mysqli_insert_id($conn);

    // Inserção de dados na tabela tb_telefone
    $sql_insert_telefone = "INSERT INTO tb_telefone (numero, id_usuario) VALUES ('$telefone', $id_usuario)";
    mysqli_query($conn, $sql_insert_telefone);

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
    <a href="sistema.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar dados do Usuário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label class="labelInput" for="nome">Nome Completo</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" value="<?php echo $user_data['senha'] ?>" required>
                    <label class="labelInput" for="senha">Senha</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                    <label class="labelInput" for="email">Email</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" value="<?php echo $cpf ?>" required>
                    <label class="labelInput" for="cpf">CPF</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>" required>
                    <label class="labelInput" for="telefone">Telefone</label>
                </div>

                <p>Sexo:</p>
                <input type="radio" id="masculino" name="genero" value="masculino" <?php echo ($sexo == 'masculino') ? 'checked' : '' ?> required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo ($sexo == 'feminino') ? 'checked' : '' ?> required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" <?php echo ($sexo == 'outro') ? 'checked' : '' ?> required>
                <label for="outro">Outro</label>
                <br><br>

                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nascimento ?>" required>

                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade ?>" required>
                    <label class="labelInput" for="cidade">Cidade</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado ?>" required>
                    <label class="labelInput" for="estado">Estado</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="cep" id="cep" class="inputUser" value="<?php echo $cep ?>" required>
                    <label class="labelInput" for="cep">CEP</label>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>

</body>

</html>
