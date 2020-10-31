<?php

use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDTO;
use Alura\Arquitetura\Dominio\Aluno\LogAlunoMatriculado;
use Alura\Arquitetura\Dominio\PublicadorEvento;
use Alura\Arquitetura\Infra\Aluno\RepositorioAlunoMemoria;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];

$publicador = new PublicadorEvento();
$publicador->adicionarOuvinte(new LogAlunoMatriculado());
$useCase = new MatricularAluno(new RepositorioAlunoMemoria(), $publicador);
$useCase->executa(new MatricularAlunoDTO($cpf, $nome, $email));