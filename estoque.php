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
    <title>Consulta de Cliente</title>
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
    // Definir a variável $nome
    // Definir a variável $nome
    if (isset($_POST['nome_produto'])) {
        $produto = $_POST['nome_produto'];
    } else {
        $produto = '';
    }

    // Executar a consulta
    $query = "SELECT * FROM produto WHERE nome_produto LIKE '%$produto%'";
    $result = executarConsulta($conn, $query);

    //select//
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='container mt-5' style='justify-content: center; flex-direction: column'>";
        echo "<h1>Resultado da consulta</h1>";
        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Produto</th>";
        echo "<th>Cliente</th>";
        echo "<th>Forma de Pagamento</th>";
        echo "<th>Descrição do Produto</th>";
        echo "<th>Preço do Produto</th>";
        echo "<th>Imagem do Produto</th>";
        echo "<th>Categoria do Produto</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["nome_produto"] . "</td>";
            echo "<td>" . $row["nome_cliente"] . "</td>";
            echo "<td>" . $row["forma_pagamento_produto"] . "</td>";
            echo "<td>" . $row["descricao_produto"] . "</td>";
            echo "<td>" . $row["preco_produto"] . "</td>";
            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row["image_produto"]) . "' width='100' height='100'></td>";
            echo "<td>" . $row["categoria_produto"] . "</td>";
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