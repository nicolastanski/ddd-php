<?php

namespace Alura\Arquitetura\Dominio\Aluno;

class AlunoCom2Telefones extends \DomainException
{
    public function __construct()
    {
        parent::__construct('Aluno já possuir 2 telefones cadastrados');
    }
}