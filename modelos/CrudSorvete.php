<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 16:01
 */

require 'Sorvete.php';
class CrudSorvete
{
    private $conexao;

    public function getSorvetes()
    {
        $this->conexao = DBConnection::getConexao();

        $sql = 'select * from sorvete';

        $resultado = $this->conexao->query($sql);
        $sovertes = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $listaSorvetes = [];

        foreach ($sovertes as $soverte) {
            $listaSorvetes[] = new Sorvete($soverte['id'],$soverte['nomeSor'], $soverte['sabor'],$soverte['quantidade'],$soverte['validade'],$soverte['dt_ent_es'],$soverte['for_cnpj'],$soverte['user_cpf']);
        }


        return $listaSorvetes;

    }

    public function getSorvete($id)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "select * from sorvete WHERE id = $id";

        $resultado = $this->conexao->query($sql);
        $sor = $resultado->fetch(PDO::FETCH_ASSOC);

        $listaAdmin = new Sorvete($sor['id'],$sor['nomeSor'], $sor['sabor'],$sor['quantidade'],$sor['validade'],$sor['dt_ent_es'],$sor['for_cnpj'],$sor['user_cpf']);


        return $listaAdmin;
    }
    public function getQuanti($id){
        $this->conexao = DBConnection::getConexao();
        $sql = "select quantidade from sorvete WHERE id = $id";
        $resposta = $this->conexao->query($sql);
        $resutado = $resposta->fetch(PDO::FETCH_ASSOC);
        return $resutado;
    }
    public function insertSorvete(Sorvete $sor){
        $this->conexao = DBConnection::getConexao();
        $nome = $sor->getNome();
        $sabor = $sor->getSabor();
        $quantidade = $sor->getQuant();
        $validade = $sor->getValidade();
        $dataEnt = $sor->getdataEnt();
        $cnpj = $sor->getCnpj();
        $cpf = $sor->getCpf();
        $sql = "INSERT  INTO sorvete(id,nomeSor,sabor,quantidade,validade,dt_ent_es,for_cnpj,user_cpf) VALUES(null,'$nome','$sabor','$quantidade','$validade','$dataEnt','$cnpj','$cpf')";
        $this->conexao->exec($sql);

    }
    public function atualizaSorvete(Sorvete  $sor, $id){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $sor->getNome();
        $dados[] = $sor->getSabor();
        $dados[] = $sor->getQuant();
        $dados[] = $sor->getValidade();
        $dados[] = $sor->getCnpj();
        $dados[] = $sor->getdataEnt();
        $dados[] = $sor->getCpf();
        $sql = "UPDATE sorvete SET nomeSor = '$dados[0]', sabor = '$dados[1]', quantidade = '$dados[2]',validade = '$dados[3]',for_cnpj = '$dados[4]',dt_ent_es = '$dados[5]' WHERE id = $id";
        $this->conexao->exec($sql);
    }
    public function excluirSorvete($id){
        $this->conexao = DBConnection::getConexao();
        $sql ="delete from sorvete WHERE id = $id";
        $this->conexao->exec($sql);

    }
    public function  retiraCaixa($person,$id){
        $this->conexao = DBConnection::getConexao();
        $sql  = "UPDATE sorvete SET quantidade = $person WHERE id = $id";
        $this->conexao->exec($sql);
    }
}
