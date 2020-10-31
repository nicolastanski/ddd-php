<?php

namespace Alura\Arquitetura\Academico\Dominio;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Shared\Dominio\Cpf;

class FabricaAluno
{
    private Aluno $aluno;
    
    public function comCpfEmailENome(string $numeroCpf, string $email, string $nome)
    {
        $this->aluno = new Aluno(new Cpf($numeroCpf), $nome, new Email($email));
    }

    public function adicionaTelefone(string $ddd, string $numero): self
    {
        $this->aluno->adicionarTelefone($ddd, $numero);
        return $this;
    }

    public function aluno(): Aluno
    {
        return $this->aluno;
    }
}