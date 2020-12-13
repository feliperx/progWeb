<?php
/**
 * @author  Felipe Xaud
 */
class Pessoa extends TRecord
{
    const TABLENAME = 'pessoa';
    const PRIMARYKEY= 'id_pessoa';
    const IDPOLICY =  'max'; // {max, serial}
    
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('nome');
        parent::addAttribute('cpf');
        parent::addAttribute('data_nascimento');
        parent::addAttribute('rg');
        parent::addAttribute('sexo');
        parent::addAttribute('cep');
        parent::addAttribute('endereco');
        parent::addAttribute('numero');
        parent::addAttribute('bairro');
        parent::addAttribute('cidade');
        parent::addAttribute('estado');
        parent::addAttribute('nome_pai');
        parent::addAttribute('nome_mae');
        parent::addAttribute('telefone');
        parent::addAttribute('email');
    }
}