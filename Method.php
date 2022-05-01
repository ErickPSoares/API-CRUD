<?php

require_once "Conexao.php";

class Method extends Conexao
{

    function getAll()
    {
            $pdo = $this->conexao();
            $sql = $pdo->prepare("SELECT * FROM pessoa");
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($resultado);
    }

    function get(int $id)
    {
            $pdo = $this->conexao();
            $sql = $pdo->prepare("SELECT * FROM pessoa WHERE idPessoa = ?");
            $sql->execute(array($id));
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($resultado);
    }

    function post()
    {
            $data = json_decode(file_get_contents("php://input"), true);
            $pdo = $this->conexao();
            $sql = $pdo->prepare("INSERT INTO pessoa VALUES (NULL, ?, ?, ?, ?, ?, ?, ?) ");
            $sql->execute(array(
                $data['nome'], $data['logradouro'], $data['descricao'],
                $data['numero'], $data['cep'], $data['nascimento'], $data['telefone']
            ));
    }

    function put(int $id)
    {
            $data = json_decode(file_get_contents("php://input"), true);
            $pdo = $this->conexao();
            $sql = $pdo->prepare("UPDATE pessoa SET nome = ?, logradouro = ?
            , descricao = ?, numero = ?, cep = ?, nascimento = ?, telefone = ? WHERE idPessoa = ?");
            $sql->execute(array(
                $data['nome'], $data['logradouro'], $data['descricao'],
                $data['numero'], $data['cep'], $data['nascimento'], $data['telefone'], $id
            ));
    }
    function delete(int $id)
    {
            $pdo = $this->conexao();
            $sql = $pdo->prepare("DELETE FROM pessoa WHERE idPessoa = ?");
            $sql->execute(array($id));
    }
}
