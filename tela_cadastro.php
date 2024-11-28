<?php
// Conecta ao banco de dados
$conn = mysqli_connect('localhost', 'root', '', 'app_luciana');

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
  die('Erro ao conectar ao banco de dados: '. mysqli_connect_error());
}

// Recupera os dados do formulário
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$cargo = $_POST['cargo'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];

// Hash da senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Prepara a query
$stmt = mysqli_prepare($conn, "INSERT INTO banco_dados_funcionario (nome, usuario, cargo, email, cpf, telefone, endereco, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
mysqli_stmt_bind_param($stmt, "ssssssss", $nome, $usuario, $cargo, $email, $cpf, $telefone, $endereco, $senha);

// Executa a query
mysqli_stmt_execute($stmt);

// Verifica se a query foi executada com sucesso
if (mysqli_stmt_affected_rows($stmt) > 0) {
  echo 'Cadastro realizado com sucesso!';
} else {
  echo 'Erro ao realizar cadastro: '. mysqli_error($conn);
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);