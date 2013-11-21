<?php 
namespace Testes\JogoTetris\Mediator;

class AbsColleagueTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestAbstract;

    private $rClass;

    public function __construct()
    {
        parent::__construct();
        $this->setRClass();
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
    public function testIfNotifyIsAbstractAndProtected()
    {
        $method = $this->setRMethod('notify');
        $this->assertTrue($method->isAbstract());
        $this->assertTrue($method->isprotected());
    }

    /**
     * @depends testIfNotifyIsAbstractAndProtected
     */
    public function testIfNotifyHasTwoRequiredArgumentsOneOfThemIsAnArrayAndTheOtherIsAInstanceOfItself()
    {
        $method = $this->setRMethod('notify');
        $this->assertEquals(2, $method->getNumberOfRequiredParameters());
        $paramArray = $this->setRParam('notify', 'data');
        $this->assertTrue($paramArray->isArray());
        $paramItself = $this->setRParam('notify', 'self');
        $this->assertEquals($paramItself->getClass()->getName(), __NAMESPACE__ . '\AbsColleague');
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
