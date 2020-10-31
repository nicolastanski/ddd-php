<?php

namespace Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoMatriculado;
use Alura\Arquitetura\Dominio\Aluno\RepositorioAluno;
use Alura\Arquitetura\Dominio\PublicadorEvento;

class MatricularAluno
{
    private RepositorioAluno $repositorioAluno;
    private PublicadorEvento $publicador;

    public function __construct(RepositorioAluno $repositorioAluno, PublicadorEvento $publicador)
    {
        $this->repositorioAluno = $repositorioAluno;
        $this->publicador = $publicador;
    }

    public function executa(MatricularAlunoDTO $dados): void
    {
        $aluno = Aluno::comCpfNomeEEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
        $this->repositorioAluno->adicionar($aluno);

        $evento = new AlunoMatriculado($aluno->cpf());
        $this->publicador->publicar($evento);
    }
    
}