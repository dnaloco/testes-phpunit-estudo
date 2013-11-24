<?php 
namespace Testes\JogoTetris\Mediator;

abstract class AbsColleague
{
    /*
    Ações permitidas que os colleagues podem realizar.
    Estas açoes iram com o array data enviado através do notify.
    O array data tem duas chaves('action' e 'msg').
     */

    private $mediator;
    
    public function __construct(AbsMediator $mediator)
    {
        $this->mediator = $mediator;
    }

    protected function notify(Array $data)
    {
        $this->mediator->send($data, $this);
    }
    abstract protected function update(Array $data);
}