<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Interfaces\iJogador,
    Testes\JogoTetris\Interfaces\eCommands;

final class Jogador extends AbsColleague implements iJogador
{
    private static $id = parent::ID_JOGADOR;

    public function __construct(AbsMediator $mediator)
    {
        parent::__construct($mediator);   
    }

    public function getId()
    {
        return self::$id;
    }


    public function sendCommand(Array $command)
    {
        $data = array();
        switch($command['action'])
        {
            case 'reset':
                $data['action'] = eCommands::RESET;
                $data['msg'] = array(
                    $command['reset']
                ); // ... TO IMPLEMENTS
                $this->notify($data);
                break;
            case 'pause':
                $data['action'] = eCommands::PAUSE;
                $data['msg'] = array(
                    $command['pause']
                ); // ... TO IMPLEMENTS
                $this->notify($data);
                break;
            case 'start':
                $data['action'] = eCommands::START;
                $data['msg'] = array(
                    $command['start']
                ); // ... TO IMPLEMENTS
                $this->notify($data);
                break;
            case 'change':
                $data['action'] = eCommands::CHANGE;
                $data['msg'] = array(); // ... TO IMPLEMENTS
                foreach($command['change'] $k=>$v) {
                    array_push($data['msg'], array($k => $v));
                }
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