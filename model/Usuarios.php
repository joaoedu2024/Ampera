<?php

namespace Model;

class Usuarios{

    private $pdo;

    function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function add($login, $nome, $senha){
        $qry = "INSERT INTO usuarios (login, nome, senha) VALUES (:login, :nome, :senha)";

        $insercao = $this->pdo->prepare($qry);
                
        $insercao->bindParam(':login', $login);
        $insercao->bindParam(':nome', $nome);
        $insercao->bindParam(':senha', $senha);
  
        $insercao->execute();

    }

    # delete para excluir um usuario

    # update para alterar infos dos usuarios

    # searchById para buscar usuario por id

    # pode incluir searchByNome e/ou searchByLogin também, depende da nescessidade.b       
}