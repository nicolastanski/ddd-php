<?php

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoCom2Telefones;
use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Dominio\Email;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    private Aluno $aluno;

    public function setUp(): void
    {
        $this->aluno = new Aluno(
            $this->createStub(Cpf::class), 
            '', 
            $this->createStub(Email::class)
        );
    }

    public function testAdicionarMaisDe2TelefonesLancaExcecao()
    {
        $this->expectException(AlunoCom2Telefones::class);

        $this->aluno->adicionarTelefone('11', '999999999');
        $this->aluno->adicionarTelefone('51', '999999999');
        $this->aluno->adicionarTelefone('21', '999999999');
    }

    public function testAdicionar1Telefone()
    {
        $this->aluno->adicionarTelefone('11', '999999999');
        $this->assertCount(1, $this->aluno->telefones());
    }

    public function testAdicionar2Telefones()
    {
        $this->aluno->adicionarTelefone('11', '999999999');
        $this->aluno->adicionarTelefone('51', '999999999');

        $this->assertCount(2, $this->aluno->telefones());
    }
}