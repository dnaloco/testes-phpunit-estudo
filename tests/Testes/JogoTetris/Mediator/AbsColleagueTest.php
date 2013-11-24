<?php 
namespace Testes\JogoTetris\Mediator;

class AbsColleagueTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestAbstract;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }

    public function testIfHasConstsIdPecaIdJogadorIdTela()
    {
        $this->assertTrue($this->rClass->hasConstant('ID_PECA'));
        $this->assertTrue($this->rClass->hasConstant('ID_JOGADOR'));
        $this->assertTrue($this->rClass->hasConstant('ID_TELA'));
    }

    public function testIfConstructorMethodExpectsOneParamaterOfAbsMediatorType()
    {
        $method = $this->setRMethod('__construct');
        $this->assertEquals(1, $method->getNumberOfRequiredParameters());
        $paramMediator = $this->setRParam('__construct', 'mediator');
        $this->assertSame($paramMediator->getClass()->getName(), __NAMESPACE__ . '\AbsMediator');
    }

    public function testIfHasNotifyMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('notify'));
    }

    /**
     * @depends testIfHasNotifyMethod
     */
    public function testIfNotifyIsProtected()
    {
        $method = $this->setRMethod('notify');
        $this->assertTrue($method->isprotected());
    }

    /**
     * @depends testIfNotifyIsProtected
     */
    public function testIfNotifyHasTwoRequiredArgumentsOneOfThemIsAnArray()
    {
        $method = $this->setRMethod('notify');
        $this->assertEquals(1, $method->getNumberOfRequiredParameters());
        $paramArray = $this->setRParam('notify', 'data');
        $this->assertTrue($paramArray->isArray());
    }

    public function testIfHasMethodUpdate()
    {
        $this->assertTrue($this->rClass->hasMethod('update'));
    }

    /**
     * @depends testIfHasMethodUpdate
     */
    public function testIfUpdateHasOneParameterAndIsAnArray()
    {
        $param = $this->setRParam('update', 'data');
        $this->assertTrue($param->isArray());
    }
}
