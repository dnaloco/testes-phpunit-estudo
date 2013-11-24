<?php 
namespace Testes\JogoTetris\Mediator;

class AbsMediatorTest extends \PHPUnit_Framework_TestCase
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

    public function testIfClassHasPropertyColleaguesAndIsStaticPrivateAndAnArray()
    {
        $prop = 'colleagues';
        $this->assertThat($this->rClass->getName(), $this->classHasAttribute($prop));
        $prop = $this->rClass->getProperty($prop);
        $this->assertTrue($prop->isPrivate());
        $this->assertTrue($prop->isStatic());
        $this->assertTrue(is_array($this->rClass->getStaticProperties()[$prop->getName()]));
    }   

    public function testIfHasAddColleagueMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('addColleague'));
    }

    /**
     * @depends testIfHasAddColleagueMethod
     */
    public function testIfAddColleagueIsNotAbstractAndIsPublic()
    {
        $method = $this->setRMethod('addColleague');
        $this->assertFalse($method->isAbstract());
        $this->assertTrue($method->isPublic());
    }

    /**
     * @depends testIfHasAddColleagueMethod
     */
    public function testIfAddColleagueHasParam()
    {
        $method = $this->setRMethod('addColleague');
        $this->assertEquals(1, $method->getNumberOfRequiredParameters());
    }

    /**
     * @depends testIfAddColleagueHasParam
     */
    public function testIfAddColleagueHasHisFirstParamOfAbsCollegue()
    {
        $param = $this->setRParam('addColleague', 'colleague');
        $this->assertEquals($param->getClass()->getName(), __NAMESPACE__ . '\AbsColleague');
    }

    /**
     * @depends testIfAddColleagueIsNotAbstractAndIsPublic
     * @depends testIfClassHasPropertyColleaguesAndIsStaticPrivateAndAnArray
     * @depends testIfAddColleagueHasHisFirstParamOfAbsCollegue
     */
    public function testIfAddColleagueInsertFiveElementsIntoPropertyColleagues()
    {
        $mediator = $this->getMockForAbstractClass(__NAMESPACE__ . '\AbsMediator');

        $colleague1 = $this->getMockForAbstractClass(__NAMESPACE__ . '\AbsColleague', array($mediator));
        $colleague2 = $this->getMockForAbstractClass(__NAMESPACE__ . '\AbsColleague', array($mediator));
        $colleague3 = $this->getMockForAbstractClass(__NAMESPACE__ . '\AbsColleague', array($mediator));
        $colleague4 = $this->getMockForAbstractClass(__NAMESPACE__ . '\AbsColleague', array($mediator));
        $colleague5 = $this->getMockForAbstractClass(__NAMESPACE__ . '\AbsColleague', array($mediator));

        $mediator->addColleague($colleague1)
            ->addColleague($colleague2)
            ->addColleague($colleague3)
            ->addColleague($colleague4)
            ->addColleague($colleague5);

        $this->assertSame(5, $mediator->getTotalOfColleagues());
    }

    public function testIfHasMethodSend()
    {
        $this->assertTrue($this->rClass->hasMethod('send'));
    }

    public function testIfSendHasTwoRequiredParameters()
    {
        $method = $this->setRMethod('send');
        $this->assertEquals(2, $method->getNumberOfRequiredParameters());
    }

    public function testIfSendHasTheFirstParameterAsAnArray()
    {
        $paramArray = $this->setRParam('send', 'data');
        $this->assertTrue($paramArray->isArray());
    }

    public function testIfSendHasTheSecondParameterAsATypeOfAbsColleague()
    {
        $param = $this->setRParam('send', 'colleague');
        $this->assertEquals($param->getClass()->getName(), __NAMESPACE__ . '\AbsColleague');
    }

    public function testIfSendIsAbstractAndPublic()
    {
        $method = $this->setRMethod('send');
        $this->assertTrue($method->isAbstract());
        $this->assertTrue($method->isPublic());
    }
}
