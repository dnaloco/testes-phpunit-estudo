<?php 
namespace Testes\JogoTetris\Flyweight;

class PecaFlyweightTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestAbstract;

    private $rClass;

    public function __construct()
    {
        parent::__construct();
        $this->setRClass();
    }

    public function testIfHasDrawImage()
    {
        $method = 'drawImage';
        $this->assertTrue($this->rClass->hasMethod($method));
    }

    /**
     * @depends testIfHasDrawImage
     */
    public function testIfDrawImageIsAbstract()
    {
        $method = 'drawImage';
        $rMethod = $this->setRMethod($method);
        $this->assertTrue($rMethod->isAbstract());
    }

    public function testIfHasRotateImage()
    {
        $method = 'rotateImage';
        $this->assertTrue($this->rClass->hasMethod($method));
    }

    /**
     * @depends testIfHasRotateImage
     */
    public function testIfRotateImageIsAbstract()
    {
        $method = 'rotateImage';
        $rMethod = $this->setRMethod($method);
        $this->assertTrue($rMethod->isAbstract());
    }

    public function testIfHasSetCoords()
    {
        $method = 'setCoords';
        $this->assertTrue($this->rClass->hasMethod($method));
    }

    /**
     * @depends testIfHasSetCoords
     */
    public function testIfSetCoordsIsAbstractAndHisQtdeOfAssignaturesIsCompatible()
    {
        $method = 'setCoords';
        $rMethod = $this->setRMethod($method);
        $this->assertTrue($rMethod->isAbstract());
        $this->assertEquals(1, $rMethod->getNumberOfRequiredParameters());
    }

    /**
     * @depends testIfSetCoordsIsAbstractAndHisQtdeOfAssignaturesIsCompatible
     */
    public function testIfTheFirstParamIsAInjectionOfPonto()
    {
        $method = 'setCoords';
        $rMethod = $this->setRMethod($method);
        $rParam = $this->setRParam($method, 'ponto');
        $this->assertEquals($rParam->getClass()->getName(), __NAMESPACE__ . '\Ponto');
    }

    public function testIfHasGetCoords()
    {
        $method = 'getCoords';
        $this->assertTrue($this->rClass->hasMethod($method));
    }

    /**
     * @depends testIfHasGetCoords
     */
    public function testIfGetCoordsIsAbstract()
    {
        $method = 'getCoords';
        $rMethod = $this->setRMethod($method);
        $this->assertTrue($rMethod->isAbstract());
    }
}
