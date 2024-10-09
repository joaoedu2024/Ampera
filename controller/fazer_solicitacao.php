<?php
session_start();
require_once("../model/conexao.php");

// Habilita exibição de erros (remover em produção)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Recebe os dados JSON enviados via fetch
$data = json_decode(file_get_contents('php://input'), true);
$id_perfil = $_SESSION['id_perfil'];
$id_oferta = $data['id_oferta'];

if (isset($id_oferta) && isset($id_perfil)) {
    try {
        // Insere o pedido na tabela pedidos
        $sql = "INSERT INTO pedidos (id_ofertas, id_perfil_pedido, `hora_data`) VALUES (:id_ofertas, :id_perfil_pedido, NOW())";
        $query = $pdo->prepare($sql);
        $query->bindParam(':id_ofertas', $id_oferta);
        $query->bindParam(':id_perfil_pedido', $id_perfil);
        $query->execute();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Dados inválidos']);
}
