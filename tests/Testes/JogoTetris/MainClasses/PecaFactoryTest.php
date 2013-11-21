<?php
namespace Testes\JogoTetris\MainClasses;

class PecaFactoryTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function __construct()
    {
        parent::__construct();
        $this->setRClass();
    }
}
