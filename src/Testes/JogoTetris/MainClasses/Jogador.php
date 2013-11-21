<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Interfaces\iJogador;

final class Jogador extends AbsColleague implements iJogador
{
    public function __construct(AbsMediator $mediator)
    {
        parent::__construct($mediator);   
    }
    
    protected function notify(Array $data, AbsColleague $self)
    {

    }

    protected function update(Array $data)
    {

    }
}