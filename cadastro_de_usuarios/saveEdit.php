<?php

include_once('config.php');

// Verifica se o formulário foi enviado
if (isset($_POST['update'])) {
    // Obtém os dados do formulário
    $id = $_POST['id'];  // Aqui você precisa garantir que o id seja obtido corretamente (pode ser de $_GET ou $_POST)

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];

    // Se a senha foi modificada, aplica a função de hash
    if (!empty($_POST['senha'])) {
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    } else {
        // Caso a senha não tenha sido modificada, mantém a senha atual
        $sqlSelect = "SELECT senha FROM tb_usuario WHERE id = $id";
        $result = mysqli_query($conn, $sqlSelect);
        $user_data = mysqli_fetch_assoc($result);
        $senha = $user_data['senha'];
    }

    // Atualiza o estado
    $sqlUpdateEstado = "UPDATE tb_estado SET nome = '$estado' WHERE nome = '$estado'";
    mysqli_query($conn, $sqlUpdateEstado);

    // Atualiza o endereço
    $sqlUpdateEndereco = "UPDATE tb_endereco SET cidade = '$cidade', cep = '$cep', id_estado = (SELECT id FROM tb_estado WHERE nome = '$estado' LIMIT 1) WHERE id = (SELECT id_endereco FROM tb_usuario WHERE id = $id LIMIT 1)";
    mysqli_query($conn, $sqlUpdateEndereco);

    // Atualiza o telefone
    $sqlUpdateTelefone = "UPDATE tb_telefone SET numero = '$telefone' WHERE id_usuario = $id";
    mysqli_query($conn, $sqlUpdateTelefone);

    // Atualiza os dados do usuário
    $sqlUpdateUsuario = "UPDATE tb_usuario SET nome = '$nome', email = '$email', cpf = '$cpf', sexo = '$sexo', data_nascimento = '$data_nascimento', senha = '$senha' WHERE id = $id";
    mysqli_query($conn, $sqlUpdateUsuario);

    // Redireciona após a atualização
    header('Location: sistema.php');
}

?>
