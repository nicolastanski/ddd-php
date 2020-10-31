<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao\BuscarSelosUsuario;

use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioSelo;
use Alura\Arquitetura\Shared\Dominio\Cpf;

class BuscarSelosUsuario
{
    private RepositorioSelo $repositorioSelo;

    public function __construct(RepositorioSelo $repositorioSelo)
    {
        $this->repositorioSelo = $repositorioSelo;
    }
    
    public function execute(BuscarSelosUsuarioDto $dados)
    {
        $cpfAluno = new Cpf($dados->cpfAluno);

        return $this->repositorioSelo->selosDeAlunoComCpf($cpfAluno);
    }
}