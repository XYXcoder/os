<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Conexão com o banco de dados (exemplo básico)
    $servername = "localhost";  // Endereço do servidor MySQL
    $username = "root";         // Nome de usuário do MySQL
    $password = "";             // Senha do MySQL
    $dbname = "escola";      // Nome do banco de dados
    
    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    
    // Obtém os valores do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Protege contra SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    
    // Query para verificar se o usuário existe
    $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        // Usuário autenticado com sucesso
        session_start();
        $_SESSION['username'] = $username;  // Armazena o username na sessão
        
        // Redireciona para a página inicial ou outra página de sucesso
        header("Location: tabelinha.php");
        exit();
    } else {
        // Usuário não encontrado ou credenciais inválidas
        echo "Login falhou. Usuário ou senha inválidos.";
    }
    
    // Fecha a conexão
    $conn->close();
}
?>
