<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 06/06/18
 * Time: 14:25
 */


require 'CrudSorvete.php';
require 'Controle.php';



class FunCrontrole
{
    private $conexao;

    public function retirada(Controle $controle){
        $this->conexao = DBConnection::getConexao();
        $quanti = $controle->getQuanti();
        $idSor = $controle->getIdSor();
        $crudSor = new CrudSorvete();
        $crudSor->atualizaQuanti($quanti,$idSor);
        $dados[] = $controle->getCpf();
        $dados[] = $controle->getIdSor();
        $dados[] = $controle->getData();
        $dados[] = $controle->getDescri();
        $dados[] = $controle->getQuanti();
        $sql ="insert into controle(user_cpf,idSor,data,descricao,quantidade) VALUES('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]')";
        $this->conexao->exec($sql);
    }

}

