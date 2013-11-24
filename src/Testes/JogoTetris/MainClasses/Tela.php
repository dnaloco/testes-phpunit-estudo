<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Interfaces\iTela;

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

    protected function update(Array $data)
    {

    }
}