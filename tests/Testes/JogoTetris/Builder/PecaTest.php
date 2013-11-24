<?php 
namespace Testes\JogoTetris\Builder;

class PecaTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }

    public function testIfPecaImplementsInterfaceIPeca()
    {
        $interfaces = $this->rClass->getInterfaces();
        $this->assertArrayHasKey('Testes\JogoTetris\Interfaces\iPeca', $interfaces);
    }

    public function testIfClassABunchOfStaticAttributes()
    {
        $this->assertClassHasStaticAttribute('imagem', $this->rClass->getName());
        $this->assertClassHasStaticAttribute('coords', $this->rClass->getName());
        $this->assertClassHasStaticAttribute('rotate', $this->rClass->getName());
        $this->assertClassHasStaticAttribute('speed', $this->rClass->getName());
    }

    /**
     * @depends testIfClassABunchOfStaticAttributes
     * @expectedException InvalidArgumentException   
     */
    public function testIfWhenITryToConstructAPecaWithAWrongImageItTrowsAnInvalidArgumentException()
    {
        $p = new Peca('imagem.exe');
    }

    /**
     * @depends testIfClassABunchOfStaticAttributes
     */
    public function testIfWhenPassAExistingFileImageItConstructCorrectly()
    {
        $p = new Peca('Tetris-Pieces.jpg');
        $this->assertTrue(true);
    }

    /**
     * @depends testIfClassABunchOfStaticAttributes
     */
    public function testIfIGetAnArrayWithInfoOfImagemAndCoords()
    {
        $p = new Peca('Tetris-Pieces.jpg');
        $imgArr = $p->drawImage();
        $this->assertArrayHasKey('img', $imgArr);
        $this->assertArrayHasKey('ptX', $imgArr);
        $this->assertArrayHasKey('ptY', $imgArr);
        $this->assertArrayHasKey('rotate', $imgArr);
        $this->assertArrayHasKey('speed', $imgArr);
    }

    /**
     * @depends testIfClassABunchOfStaticAttributes
     */
    public function testIfWhenISetSomeCoordsIGetTheRightValueOfThen()
    {
        $p = new Peca('Tetris-Pieces.jpg');
        $p->setMove(2);
        $p->setMove(-3);
        $p->setMove(4);
        $imgArr = $p->drawImage();
        $this->assertEquals(2-3+4, $imgArr['ptX']);
    }

    /**
     * @depends testIfClassABunchOfStaticAttributes
     */
    public function testFlowOfPeca()
    {
        $p = new Peca('Tetris-Pieces.jpg');
        // first step and DEFAULT speed
        $p->setSpeed();
        $imgArr = $p->drawImage();
        $this->img_ptX_ptY_rotate_speed($imgArr, 0, 0, 0, -1);

        // I'm gonna move to right but the piece 
        // has not down yet
        $p->setMove(1);
        $imgArr = $p->drawImage();
        $this->img_ptX_ptY_rotate_speed($imgArr, 1, 0, 0, -1);

        // I'm gonna increase the speed and
        // go one step down
        $p->setSpeed(-2);
        $p->stepDown();
        $imgArr = $p->drawImage();
        $this->img_ptX_ptY_rotate_speed($imgArr, 1, -2, 0, -2);

        // I'm gonna decrease the speed and rotate one time
        $p->setSpeed(-1);
        $p->setRotate();
        $imgArr = $p->drawImage();
        $this->img_ptX_ptY_rotate_speed($imgArr, 1, -2, 1, -1);

        // The piece steps down
        $p->stepDown();
        $imgArr = $p->drawImage();
        $this->img_ptX_ptY_rotate_speed($imgArr, 1, -3, 1, -1);

        // I will rotate two times
        $p->setRotate();
        $p->setRotate();
        $imgArr = $p->drawImage();
        $this->img_ptX_ptY_rotate_speed($imgArr, 1, -3, 3, -1);

        // I will rotate, increase the speed 
        // till went three steps down
        $p->setRotate();
        $p->setSpeed(-2);
        $p->stepDown();
        $p->stepDown();
        $p->stepDown();
        $imgArr = $p->drawImage();
        $this->img_ptX_ptY_rotate_speed($imgArr, 1, -9, 0, -2);

        // I'm gonna move four times to left and 
        // in the middle of the movement the program 
        // is going to one more step down
        $p->setMove(-1);
        $p->setMove(-1);
        $p->stepDown();
        $p->setMove(-1);
        $p->setMove(-1);
        $imgArr = $p->drawImage();
        $this->img_ptX_ptY_rotate_speed($imgArr, -3, -11, 0, -2);
    }

    /**
     * @depends testIfClassABunchOfStaticAttributes
     */
    public function img_ptX_ptY_rotate_speed($imgArr, $x, $y, $r, $s)
    {
        $this->assertEquals($x, $imgArr['ptX']);
        $this->assertEquals($y, $imgArr['ptY']);
        $this->assertEquals($r, $imgArr['rotate']);
        $this->assertEquals($s, $imgArr['speed']);
    }
}
