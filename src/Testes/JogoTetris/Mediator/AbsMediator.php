<?php 
namespace Testes\JogoTetris\Mediator;

abstract class AbsMediator
{
    const ID_PECA       = 1; // 0001
    const ID_JOGADOR    = 2; // 0010
    const ID_TELA       = 4; // 0100
                        // all =0111

    private static $colleagues = array();

    public function addColleague(AbsColleague $colleague)
    {
        $this->colleagues[] = $colleague;
        return $this;
    }

    public function getTotalOfColleagues()
    {
        return count($this->colleagues);
    }

    abstract public function send(Array $data, AbsColleague $colleague);
}
