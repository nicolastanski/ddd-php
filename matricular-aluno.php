<?php

use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDTO;
use Alura\Arquitetura\Infra\Aluno\RepositorioAlunoMemoria;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];

$alunoDTO = new MatricularAlunoDTO($cpf, $nome, $email);
$repositorioAluno = new RepositorioAlunoMemoria();
$matricularAluno = new MatricularAluno($repositorioAluno);
$matricularAluno->executa($alunoDTO);