<?php
include_once('config.php');

// Verifica se o ID foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Exclui os dados do telefone do usuário
    $sqlDeleteTelefone = "DELETE FROM tb_telefone WHERE id_usuario = $id";
    mysqli_query($conn, $sqlDeleteTelefone);

    // Exclui o endereço do usuário
    $sqlDeleteEndereco = "DELETE FROM tb_endereco WHERE id = (SELECT id_endereco FROM tb_usuario WHERE id = $id)";
    mysqli_query($conn, $sqlDeleteEndereco);

    // Exclui os dados do usuário
    $sqlDeleteUsuario = "DELETE FROM tb_usuario WHERE id = $id";
    mysqli_query($conn, $sqlDeleteUsuario);

    // Exclui o estado, se não for mais referenciado por outros usuários
    $sqlDeleteEstado = "DELETE FROM tb_estado WHERE id NOT IN (SELECT id_estado FROM tb_endereco)";
    mysqli_query($conn, $sqlDeleteEstado);

    // Redireciona de volta para a página principal após a exclusão
    header('Location: sistema.php');
} else {
    // Caso o ID não seja passado, redireciona para a página principal
    header('Location: sistema.php');
}
?>