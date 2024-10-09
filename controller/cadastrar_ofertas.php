<?php
require_once('../model/conexao.php');

session_start();

$id_perfil = $_SESSION['id_perfil'];
var_dump($id_perfil);
$nome =         $_POST["nome"];
$descricao =    $_POST["descricao"];
$categoria =    $_POST["categoria"];
$contato =      $_POST["contato"];
$email =        $_POST["email"];
$status =       $_POST["status"];

// Verificar se o arquivo foi enviado
if (isset($_FILES['nome_foto']) && $_FILES['nome_foto']['error'] == UPLOAD_ERR_OK) {
    // Processar o upload da foto
    $uploadDir = '../imagens/';
    $uploadFile = $uploadDir . basename($_FILES['nome_foto']['name']);

    // Mover o arquivo para o diretório desejado
    if (move_uploaded_file($_FILES['nome_foto']['tmp_name'], $uploadFile)) {
        $nome_foto = $_FILES['nome_foto']['name']; // Pegar o nome do arquivo
    } else {
        die("Erro ao fazer upload da foto.");
    }
} else {
    die("Nenhuma foto enviada.");
}

$sql = "INSERT INTO ofertas (nome, descricao, categoria, contato, email, status, nome_foto, id_perfil) 
        VALUES (:nome, :descricao, :categoria, :contato, :email, :status, :nome_foto, :id_perfil);";

$ins = $pdo->prepare($sql);
if ($ins === false) {
    die('Prepare failed: ' . htmlspecialchars($pdo->errorInfo()[2]));
}

$ins->bindParam(':nome', $nome);
$ins->bindParam(':descricao', $descricao);
$ins->bindParam(':categoria', $categoria);
$ins->bindParam(':contato', $contato);
$ins->bindParam(':email', $email);
$ins->bindParam(':status', $status);
$ins->bindParam(':nome_foto', $nome_foto);
$ins->bindParam(':id_perfil', $id_perfil);

if ($ins->execute()) {
    header("Location: /Ampera/menu");
} else {
    echo "Erro: " . implode(", ", $ins->errorInfo());
}
