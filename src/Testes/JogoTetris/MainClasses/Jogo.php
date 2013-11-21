<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsMediator,
    Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Interfaces\iJogo;

final class Jogo extends AbsMediator implements iJogo
{
    const JOGADOR   = 1;
    const PECA      = 2;
    const TELA      = 4;

    public function send(Array $data, AbsColleague $colleague)
    {

    }
}