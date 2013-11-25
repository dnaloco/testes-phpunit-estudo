<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsMediator,
    Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Interfaces\iJogo,
    Testes\JogoTetris\Interfaces\eCommands;

final class Jogo extends AbsMediator implements iJogo
{
    public function send(Array $data, AbsColleague $colleague)
    {
        // THROW AN EXCEPTION HERE IF ACTION KEY WAS NOT SETTED...
        if(!array_key_exists('action', $data))
            throw new \InvalidArgumentException('Array data must have action key!');
        $action = $data['action'];

        switch($action) {
            case eCommands::PAUSE:
                foreach($this->colleagues as $c) {
                    if($c->getId()&AbsColleague::ID_TELA) {
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
                foreach($this->colleagues as $c) {
                    if($colleague->getId()&AbsColleague::ID_PECA && $c->getId()&AbsColleague::ID_TELA) {
                        print "\npeca to tela\n";
                        $c->update($data);
                    } else if($colleague->getId()&AbsColleague::ID_JOGADOR && $c->getId()&AbsColleague::ID_PECA) {
                        print "\njogador to peca\n";
                        $c->update($data);
                    } else if($colleague->getId()&AbsColleague::ID_TELA && $c->getId()&3) {
                        print "\ntela to everybody\n";
                        $c->update($data);
                    }
                }
                break;
        }
    }
}