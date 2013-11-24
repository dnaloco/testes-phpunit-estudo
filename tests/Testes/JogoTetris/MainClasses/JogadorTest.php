<?php
namespace Testes\JogoTetris\MainClasses;

class JogadorTest extends \PHPUnit_Framework_TestCase
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
        $this->assertArrayHasKey('Testes\JogoTetris\Interfaces\iJogador', $interfaces);
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
        $this->assertSame(\Testes\JogoTetris\Mediator\AbsColleague::ID_JOGADOR, $prop->getValue());
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
        $jogador = new Jogador($jogo);
        $this->assertSame(\Testes\JogoTetris\Mediator\AbsColleague::ID_JOGADOR, $jogador->getId());   
    }

    public function testIfHasSendCommandMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('sendCommand'));
    }

    public function testIfHasSetScoreMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('setScore'));
    }

    public function testIfHasGetScoreMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('getScore'));
    }

    public function invalidScore()
    {
        return array(
            array('3'),
            array('a'),
            array("w"),
            array(2.5),
            array(.9)
        );
    }

    /**
     * @dataProvider invalidScore
     * @expectedException InvalidArgumentException
     */
    public function testIfSetScoreWithWrongTypeThrowsInvalidArgumentException($score)
    {
        $jogo = new Jogo();
        $jogador = new Jogador($jogo);
        $jogador->setScore($score);
    }

    public function validScore()
    {
        return array(
            array(6847),
            array(340),
            array(12023),
            array(1525),
            array(963),
            array(151)
        );
    }

    /**
     * @dataProvider validScore
     */
    public function testIfSetScoreWithRightValuesAndGetScoreMethodWorksProperly($score)
    {
        $jogo = new Jogo();
        $jogador = new Jogador($jogo);
        $jogador->setScore($score);

        $this->assertSame($score, $jogador->getScore());
    }

    public function testIfHasSetNomeMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('setNome'));
    }

    public function testIfHasGetNomeMethod()
    {
        $this->assertTrue($this->rClass->hasMethod('getNome'));
    }

    public function nomes()
    {
        return array(
            array('Arthur'),
            array("Bruna"),
            array('***Detonator***'),
            array(12354),
            array(null),
            array('   ')
        );
    }

    /**
     * @dataProvider nomes
     */
    public function testIfSetNomeAndGetNomeWorksProperly($nome)
    {
        $jogo = new Jogo();
        $jogador = new Jogador($jogo);
        $jogador->setNome($nome);
        $this->assertSame(empty(trim($nome))?'Jogador':$nome, $jogador->getNome());
    }

}
