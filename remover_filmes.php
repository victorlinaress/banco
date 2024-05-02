<?php
include("conexao.php");

if(isset($_POST['genero']) && isset($_POST['titulo'])) {
    $genero = $_POST['genero'];
    $titulo = $_POST['titulo'];

    // Consulta SQL para remover o filme
    $sqlRemoverFilme = "DELETE FROM filmes WHERE genero = '$genero' AND titulo = '$titulo'";
    
    if ($conn->query($sqlRemoverFilme) === TRUE) {
        echo "Filme removido com sucesso!";
    } else {
        echo "Erro ao remover filme: " . $conn->error;
    }
} else {
    echo "Dados insuficientes para remover o filme.";
}

$conn->close();
?>





