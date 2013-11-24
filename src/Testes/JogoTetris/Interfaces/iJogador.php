<?php 
namespace Testes\JogoTetris\Interfaces;

interface iJogador
{
    public function sendCommand(Array $command);
    public function setScore($score);
    public function getScore();
    public function setNome($nome);
    public function getNome();
}