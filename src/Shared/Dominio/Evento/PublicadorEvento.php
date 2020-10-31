<?php

namespace Alura\Arquitetura\Shared\Dominio\Evento;

class PublicadorEvento
{
    private array $ouvintes = [];

    public function adicionarOuvinte(OuvinteEvento $ouvinte): void
    {
        $this->ouvintes[] = $ouvinte;
    }

    public function publicar(Evento $evento): void
    {
        foreach($this->ouvintes as $ouvinte) {
            $ouvinte->processa($evento);
        }
    }
}