<?php
include("conexao.php");

if(isset($_POST['genero'])) {
    $genero = $_POST['genero'];

    // Consulta SQL para remover o gênero
    $sqlRemoverGenero = "DELETE FROM generos WHERE genero = '$genero'";
    
    if ($conn->query($sqlRemoverGenero) === TRUE) {
        // Redirecionar de volta para a página principal após a remoção
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao remover gênero: " . $conn->error;
    }
} else {
    echo "ID do gênero não fornecido.";
}

$conn->close();
?>

