<?php

use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDTO;
use Alura\Arquitetura\Academico\Infra\Aluno\RepositorioAlunoMemoria;
use Alura\Arquitetura\Shared\Dominio\Cpf;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        $dadosAluno = new MatricularAlunoDTO(
            '123.456.789-00',
            'Teste',
            'email@example.com'
        );

        $repositorioAluno = new RepositorioAlunoMemoria();
        $useCase = new MatricularAluno($repositorioAluno);
        $useCase->executa($dadosAluno);

        $aluno = $repositorioAluno->buscarPorCpf(new Cpf('123.456.789-00'));
        $this->assertSame('Teste', (string) $aluno->nome());
        $this->assertSame('email@example.com', (string) $aluno->email());
        $this->assertEmpty($aluno->telefones());
    }
}