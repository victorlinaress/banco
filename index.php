<?php
include("conexao.php");
?>
<html>
<head>    
    <title>Cadastro de Filmes</title>
</head>
<body>
    <h1>Cadastro de Filmes</h1>
    <form action="cadastrar.php" method="post">
        <label for="genero">Gênero:</label>
        <select name="genero" id="genero">
            <option value="">Selecione uma opção</option>
            <?php
            $sqlGeneros = "SELECT genero, descricao FROM generos WHERE status=1";
            $resultado = $conn->query($sqlGeneros);
            while($row = $resultado->fetch_assoc()) {
                echo "<option value='".$row["genero"]."'>".$row["descricao"]."</option>";
            }
            ?>
        </select>
        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo">
        <input type="submit" value="Enviar">
    </form>

    <h1>Cadastro de Gêneros</h1>
    <form action="cadastrar_genero.php" method="post">
        <label for="genero">Gênero:</label>
        <input type="number" name="genero" id="genero">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao">
        <input type="submit" value="Enviar">
    </form>

    <h1>Gêneros Cadastrados</h1>
    <table border="1">
        <tr>
            <th>Gênero</th>
            <th>Descrição</th>
            <th>Ação</th>
        </tr>
        <?php
        $sqlGeneros = "SELECT genero, descricao FROM generos WHERE status=1";
        $resultadoGeneros = $conn->query($sqlGeneros);
        if ($resultadoGeneros->num_rows > 0) {
            while($row = $resultadoGeneros->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["genero"]."</td>";
                echo "<td>".$row["descricao"]."</td>";
                echo "<td><form action='remover_genero.php' method='post'><input type='hidden' name='genero' value='".$row["genero"]."'><input type='submit' value='Remover'></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum gênero cadastrado</td></tr>";
        }
        ?>
    </table>

    <h1>Filmes Cadastrados</h1>
    <table border="1">
        <tr>
            <th>Gênero</th>
            <th>Título</th>
            <th>Ano</th>
            <th>Ação</th>
        </tr>
        <?php
        $sqlFilmes = "SELECT f.genero, f.titulo, f.ano, g.descricao AS genero_desc FROM filmes f INNER JOIN generos g ON f.genero = g.genero";
        $resultadoFilmes = $conn->query($sqlFilmes);
        if ($resultadoFilmes->num_rows > 0) {
            while($row = $resultadoFilmes->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["genero_desc"]."</td>";
                echo "<td>".$row["titulo"]."</td>";
                echo "<td>".$row["ano"]."</td>";
                echo "<td><form action='remover_filmes.php' method='post'><input type='hidden' name='genero' value='".$row["genero"]."'><input type='hidden' name='titulo' value='".$row["titulo"]."'><input type='submit' value='Remover'></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum filme cadastrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
$conn->close();
?>