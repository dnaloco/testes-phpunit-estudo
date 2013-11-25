<?php
namespace Testes\JogoTetris\MainClasses;

class PecaFactoryTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }

    public function testIfHaveExtendsAbsColleague()
    {
        $this->assertTrue($this->rClass->isSubclassOf('Testes\JogoTetris\Mediator\AbsColleague'));
    }

        public function testIfHasStaticAttributeId()
    {
        $this->assertTrue($this->rClass->hasProperty('id'));
    }

    /**
     * @depends testIfHasStaticAttributeId
     */
    public function testIfIdisSetCorrectlyAndIsPrivate()
    {
        $prop = $this->setRProp('id');
        $this->assertTrue($prop->isPrivate());
        $prop->setAccessible(true);
        $this->assertSame(\Testes\JogoTetris\Mediator\AbsColleague::ID_PECA, $prop->getValue());
    }

    /**
     * @depends testIfIdisSetCorrectlyAndIsPrivate
     */
    public function testIfHasGetIdMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('getId'));
    }

    /**
     * @depends testIfHasGetIdMethod
     */
    public function testIfGetIdReturnRightValue()
    {
        $jogo = new Jogo();
        $peca = new PecaFactory($jogo);
        $this->assertSame(\Testes\JogoTetris\Mediator\AbsColleague::ID_PECA, $peca->getId());   
    }

    public function testIfHasPecasFlyweightStaticProperty()
    {
        $this->assertClassHasStaticAttribute('pecasFlyweight', $this->rClass->getName());
    }

    public function testIfHasPecaAtualAndPecaSeguinteAttributes()
    {
        $this->assertClassHasAttribute('pecaAtual', $this->rClass->getName());
        $this->assertClassHasAttribute('pecaSeguinte', $this->rClass->getName());
    }

    public function testIfHasSetPecaAtualMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('setPecaAtual'));
    }

    public function testIfHasSetPecaSeguinteMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('setPecaSeguinte'));
    }

    /**
    * @depends testIfHasPecasFlyweightStaticProperty
    * @depends testIfHasPecaAtualAndPecaSeguinteAttributes
    * @depends testIfHasSetPecaAtualMethod
    * @depends testIfHasSetPecaSeguinteMethod
    */
    public function testIfConstructorHaveSettedSevenObjectsOfPecas()
    {
        $jogo = new Jogo();
        $peca = new PecaFactory($jogo);

        $propPFW = $this->setRProp('pecasFlyweight');
        $propPFW->setAccessible(true);

        $this->assertEquals(7, count($propPFW->getValue()));

        $arrPFW = $propPFW->getValue();

        foreach($arrPFW as $peca) {
            $this->assertInstanceOf('\Testes\JogoTetris\Builder\Peca', $peca);
        }
    }

    /**
    * @depends testIfHasPecasFlyweightStaticProperty
    * @depends testIfHasPecaAtualAndPecaSeguinteAttributes
    */
    public function testIfPecaSeguinteHasBeenSetted()
    {
        $jogo = new Jogo();
        $peca = new PecaFactory($jogo);

        $propPS = $this->setRProp('pecaSeguinte');
        $propPS->setAccessible(true);
        $propPS = $propPS->getValue($peca);
        $this->assertInstanceOf('\Testes\JogoTetris\Builder\Peca', $propPS);
    }

    /**
    * @depends testIfHasPecasFlyweightStaticProperty
    * @depends testIfHasPecaAtualAndPecaSeguinteAttributes
    */
    public function testIfHasGerarPecasMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('gerarPecas'));
    }

    /**
    * @depends testIfHasPecasFlyweightStaticProperty
    * @depends testIfHasPecaAtualAndPecaSeguinteAttributes
    */
    public function testIfGerarPecasGeneratesAtualPecaInstanceAndSetIntoProperty()
    {
        $jogo = new Jogo();
        $peca = new PecaFactory($jogo);

        $peca->gerarPecas();

        $propPS = $this->setRProp('pecaAtual');
        $propPS->setAccessible(true);
        $propPS = $propPS->getValue($peca);

        $this->assertInstanceOf('\Testes\JogoTetris\Builder\Peca', $propPS);
    }
}
