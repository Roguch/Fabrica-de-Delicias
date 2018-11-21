<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 27/04/18
 * Time: 10:08
 */
require 'Fornecedor.php';

class CrudFornecedor
{
    private $conexao;

    public function getFornecedores()
    {
        $this->conexao = DBConnection::getConexao();

        $sql = 'select * from fornecedor';

        $resultado = $this->conexao->query($sql);
        $fornecedores = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $listaFornecedores = [];

        foreach ($fornecedores as $fornecedore) {
            $listaFornecedores[] = new Fornecedor($fornecedore['cnpj'], $fornecedore['nome'],$fornecedore['email'],$fornecedore['telefone']);
        }


        return $listaFornecedores;

    }

    public function getFornecedor($cnpj)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "select * from fornecedor WHERE cnpj = $cnpj";

        $resultado = $this->conexao->query($sql);
        $fornecedor = $resultado->fetch(PDO::FETCH_ASSOC);

        $listaFornecedor = new Fornecedor($fornecedor['cnpj'], $fornecedor['nome'], $fornecedor['email'],$fornecedor['telefone']);


        return $listaFornecedor;
    }
    public function insertFornecedor(Fornecedor $for){
        $this->conexao = DBConnection::getConexao();
        $cnpj = $for->getCnpj();
        $nome = $for->getNome();
        $email = $for->getEmail();
        $telefone = $for->getTelefone();
        $this->conexao->exec("insert into fornecedor(cnpj,nome,email,telefone) VALUES(' $cnpj','$nome','$email','$telefone')");

    }
    public function atualizaFornecedor(Fornecedor  $for, $cnpj){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $for->getNome();
        $dados[] = $for->getEmail();
        $dados[] = $for->getTelefone();
        $sql = "UPDATE fornecedor SET nome = '$dados[0]', email = '$dados[1]', telefone = '$dados[2]'WHERE cnpj = $cnpj";
        $this->conexao->exec($sql);
    }
    public function excluirFornecedor($cnpj){
        $this->conexao = DBConnection::getConexao();
        $sql ="delete from fornecedor WHERE cnpj = $cnpj";
        $this->conexao->exec($sql);

    }
    public function achaFornecedor($login)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "SELECT cnpj FROM fornecedor WHERE nome = '$login'";

        $resultado = $this->conexao->query($sql);

        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
        return $usuario['cnpj'];

    }

}
