<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Mediator\AbsMediator,
    Testes\JogoTetris\Interfaces\iTela,
    Testes\JogoTetris\Interfaces\eCommands;

final class Tela extends AbsColleague implements iTela
{
    private static $id = parent::ID_TELA;

    public function __construct(AbsMediator $mediator)
    {
        parent::__construct($mediator);   
    }

    public function getId()
    {
        return self::$id;
    }

    public function finishGame()
    {

    }

    public function makePoints()
    {

    }

    public function renderizeScreen()
    {

    }

    public function update(Array $data)
    {
        print "\nTELA RECEBE\n";
        var_dump($data);
    }
}