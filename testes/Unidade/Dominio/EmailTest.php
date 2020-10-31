<?php

use Alura\Arquitetura\Dominio\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailNoFormatoInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('e-mail inválido');
    }

    public function testEmailDeveSerRepresentadoComoString()
    {
        $email = new Email('email@test.com');
        $this->assertSame('email@test.com', (string) $email);
    }
}