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
        // THROW AN EXCEPTION HERE IF ACTION KEY WAS NOT SETTED...
        $action = $data['action'];

        switch($action) {
            case eCommands::PAUSE:
                foreach($this->colleagues as $c) {
                    if($c->getId()&4) {
                        $c->update($data);
                    }
                }
                break;
            case eCommands::RESET:
                foreach($this->colleagues as $c) {
                    if($c !==  $colleague) {
                        $c->update($data);
                    }
                }
                break;
            case eCommands::FINISH:
                foreach($this->colleagues as $c) {
                    if($c !==  $colleague) {
                        $c->update($data);
                    }
                }
                break;
            case eCommands::START:
                foreach($this->colleagues as $c) {
                    if($c !==  $colleague) {
                        $c->update($data);
                    }
                }
                break;
            case eCommands::CHANGE:
                if($colleague->getId()&1 && $c->getId()&2) {
                    $c->update($data);
                } else if($colleague->getId()&2 && $c->getId()&4) {
                    $c->update($data);
                } else if($c->getId()^4) {
                    $c->update($data);
                }
                break;
        }
    }
}