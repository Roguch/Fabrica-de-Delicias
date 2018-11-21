<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 23/05/18
 * Time: 14:33
 */
require "Usuario.php";
class CrudUsuario
{

    private $conexao;

    public function getUsuarios()
    {
        $this->conexao = DBConnection::getConexao();

        $sql = 'select * from usuario';

        $resultado = $this->conexao->query($sql);
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $listaUsuario = [];

        foreach ($usuarios as $usuario) {
            $listaUsuario[] = new Usuario($usuario['cpf'], $usuario['tip_user_id'], $usuario['email'], $usuario['nome'], $usuario['login'], $usuario['senha'], $usuario['telefone']);
        }


        return $listaUsuario;

    }

    public function getUsuario($id){
        $this->conexao = DBConnection::getConexao();
        $sql = "select * from usuario WHERE cpf = $id";

        $resultado = $this->conexao->query($sql);
        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

        $listaUsuario = new Usuario($usuario['cpf'], $usuario['tip_user_id'], $usuario['email'], $usuario['nome'], $usuario['login'], $usuario['senha'], $usuario['telefone']);


        return $listaUsuario;
    }
    public function validaUsuario($login,$senha)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";

        $resultado = $this->conexao->query($sql);

        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($usuario == null){
            return null;
        }else{

            $listaUsuario = new Usuario($usuario['cpf'], $usuario['tip_user_id'], $usuario['email'], $usuario['nome'], $usuario['login'], $usuario['senha'], $usuario['telefone']);
            return $listaUsuario;
        }

    }
    public function achaUsuario($login)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "SELECT cpf FROM usuario WHERE login = '$login'";

        $resultado = $this->conexao->query($sql);

        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

        return $usuario['cpf'];

    }


    public function insertUsuario(Usuario $user)
    {
        $this->conexao = DBConnection::getConexao();
        $cpf     = $user->getCpf();
        $email   = $user->getEmail();
        $nome    = $user->getNome();
        $login   = $user->getLogin();
        $senha   = $user->getSenha();
        $telefone = $user->getTelefone();
        $this->conexao->exec("insert into usuario(cpf,tip_user_id,email,nome,login,senha,telefone) VALUES('$cpf',1,'$email','$nome','$login','$senha','$telefone')");

    }

    public function atualizaUsuario(Usuario $user, $cpf)
    {
        $this->conexao = DBConnection::getConexao();
        $dados[] = $user->getCpf();
        $dados[] = $user->getTipo_user();
        $dados[] = $user->getEmail();
        $dados[] = $user->getNome();
        $dados[] = $user->getLogin();
        $dados[] = $user->getSenha();
        $dados[] = $user->getTelefone();
        $sql = "UPDATE usuario SET tip_user_id = '$dados[1]', email = '$dados[2]',nome = '$dados[3]',login = '$dados[4]',senha = '$dados[5]',telefone = '$dados[6]' WHERE cpf = $cpf";
        $this->conexao->exec($sql);
    }

    public function excluirUsuario($cpf)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "delete from usuario WHERE cpf = $cpf";
        $this->conexao->exec($sql);

    }
}
