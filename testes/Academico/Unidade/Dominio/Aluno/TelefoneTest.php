<?php

use Alura\Arquitetura\Dominio\Aluno\Telefone;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
    public function testTelefoneDevePoderSerRepresentadoComoString()
    {
        $telefone = new Telefone('11', '999999999');
        $this->assertSame('(11) 999999999', (string) $telefone);
    }

    public function testRetornaExcecaoPassandoDDDInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('DDD inválido');
        new Telefone('ddd', '999999999');
    }

    public function testRetornaExcecaoPassandoNumeroInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('Número inválido');
        new Telefone('11', 'numero');
    }
}