<?php
session_start();
session_destroy();  // Destrói todas as sessões

// Redireciona de volta para a página de login
header("Location: index.php");
exit();
?>
