<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 27/04/18
 * Time: 10:00
 */

class Fornecedor
{
    private $cnpj;
    private $nome;
    private $email;
    private $telefone;

    public function __construct($cnpj =null,$nome = null,$email = null,$telefone = null)
    {
        $this->cnpj = $cnpj;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;


    }
    public function getCnpj(){return $this->cnpj;}
    public function getNome(){return $this->nome;}
    public function getEmail(){return $this->email;}
    public function getTelefone(){return $this->telefone;}
}
