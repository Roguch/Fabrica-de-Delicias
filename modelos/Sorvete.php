<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 25/04/18
 * Time: 14:14
 */

class Sorvete
{
    private $nomeSor;
    private $sabor;
    private $quntidade;
    private $validade;
    private $dt_ent_es ;
    private $cnpj;
    private $cpf ;
    private $id;

    public function __construct($id = null,$nome = null,$sabor = null,$quant = null,$validade = null,$data_ent = null,$cnpj,$cpf)
    {
        $this->id        = $id;
        $this->nomeSor   = $nome;
        $this->sabor     = $sabor;
        $this->quntidade = $quant;
        $this->validade  = $validade;
        $this->cnpj      = $cnpj;
        $this->cpf       = $cpf;
        $this->dt_ent_es = $data_ent;
    }
    public function getId(){return $this->id;}
    public function getNome(){return $this->nomeSor;}
    public function getSabor(){return $this->sabor;}
    public function getQuant(){return $this->quntidade;}
    public function getValidade(){return $this->validade;}
    public function getCnpj(){return $this->cnpj;}
    public function getdataEnt(){return $this->dt_ent_es;}
    public function getCpf(){return $this->cpf;}
}
