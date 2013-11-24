<?php 
namespace Testes\JogoTetris\Interfaces;

class iJogadorTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestInterface;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }

    public function testIfHasSendCommandMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('sendCommand'));
    }
    public function testIfSendCommandHasOneRequiredParameter()
    {
        $m = $this->setRMethod('sendCommand');
        $this->assertEquals(1, $m->getNumberOfRequiredParameters());
    }

    public function testIfHasSetScoreMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('setScore'));
    }

    public function testIfSetScoreHasOneRequiredParameter()
    {
        $m = $this->setRMethod('setScore');
        $this->assertEquals(1, $m->getNumberOfRequiredParameters());
    }

    public function testIfHasGetScoreMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('getScore'));
    }

    public function testIfHasSetNomeMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('setNome'));
    }

    public function testIfSetNomeHasOneRequiredParameter() 
    {
        $m = $this->setRMethod('setNome');
        $this->assertEquals(1, $m->getNumberOfRequiredParameters());
    }

    public function testIfHasGetNomeMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('getNome'));
    }

}
