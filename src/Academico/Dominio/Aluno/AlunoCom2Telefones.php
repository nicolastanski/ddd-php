<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

class AlunoCom2Telefones extends \DomainException
{
    public function __construct()
    {
        parent::__construct('Aluno já possuir 2 telefones cadastrados');
    }
}