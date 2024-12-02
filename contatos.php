<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "site_pessoal";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$message = ""; // Variável para armazenar a mensagem de sucesso ou erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    $sql = "INSERT INTO contatos (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $telefone, $mensagem);

    if ($stmt->execute()) {
        $message = "<div class='message success'>Mensagem enviada com sucesso!</div>";
    } else {
        $message = "<div class='message error'>Erro ao enviar a mensagem: " . $stmt->error . "</div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Menu de navegação -->
    <nav class="nav-menu">
        <a href="index.html" class="nav-item">Início</a>
        <a href="portfolio.php" class="nav-item">Portfólio</a>
    </nav>

    <!-- Contêiner principal -->
    <div class="central-container">
        <h1>Contatos</h1>
        
        <!-- Formulário de contato -->
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone">
            
            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" required></textarea>
            
            <button type="submit">Enviar</button>
        </form>

        <!-- Exibição da mensagem de sucesso ou erro -->
        <div class="message-container">
            <?php if ($message): ?>
                <div class="message-wrapper">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Botão Voltar (fora da div de mensagem) -->
        <?php if ($message && strpos($message, 'sucesso') !== false): ?>
            <div class="botao-voltar-container">
                <a href="index.html" class="nav-item voltar-botao show">Voltar</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>