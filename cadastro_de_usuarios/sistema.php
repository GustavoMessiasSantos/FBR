<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
$logado = $_SESSION['email'];

// Lógica de busca
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM tb_usuario WHERE id LIKE '%$data%' OR nome LIKE '%$data%' OR email LIKE '%$data%' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM tb_usuario ORDER BY id DESC";
}

// Query com junção de tabelas
$sql = "
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
ORDER BY u.id DESC
";

// Executa a query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Sistema do Usuário</title>
</head>
<body class="body-sistema">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #003366;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Usuário</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ms-3">
                        <a class="nav-link text-white" href="sistema.php">Perfil</a>
                    </li>
                    <li class="nav-item ms-5">
                        <a class="nav-link text-white" href="logout.php" style="background-color: #FF7043; padding: 8px 16px; border-radius: 5px;">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <?php
    echo "<h1>Bem vindo! <u>$logado</u></h1>";
    ?>

    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>

    <style>
    .table-bg {
        background: rgba(34, 49, 63, 0.8);
        border-radius: 15px;
    }
    .box-search {
        display: flex;
        justify-content: center;
        gap: .1%;
    }
    </style>

    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Cep</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['id'] . "</td>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $user_data['email'] . "</td>";
                    echo "<td>" . $user_data['senha'] . "</td>";
                    echo "<td>" . $user_data['telefone'] . "</td>";
                    echo "<td>" . $user_data['genero'] . "</td>";
                    echo "<td>" . $user_data['cpf'] . "</td>";
                    echo "<td>" . $user_data['data_nascimento'] . "</td>";
                    echo "<td>" . $user_data['cidade'] . "</td>";
                    echo "<td>" . $user_data['cep'] . "</td>";
                    echo "<td>" . $user_data['estado'] . "</td>";
                    echo "<td>
                            <a class='btn btn-primary' href='edit.php?id=" . $user_data['id'] . "'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                                </svg>
                            </a>
                            <a class='btn btn-danger' href='delete.php?id=" . $user_data['id'] . "'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H12V0h-8v1H2.5zM6 0h4v1h-4V0z'/>
                                </svg>
                            </a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
