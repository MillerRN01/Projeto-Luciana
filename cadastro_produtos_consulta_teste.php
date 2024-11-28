<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "mcb";

// Estabelecer a conexão
$conn = new mysqli($host, $username, $password, $database);

// Verificar se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Executar a consulta
$querySelecao = "SELECT produto, preco, data_produto, quantidade, fornecedor, categoria, vencimento_produto, foto_produto, foto_comprovante FROM cadastro_produtos";
$resultado = $conn->query($querySelecao);

// Verificar se a consulta foi executada com sucesso
if ($resultado) {
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Data do Produto</th>
                <th>Quantidade</th>
                <th>Fornecedor</th>
                <th>Categoria</th>
                <th>Vencimento do Produto</th>
                <th>Foto do Produto</th>
                <th>Foto do Comprovante</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($aquivos = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td align="center"><?php echo $aquivos['produto']; ?></td>
                    <td align="center"><?php echo $aquivos['preco']; ?></td>
                    <td align="center"><?php echo $aquivos['data_produto']; ?></td>
                    <td align="center"><?php echo $aquivos['quantidade']; ?></td>
                    <td align="center"><?php echo $aquivos['fornecedor']; ?></td>
                    <td align="center"><?php echo $aquivos['categoria']; ?></td>
                    <td align="center"><?php echo $aquivos['vencimento_produto']; ?></td>
                    <td align="center">
                        <?php
                        // Recuperar a imagem do banco de dados
                        $foto_produto = $aquivos['foto_produto'];
                        // Exibir a imagem
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($foto_produto) . '" width="100" height="100" />';
                        ?>
                    </td>
                    <td align="center">
                        <?php
                        // Recuperar a imagem do banco de dados
                        $foto_comprovante = $aquivos['foto_comprovante'];
                        // Exibir a imagem
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($foto_comprovante) . '" width="100" height="100" />';
                        ?>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <?php
} else {
    echo "Erro ao executar a consulta: " . $conn->error;
}
?>