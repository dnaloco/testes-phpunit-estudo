<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Interfaces\iTela;

final class Tela extends AbsColleague implements iTela
{
    public function __construct(AbsMediator $mediator)
    {
        parent::__construct($mediator);   
    }

    protected function update(Array $data)
    {

    }
}