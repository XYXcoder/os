<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="cadastro.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Preparar dados para inserção ou atualização
    $username = $_POST["nome"];
    $email = $_POST["email"];
    $password = ($_POST["senha"]);

    // Verifica se é uma inserção (se não houver ID) ou atualização (se houver ID)
    if (empty($_POST["id"])) {
        // Inserção de novo aluno
        $sql = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";
    } else {
        // Atualização de aluno existente
        $id = $_POST["id"];
        $sql = "UPDATE escola SET username='$username', email='$email', password='$password' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao salvar dados: " . $conn->error;
    }

    $conn->close();
}
?>