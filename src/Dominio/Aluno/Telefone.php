<?php

namespace Alura\Arquitetura\Dominio\Aluno;

class Telefone
{
    private string $ddd;
    private string $numero;

    public function __construct(string $ddd, string $numero)
    {
        $this->setDDD($ddd);
        $this->setNumero($numero);
    }

    private function setDDD(string $ddd)
    {
        if (preg_match('/[1-9]{2}/', $ddd) !== 1) {
            throw new \InvalidArgumentException('DDD inválido');
        }

        $this->ddd = $ddd;
    }

    private function setNumero(string $numero)
    {
        if (preg_match('/[2-9]{8,9}/', $numero) !== 1) {
            throw new \InvalidArgumentException('Número inválido');
        }

        $this->numero = $numero;
    }

    public function __toString()
    {
        return "({$this->ddd}) {$this->numero}";
    }

    public function ddd(): string
    {
        return $this->ddd;
    }

    public function numero(): string
    {
        return $this->numero;
    }
}