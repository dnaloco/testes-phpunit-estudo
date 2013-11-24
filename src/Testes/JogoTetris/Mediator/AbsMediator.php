<?php 
namespace Testes\JogoTetris\Mediator;

abstract class AbsMediator
{
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
