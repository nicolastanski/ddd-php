<?php
 
use Alura\Arquitetura\Academico\Aplicacao\Indicacao\EnviaEmailIndicacao;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;

class EnviaEmailIndicacaoMail implements EnviaEmailIndicacao
{
    public function enviaPara(Aluno $aluno): void
    {
        mail($aluno->email(), 
        'Indicação de Aluno', 
        'E-mail de indicação enviado'
    );
    }
}