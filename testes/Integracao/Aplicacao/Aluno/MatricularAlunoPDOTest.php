<?php

use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDTO;
use Alura\Arquitetura\Infra\Aluno\RepositorioAlunoPDO;
use PHPUnit\Framework\TestCase;

class MatricularAlunoPDOTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoBancoDeDados()
    {
        $dadosAluno = new MatricularAlunoDTO(
            '123.456.789-00',
            'Nome',
            'email@example.com'
        );

        $pdo = new \Pdo('localhost', 'test', 'test');
        $repositorioAluno = new RepositorioAlunoPDO($pdo);
        $matriculaAluno = new MatricularAluno($repositorioAluno);
        $matriculaAluno->executa($dadosAluno);
    }
}