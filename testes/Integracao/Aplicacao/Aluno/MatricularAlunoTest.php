<?php

use Alura\Arquitetura\Aplicaca\Aluno\MatriculaAluno\MatricularAlunoDTO;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoBancoDeDados()
    {
        $dadosAluno = new MatricularAlunoDTO(
            '123.456.789-00',
            'Nome',
            'email@example.com'
        );

        $pdo = new \Pdo('test', 'test', 'test');
        $repositorioAluno = new RepositorioAlunoPDO($pdo);
        $matriculaAluno = new MatriculaAluno($repositorioAluno);
        $matriculaAluno->executa($dadosAluno);
    }
}