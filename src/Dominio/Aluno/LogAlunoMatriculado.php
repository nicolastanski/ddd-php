<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Dominio\Evento;
use Alura\Arquitetura\Dominio\OuvinteEvento;

class LogAlunoMatriculado extends OuvinteEvento
{
    /** @param AlunoMatriculado $alunoMatriculado */
    public function reageAo(Evento $alunoMatriculado): void
    {
        fprintf(
        STDERR, 
    'Aluno com CPF %s foi matriculado na data %s',
    (string) $alunoMatriculado->cpfAluno(),
    $alunoMatriculado->momento()->format('d/M/Y')
        );
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return $evento instanceof AlunoMatriculado;
    }
}