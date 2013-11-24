<?php 
namespace Testes\JogoTetris\Interfaces;

class iPecaTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestInterface;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }

    public function testConstructorHasOneRequiredParameter()
    {
        $method = $this->setRMethod('__construct');
        $this->assertEquals(1, $method->getNumberOfRequiredParameters());
    }

    public function testIfHasDrawImageMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('drawImage'));
    }

    public function testIfHassetRotateMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('setRotate'));
    }

    public function testIfHasSetSpeedMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('setSpeed'));
    }
    public function testIfSetSpeedHasOneParameters()
    {
        $method = $this->setRMethod('setSpeed');
        $this->assertEquals(1, $method->getNumberOfParameters());
    }

    public function testIfHasSetMoveMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('setMove'));
    }

    public function testIfSetMoveHasOneRequiredParameter()
    {
        $method = $this->setRMethod('setMove');
        $this->assertEquals(1, $method->getNumberOfRequiredParameters());
    }

    public function testIfHasStepDownMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('stepDown'));
    }
}
