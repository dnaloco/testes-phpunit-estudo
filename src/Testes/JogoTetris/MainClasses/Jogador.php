<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Mediator\AbsMediator,
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
        if(!array_key_exists('action', $command))
            throw new \InvalidArgumentException('Array data must have action key!');

        $data = array();

        switch($command['action'])
        {
            case eCommands::RESET:
                $data['action'] = $command['action'];
                $data['msg'] = 'reset';
                $this->notify($data);
                break;
            case eCommands::PAUSE:
                $data['action'] = $command['action'];
                $data['msg'] = null;
                $this->notify($data);
                break;
            case eCommands::FINISH:
                $data['action'] = $command['action'];
                $data['msg'] = 'finish';
                $this->notify($data);
                break;
            case eCommands::CHANGE:
                $data['action'] = $command['action'];
                
                if(!array_key_exists('direction', $command))
                    throw new \InvalidArgumentException('Array data must have a [direction] key!');

                $data['msg'] = $command['direction'];

                $this->notify($data);
                break;
        }
    }

    public function setScore($score)
    {
        if(!is_int($score))
            throw new \InvalidArgumentException('Score must be an integer');
        $this->score = $score;
    }

    public function getScore()
    { 
        return $this->score;
    }

    public function setNome($nome)
    {
        $this->nome = empty(trim($nome))?'Jogador':$nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function update(Array $data)
    {
        print "\nJOGADOR RECEBE\n";
        var_dump($data);
    }
}