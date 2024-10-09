<?php

namespace Model;

class Perfil{

    private $pdo;

    function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function add($nome, $email, $contato, $cpf_cnpj, $data_nasc, $id_endereco, $id_usuarios){
        $qry = "INSERT INTO perfil (nome, email, contato, cpf_cnpj, data_nasc, id_endereco, id_usuarios) VALUES (:nome, :email, :contato, :cpf_cnpj, :data_nasc, null, :id_usuario)";

        $insercao = $this->pdo->prepare($qry);
                
        $insercao->bindParam(':nome', $nome);
        $insercao->bindParam(':email', $email);
        $insercao->bindParam(':contato', $contato);
        $insercao->bindParam(':cpf_cnpj', $cpf_cnpj);
        $insercao->bindParam(':data_nasc', $data_nasc);
        $insercao->bindParam(':id_usuario', $_SESSION['id_last_usuario']);
  
        return $insercao->execute();

    }

    # delete para excluir um usuario

    # update para alterar infos dos usuarios

    # searchById para buscar usuario por id

    # pode incluir searchByNome e/ou searchByLogin também, depende da nescessidade.b       
}