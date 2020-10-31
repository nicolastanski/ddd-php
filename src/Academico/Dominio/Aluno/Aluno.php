<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;


use Alura\Arquitetura\Academico\Dominio\Email;
use Alura\Arquitetura\Shared\Dominio\Cpf;

class Aluno
{
    private Cpf $cpf;
    private string $nome;
    private Email $email;
    /** @var Telefone */
    private array $telefones;

    public function __construct(Cpf $cpf, string $nome, Email $email)
    {
        $this->cpf = $cpf; 
        $this->nome = $nome;
        $this->email = $email;
        $this->telefones = [];
    }
    
    public static function comCpfNomeEEmail(string $numeroCpf, string $nome, string $email)
    {
        return new Aluno(new Cpf($numeroCpf), $nome, new Email($email));
    }

    public function adicionarTelefone(string $ddd, string $numero)
    {
        if(count($this->telefones) === 2) {
            throw new AlunoCom2Telefones();
        }
        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }

    public function cpf(): Cpf
    {
        return $this->cpf;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function telefones(): array
    {
        return $this->telefones;
    }
}