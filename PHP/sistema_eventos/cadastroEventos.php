<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="vieweport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Eventos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Cadastrar um novo Eventos</h2>
        <form action="salvarEvento.php" method="POST">
            <div class="form-group">
                <label for="titulo">Título do Evento</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="descricao">Organizador</label>
                <textarea id="organizador" name="organizador" required></textarea>
            </div>
            <div class="form-group">
                <label for="data_do_evento">Data do Evento</label>
                <input type="date" id="data_do_evento" name="data_do_evento" required>
            </div>
            <div class="form-group">
                <label for="possivel_arrecadacao">Possível Público</label>
                <input id="possivel_publico" name="possivel_publico" required></>
            </div>
            <div class="form-group">
                <label for="arrecadacao">Provável Arrecadacao</label>
                <input id="arrecadacao" name="arrecadacao" required>
            </div>
            <div class="form-group">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>