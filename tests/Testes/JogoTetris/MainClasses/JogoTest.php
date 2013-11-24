<?php 
namespace Testes\JogoTetris\MainClasses;

class JogoTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }

    public function testIfHaveImplementedTheInterfaces()
    {
        $interfaces = $this->rClass->getInterfaces();
        $this->assertArrayHasKey('Testes\JogoTetris\Interfaces\iJogo', $interfaces);
    }

    public function testIfHaveExtendsAbsMediator()
    {
        $this->assertTrue($this->rClass->isSubclassOf('Testes\JogoTetris\Mediator\AbsMediator'));
    }
}
