<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 24/05/18
 * Time: 13:39
 */

class Tipo_user
{
    private $id;
    private $descricao;

    public function __construct($id,$descri)
    {
        $this->id        = $id;
        $this->descricao = $descri;
    }
    public function getId(){return $this->id;}
    public function getDescri(){return $this->descricao;}
}