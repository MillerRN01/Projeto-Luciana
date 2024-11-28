<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "mcb";

// Estabelecer a conexão
$conn = mysqli_connect($host, $username, $password, $database);
// Verificar se a conexão foi estabelecida com sucesso
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST["produto"];
    $preco = $_POST["preco"];
    $data_produto = $_POST["data_produto"];
    $quantidade = $_POST["quantidade"];
    $fornecedor = $_POST["fornecedor"];
    $categoria = $_POST["categoria"];
    $vencimento_produto = $_POST["vencimento_produto"];

    $foto_produto = $_FILES['foto_produto']['tmp_name'];
    $tamanho_foto_produto = $_FILES['foto_produto']['size'];
    $tipo_foto_produto = $_FILES['foto_produto']['type'];
    $nome_foto_produto = $_FILES['foto_produto']['name'];

    $foto_comprovante = $_FILES['foto_comprovante']['tmp_name'];
    $tamanho_foto_comprovante = $_FILES['foto_comprovante']['size'];
    $tipo_foto_comprovante = $_FILES['foto_comprovante']['type'];
    $nome_foto_comprovante = $_FILES['foto_comprovante']['name'];

    if ( $foto_produto != "none" && $foto_comprovante != "none" )
    {
        $fp_foto_produto = fopen($foto_produto, "rb");
        $conteudo_foto_produto = fread($fp_foto_produto, $tamanho_foto_produto);
        $conteudo_foto_produto = addslashes($conteudo_foto_produto);
        fclose($fp_foto_produto);

        $fp_foto_comprovante = fopen($foto_comprovante, "rb");
        $conteudo_foto_comprovante = fread($fp_foto_comprovante, $tamanho_foto_comprovante);
        $conteudo_foto_comprovante = addslashes($conteudo_foto_comprovante);
        fclose($fp_foto_comprovante);

        $queryInsercao = "INSERT INTO cadastro_produtos (produto, preco, data_produto, quantidade, fornecedor, categoria, vencimento_produto, foto_produto, foto_comprovante) VALUES ('$produto', '$preco', '$data_produto', '$quantidade', '$fornecedor', '$categoria', '$vencimento_produto', '$conteudo_foto_produto', '$conteudo_foto_comprovante')";

        if ($conn->query($queryInsercao) === TRUE) {
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar produto: " . $conn->error;
        }
    }
    else
        print "Não foi possível carregar as imagens.";
}
?>