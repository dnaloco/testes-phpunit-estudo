<?php 
namespace Testes\JogoTetris\Interfaces;

class iTelaTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestInterface;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }
}
