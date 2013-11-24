<?php 
namespace Testes\JogoTetris\Mediator;

abstract class AbsColleague
{
    const ID_PECA       = 1; // 0001
    const ID_JOGADOR    = 2; // 0010
    const ID_TELA       = 4; // 0100
                        // all =0111
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