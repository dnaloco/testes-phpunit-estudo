<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Interfaces\iJogador,
    Testes\JogoTetris\Interfaces\eCommands;

final class Jogador extends AbsColleague implements iJogador
{
    public function __construct(AbsMediator $mediator)
    {
        parent::__construct($mediator);   
    }

    public function sendCommand($command)
    {
        $data = array();
        switch($command)
        {
            case eCommands::RESET:
            // Set Data keys
                $this->notify($data);
                break;
            case eCommands::PAUSE:
            // Set Data keys
                $this->notify($data);
                break;
            case eCommands::START:
            // Set Data keys
                $this->notify($data);
                break;
            case eCommands::CHANGE:
            // Set Data keys
                $this->notify($data);
                break;
        }
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    public function getScore()
    { 
        return $this->score;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    protected function update(Array $data)
    {
        // if data has key score setScore
        // if data has key finish setScore
    }
}