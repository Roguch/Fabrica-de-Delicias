<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 24/05/18
 * Time: 13:43
 */

require "DBConnection.php";
require "Tipo_user.php";
class CrudTipo
{
    private $conexao;

    public function getTipos(){
        $this->conexao = DBConnection::getConexao();

        $sql = 'select * from tipo_user ';
        $resposta = $this->conexao->query($sql);
        $tipos = $resposta->fetchAll(PDO::FETCH_ASSOC);
        $listaTipo = [];
        foreach ($tipos as $tipo){
            $listaTipo[] = new Tipo_user($tipo['id_tip_user'],$tipo['descricao']);
        }
        return $listaTipo;
    }

    public function getTipo($id){
        $this->conexao = DBConnection::getConexao();
        $sql = "select * from tipo_user WHERE id_tip_user = $id";

        $resutado = $this->conexao->query($sql);
        $tipoAchado = $resutado->fetch(PDO::FETCH_ASSOC);
        $tipo = new Tipo_user($tipoAchado['id_tip_user'],$tipoAchado['descricao']);
        return $tipo;
    }
    public function insertTipo(Tipo_user $tipo){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $tipo->getId();
        $dados[] = $tipo->getDescri();
        $sql = "insert into tipo_user(id_tip_user,descricao) VALUES('$dados[0]','$dados[1]')";
        $this->conexao->exec($sql);
    }
    public function updateTipo(Tipo_user $tipo,$id){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $tipo->getDescri();
        $sql = "UPDATE tipo_user SET descricao = '$dados[0]' WHERE id_tip_user = $id";
        $this->conexao->exec($sql);
    }
    public function deleteTipo($id){
        $this->conexao = DBConnection::getConexao();
        $sql = "delete from tipo_user WHERE id_tip_user = $id";
        $this->conexao->exec($sql);
    }
}
$crud = new CrudTipo();
$tipo = new Tipo_user(1,"funcionario");
$crud->insertTipo($tipo);