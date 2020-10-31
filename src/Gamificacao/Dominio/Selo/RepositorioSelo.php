<?php

namespace Alura\Arquitetura\Gamificacao\Dominio\Selo;

use Alura\Arquitetura\Shared\Dominio\Cpf;

interface RepositorioSelo
{
    public function adiciona(Selo $selo): void;
    public function selosDeAlunoComCpf(Cpf $cpf);
}