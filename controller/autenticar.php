<?php
require_once(ROOT_PATH . 'model/conexao.php');
@session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

$query = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login AND senha = :senha");
$query->bindValue(":login", $login);
$query->bindValue(":senha", $senha);
$query->execute();

if($login = '' || $senha == ''){
    header("Location: /Ampera/"); 
    exit();
}

$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);
if ($total_reg > 0) {
    $_SESSION['login'] = $res[0]['login'];
    $_SESSION['id'] = $res[0]['id'];

    // Tem que criar um SELECT para recuperar o id_perfil e gravar na sessão
    //$_SESSION['id_perfil'] = ... continuar com o comando sql

    // Prepara a consulta para buscar o id_perfil com base no id do usuário
    $query_perfil = $pdo->prepare("SELECT id FROM perfil WHERE id_usuarios = :id_usuario");
    $query_perfil->bindValue(":id_usuario", $_SESSION['id']);
    $query_perfil->execute();

    // Armazena o id_perfil na sessão, se encontrado
    $res_perfil = $query_perfil->fetch(PDO::FETCH_ASSOC);
    if ($res_perfil) {
        $_SESSION['id_perfil'] = $res_perfil['id'];
    }
    header("Location: menu");
} else {
    header("Location: /Ampera/");
}