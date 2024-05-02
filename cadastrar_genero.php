<?php
include("conexao.php");

$genero = $_POST['genero'];
$descricao = $_POST['descricao'];
 
$sql = "insert into generos (genero, descricao) values ($genero,'$descricao')";

if($conn->query($sql)){
    echo "registro incluido com sucesso";
}else{
    echo "erro: ".$conn->error;
}
$conn->close();
?>
