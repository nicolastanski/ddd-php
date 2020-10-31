<?php

namespace Alura\Arquitetura\Gamificacao\Infra\Selo;

use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioSelo;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;

class RepositorioSeleMemoria implements RepositorioSelo
{
    private array $selos = [];

    public function adiciona(Selo $selo): void
    {
        $this->selos[] = $selo;
    }

    public function selosDeAlunoComCpf(Cpf $cpf)
    {
        return array_filter($this->selos, fn(Selo $selo) => $selo->cpfAluno() == $cpf);
    }
}