<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 06/06/18
 * Time: 14:17
 */


class Controle
{
    private $cpf;
    private $idSor;
    private $data;
    private $descricao;
    private $quantidade;


    public function __construct($cpf,$idSor,$data,$descricao,$quant)
    {
        $this->cpf        =$cpf;
        $this->idSor      =$idSor;
        $this->data       =$data;
        $this->descricao  =$descricao;
        $this->quantidade =$quant;
    }
    public function getCpf()   {return $this->cpf;}
    public function getIdSor() {return $this->idSor;}
    public function getData()  {return $this->data;}
    public function getQuanti(){return $this->quantidade;}
    public function getDescri(){return $this->descricao;}
}