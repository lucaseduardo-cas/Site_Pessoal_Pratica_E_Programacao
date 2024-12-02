<?php
// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$db = "site_pessoal";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="nav-menu">
        <a href="index.html" class="nav-item">Início</a>
        <a href="contatos.php" class="nav-item">Contatos</a>
    </nav>
    <div class="main-section">
        <h1>Portfólio</h1> <!-- Adicione esta linha -->
        <div class="timeline-container">
            <?php
            // Consultar o banco de dados para obter os projetos
            $sql = "SELECT ano, nome, descricao FROM portfolio";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='box'>";
                    echo "<div class='points'></div>"; // Apenas o ponto
                    echo "<div class='year'>" . htmlspecialchars($row['ano']) . "</div>"; // Ano
                    echo "<div class='content'>";
                    echo "<h3>" . htmlspecialchars($row['nome']) . "</h3>"; // Nome do projeto
                    echo "<p>" . htmlspecialchars($row['descricao']) . "</p>"; // Descrição do projeto
                    echo "</div>"; // Fechar content
                    echo "</div>"; // Fechar box
                }
            } else {
                echo "<p>Sem projetos cadastrados no momento.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>