<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 23/05/18
 * Time: 14:24
 */

class Usuario
{
    private $cpf;
    private $tipo_user;
    private $email;
    private $nome;
    private $login;
    private $senha;
    private $telefone;

    public function __construct($cpf = null,$tipo_user = null,$email = null,$nome = null,$login =null,$senha = null,$telefone = null)
    {
        $this->cpf       = $cpf;
        $this->tipo_user = $tipo_user;
        $this->email     = $email;
        $this->nome      = $nome;
        $this->login     = $login;
        $this->senha     = $senha;
        $this->telefone  = $telefone;

    }

    public function getCpf(){return $this->cpf;}
    public function getTipo_user(){
        if ($this->tipo_user == 0){
            return "gerente";
        }else{
            return "funcionario";
        }


        return $this->tipo_user;}
    public function getEmail(){return $this->email;}
    public function getNome(){return $this->nome;}
    public function getLogin(){return $this->login;}
    public function getSenha(){return $this->senha;}
    public function getTelefone(){return $this->telefone;}
    public function getUser_tip(){return $this->tipo_user;}

}