<?php

namespace Alura\Arquitetura\Dominio;

use Alura\Arquitetura\Dominio\Evento;

abstract class OuvinteEvento
{
    public function processa(Evento $evento)
    {
        if ($this->sabeProcessar($evento)) {
            $this->reageAo($evento);
        }
    }

    abstract public function sabeProcessar(Evento $evento): bool;
    abstract public function reageAo(Evento $evento): void;
}