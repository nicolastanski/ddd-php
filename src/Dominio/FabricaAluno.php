<?php

use Alura\Arquitetura\Aluno;
use Alura\Arquitetura\Cpf;
use Alura\Arquitetura\Email;

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