<?php
// Verifica se o ID do aluno foi enviado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conectar ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "escola";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Consulta SQL para selecionar o aluno com base no ID
    $sql = "SELECT * FROM alunos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Extraindo os dados do aluno
        $aluno = $result->fetch_assoc();

        // Exibir formulário para editar o aluno
        ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <title>Editar Aluno</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <div class="container">
                <h1>Editar Aluno</h1>
                <form action="processa_aluno.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo $aluno['nome']; ?>" required><br><br>

                    <label for="email">Email:</label>
                    <input type="date" id="email" name="email" value="<?php echo $aluno['email']; ?>" required><br><br>

                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" value="<?php echo $aluno['telefone']; ?>"><br><br>

                    <label for="valor_mensalidade">Valor Mensalidade:</label>
                    <input type="text" id="valor_mensalidade" name="valor_mensalidade" value="<?php echo $aluno['valor_mensalidade']; ?>" required><br><br>

                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" value="<?php echo $aluno['senha']; ?>" required><br><br>

                    <label for="situacao">Situação:</label>
                    <select id="situacao" name="situacao">
                        <option value="aberta" <?php if ($aluno['situacao'] == 'aberta') echo 'selected'; ?>>Aberta</option>
                        <option value="fechada" <?php if ($aluno['situacao'] == 'fechada') echo 'selected'; ?>>Fechada</option>
                    </select><br><br>

                    <label for="observacao">Observação:</label><br>
                    <textarea id="observacao" name="observacao" rows="4" cols="50"><?php echo $aluno['observacao']; ?></textarea><br><br>

                    <input type="submit" value="Salvar">
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Aluno não encontrado.";
    }

    $conn->close();
} else {
    echo "ID do aluno não especificado.";
}
?>
