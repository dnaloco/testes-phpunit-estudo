<?php 
namespace Testes\JogoTetris;

class JogoFacadetest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }

    public function testStartMethod()
    {
        $jf = new JogoFacade();
        $jf->startGame();
    }
}