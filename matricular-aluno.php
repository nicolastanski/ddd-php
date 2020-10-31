<?php

use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDTO;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogAlunoMatriculado;
use Alura\Arquitetura\Academico\Infra\Aluno\RepositorioAlunoMemoria;
use Alura\Arquitetura\Gamificacao\Infra\Selo\RepositorioSeleMemoria;
use Alura\Arquitetura\Shared\Dominio\Evento\PublicadorEvento;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];

$publicador = new PublicadorEvento();
$publicador->adicionarOuvinte(new LogAlunoMatriculado());
$publicador->adicionarOuvinte(new GeraSeloNovato(new RepositorioSeleMemoria()));

$useCase = new MatricularAluno(new RepositorioAlunoMemoria(), $publicador);
$useCase->executa(new MatricularAlunoDTO($cpf, $nome, $email));