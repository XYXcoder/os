<!-- adicionar_aluno.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Abrir OS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Abrir OS</h1>
        <form action="processa_aluno.php" method="POST">
            <label for="nome">Nome funcinario:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="email">Data:</label>
            <input type="date" id="email" name="email" required><br><br>

            <label for="telefone">Tipo de serviço:</label>
            <input type="text" id="telefone" name="telefone"><br><br>

            <label for="valor_mensalidade">Local da OS:</label>
            <input type="text" id="valor_mensalidade" name="valor_mensalidade" required><br><br>

            <label for="senha">Hora de inicio:</label>
            <input type="time" id="senha" name="senha" required><br><br>

            <label for="situacao">Situação:</label>
            <select id="situacao" name="situacao">
                <option value="aberta">ABERTA</option>
                <option value="fechada">FECHADA</option>
            </select><br><br>

            <label for="observacao">Observação:</label><br>
            <textarea id="observacao" name="observacao" rows="4" cols="50"></textarea><br><br>

            <input type="submit" value="Salvar">
        </form>
    </div>
</body>
</html>
