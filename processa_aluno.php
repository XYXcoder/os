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
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $valor_mensalidade = $_POST["valor_mensalidade"];
    $senha = md5($_POST["senha"]);
    $situacao = $_POST["situacao"];
    $observacao = $_POST["observacao"];

    // Verifica se é uma inserção (se não houver ID) ou atualização (se houver ID)
    if (empty($_POST["id"])) {
        // Inserção de novo aluno
        $sql = "INSERT INTO alunos (nome, email, telefone, valor_mensalidade, senha, situacao, observacao) VALUES ('$nome', '$email', '$telefone', '$valor_mensalidade', '$senha', '$situacao', '$observacao')";
    } else {
        // Atualização de aluno existente
        $id = $_POST["id"];
        $sql = "UPDATE alunos SET nome='$nome', email='$email', telefone='$telefone', valor_mensalidade='$valor_mensalidade', senha='$senha', situacao='$situacao', observacao='$observacao' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao salvar dados: " . $conn->error;
    }

    $conn->close();
}
?>
