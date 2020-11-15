<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pessoa
 *
 * @author felipex
 */
class Pessoa { //usando POO no php
    
    private $nome; 
    private $cpf; 
    
    function __construct($cpf) {
        $this->cpf = $cpf;
    }

    
    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setCpf($cpf): void {
        $this->cpf = $cpf;
    }

    
} 

$p = new Pessoa("123 456 123 12"); 

$p->setNome("Felipe"); 

echo $p->getNome(); 
echo '<br>';
echo $p->getCpf();
