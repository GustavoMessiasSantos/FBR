<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Eventos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Cadastrar um novo Evento</h2>
        <form action="salvarEvento.php" method="POST">
            <div class="form-group">
                <label for="titulo">Título do Evento</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="organizador">Organizador</label>
                <input type="text" id="organizador" name="organizador" required>
            </div>
            <div class="form-group">
                <label for="data_do_evento">Data do Evento</label>
                <input type="date" id="data_do_evento" name="data_do_evento" required>
            </div>
            <div class="form-group">
                <label for="possivel_publico">Possível Público</label>
                <input type="number" id="possivel_publico" name="possivel_publico" required>
            </div>
            <div class="form-group">
                <label for="arrecadacao">Provável Arrecadação</label>
                <input type="number" id="arrecadacao" name="arrecadacao" required>
            </div>
            <div class="form-group">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
