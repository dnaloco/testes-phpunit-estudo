<?php
namespace Testes\JogoTetris\MainClasses;

class TelaTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }
}
