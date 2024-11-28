<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <title>Consulta de Produto</title>
</head>

<div class="container">
    <?php
    // Configurações do banco de dados
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "mcb";

    // Função para conectar ao banco de dados
    function conectarBancoDeDados()
    {
        global $host, $username, $password, $database;
        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            throw new Exception("Falha na conexão com o banco de dados:" . $conn->connect_error);
        }
        return $conn;
    }

    // Função para executar uma consulta de seleção
    function executarConsulta($conn, $query)
    {
        $result = $conn->query($query);
        if (!$result) {
            throw new Exception("Erro ao executar a consulta: " . $conn->error);
        }
        return $result;
    }

    // Conectar ao banco de dados
    $conn = conectarBancoDeDados();

    // Executar a consulta
    $query = "SELECT produto, preco, data_produto, quantidade, fornecedor, categoria, vencimento_produto, foto_produto, foto_comprovante FROM cadastro_produtos";
    $result = executarConsulta($conn, $query);

    //select//
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='container mt-5' style='justify-content: center; flex-direction: column'>";
        echo "<h1>Resultado da consulta</h1>";
        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Produto</th>";
        echo "<th>Preço</th>";
        echo "<th>Data do Produto</th>";
        echo "<th>Quantidade</th>";
        echo "<th>Fornecedor</th>";
        echo "<th>Categoria</th>";
        echo "<th>Vencimento do Produto</th>";
        echo "<th>Foto do Produto</th>";
        echo "<th>Foto do Comprovante</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["produto"] . "</td>";
            echo "<td>" . $row["preco"] . "</td>";
            echo "<td>" . $row["data_produto"] . "</td>";
            echo "<td>" . $row["quantidade"] . "</td>";
            echo "<td>" . $row["fornecedor"] . "</td>";
            echo "<td>" . $row["categoria"] . "</td>";
            echo "<td>" . $row["vencimento_produto"] . "</td>";
            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row["foto_produto"]) . "' width='100' height='100'></td>";
            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row["foto_comprovante"]) . "' width='100' height='100'></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        //a tela de erro//
        echo "<div class='alert alert-warning mt-5'>";
        echo "<h1 class='text-center'><i class='fas fa-exclamation-triangle'></i> Nenhum resultado encontrado</h1>";
        echo "<p class='text-center'>Não foram encontrados resultados para a sua consulta. Tente novamente mais tarde.</p>";
        echo "</div>";
        //script//
        echo "<script>";
        echo "setTimeout(function() { window.location.href = 'estoque.html'; }, 5000);";
        echo "</script>";
    }
    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>
</div>
</body>
<script>

</script>

</html>