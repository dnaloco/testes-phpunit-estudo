<?php 
namespace Testes\JogoTetris\Mediator;

abstract class AbsColleague
{
    private $mediator;
    
    public function __construct(AbsMediator $mediator)
    {
        $this->mediator = $mediator;
    }
    abstract protected function notify(Array $data, AbsColleague $self);
    abstract protected function update(Array $data);
}