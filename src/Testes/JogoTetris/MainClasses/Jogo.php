<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsMediator,
    Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Interfaces\iJogo,
    Testes\JogoTetris\Interfaces\eCommands;

final class Jogo extends AbsMediator implements iJogo
{
    private $pause = false;
    private $status = false;

    public function _pauseGame()
    {
        if($this->pause)
            $this->pause = false;
        else
            $this->pause = true;
    }

    public function _startGame()
    {
        $this->status = true;
    }

    public function _finishGame()
    {
        $this->status = false;
    }

    public function send(Array $data, AbsColleague $colleague)
    {
        switch($data['action']) {
            case eCommands::PAUSE:
                $this->_pauseGame();
                $data['msg'] = $this->pause;
                foreach($this->colleagues as $c) {
                    if($c->getId()&AbsColleague::ID_TELA) {
                        $c->update($data);
                    }
                }
                break;
            case eCommands::RESET:
                if($status){
                    print "Não é possível resetar o score com o jogo em andamento!";
                    return false;
                }
                foreach($this->colleagues as $c) {
                    if($c !==  $colleague) {
                        $c->update($data);
                    }
                }
                break;
            case eCommands::FINISH:
                if(!$status) {
                    print "O jogo já está finalizado!";
                    return false;
                }
                foreach($this->colleagues as $c) {
                    if($c !==  $colleague) {
                        $c->update($data);
                    }
                }
                break;
            case eCommands::START:
                if($status){
                    print "O jogo já foi iniciado!";
                    return false;
                }
                foreach($this->colleagues as $c) {
                    if($c !==  $colleague) {
                        $c->update($data);
                    }
                }
                break;
            case eCommands::CHANGE:
                if($this->pause) {
                    print "O jogo está pausado";
                    return false;
                }
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