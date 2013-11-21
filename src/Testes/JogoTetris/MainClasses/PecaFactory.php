<?php
namespace Testes\JogoTetris\MainClasses;

final class PecaFactory
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