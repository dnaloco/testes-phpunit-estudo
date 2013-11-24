<?php 
namespace Testes\JogoTetris\Builder;

class CoordsTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }

    public function testIfHasPtXAndPtYProperties()
    {
        $this->assertClassHasAttribute('ptX', $this->rClass->getName());
        $this->assertClassHasAttribute('ptY', $this->rClass->getName());
    }

    public function testIfHasSetCoordsMethod()
    {
        $this->assertTrue(method_exists($this->rClass->getName(), 'setCoords'));
    }

    public function testIfICanIterateWithCoords()
    {
        $pts = new Coords();
        // andar dois para a direita;
        $pts->setCoords(2, 0);
        $this->assertEquals(2, $pts->ptX);
        // andar tres para a esquerda e descer dois;
        $pts->setCoords(-3, -2);
        $this->assertEquals(-1, $pts->ptX);
        $this->assertEquals(-2, $pts->ptY);
    }

    public function invalidArguments()
    {
        return array(
            array('a', 1),
            array(1, 1.4),
            array(2.54, 5),
            array(24.23, .24),
            array('c', 'd'),
            array('2', '32'),
            array(2, "5"),
            array("3", 3)
        );
    }

    /**
     * @dataProvider invalidArguments
     * @expectedException InvalidArgumentException
     */
    public function testIfThrowsAnInvalidArgumentExceptionWhenPassWrongType($ptX, $ptY)
    {
        $pts = new Coords();
        $pts->setCoords($ptX, $ptY);
    }
}
