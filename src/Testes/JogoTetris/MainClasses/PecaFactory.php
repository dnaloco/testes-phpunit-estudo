<?php
namespace Testes\JogoTetris\MainClasses;

/*
Esta classe usa o padrão Flyweight.
 */
final class PecaFactory
{
    public function __construct(AbsMediator $mediator)
    {
        parent::__construct($mediator);   
    }

    protected function update(Array $data)
    {

    }
}