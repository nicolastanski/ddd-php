<?php

use Alura\Arquitetura\Dominio\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfInvalidoDeveRetornarUmaExecao()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cpf('111222333');
    }

    public function testCpfValidoDeveRetornarUmaString()
    {
        $cpf = new Cpf('123.456.789-00');
        $this->assertSame('123.456.789-00', (string) $cpf);
    }
}