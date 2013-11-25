<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Mediator\AbsMediator,
    Testes\JogoTetris\Interfaces\iTela,
    Testes\JogoTetris\Interfaces\eCommands;

final class Tela extends AbsColleague implements iTela
{
    private static $id = parent::ID_TELA;
    private $pecaAtual, $pecaSeguinte;

    public function __construct(AbsMediator $mediator)
    {
        parent::__construct($mediator);   
    }

    public function getId()
    {
        return self::$id;
    }

    public function renderScreen()
    {
        print "\nRenderizando...\n";
        $peca = $this->pecaAtual->drawImage();
        print "A PECA QUE VAI SER RENDERIZADA:";
        print "\nIMG: " . $peca['img'];
        print "\nEixo X: " . $peca['ptX'];
        print "\nEixo Y: " . $peca['ptY'];
        print "\nRotacao: " . $peca['rotate'];
        print "\nVelocidade: " . $peca['speed'];
        print "\n";
    }

    public function pauseScreen()
    {

    }

    public function finishGame()
    {
        
    }

    public function makePoints()
    {

    }

    public function update(Array $data)
    {
        print "\nTELA RECEBE\n";
        if(!array_key_exists('action', $data))
            throw new \InvalidArgumentException('Array data must have action key!');

        switch($data['action']) {
            case eCommands::PAUSE:
                if($data['msg'] == true) {
                    print "\nJOGO PAUSADO\n";
                    return false;
                }
                break;
            case eCommands::CHANGE:
                if(isset($data['msg']['pecaSeguinte'])) {
                    $this->pecaAtual = $data['msg']['pecaAtual'];
                    $this->pecaSeguinte = $data['msg']['pecaSeguinte'];
                }
                break;
        }

    }
}