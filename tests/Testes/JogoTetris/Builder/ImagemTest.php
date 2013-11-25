<?php 
namespace Testes\JogoTetris\Builder;

final class ImagemTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }

    public function testIfHasStaticPathimgsStaticDefaultimgAndStaticFilePermExtProperties()
    {
        $this->assertClassHasAttribute('imagem', $this->rClass->getName());
        $this->assertClassHasStaticAttribute('pathimgs', $this->rClass->getName());
        $this->assertClassHasStaticAttribute('defaultimg', $this->rClass->getName());
        $this->assertClassHasStaticAttribute('filePermExt', $this->rClass->getName());
    }

    /**
     * @depends testIfHasStaticPathimgsStaticDefaultimgAndStaticFilePermExtProperties
     */
    public function testIfWithAndAbsentImageICanConstructAnDefaultImage()
    {
        $img = new Imagem('imagem.jpeg');
        $this->assertFileExists($img->getPathImg(), 'Verifique se no construtor da classe Imagem ou se na proprieade public static $pathimgs o caminho da imagem o levam ao caminho correto da pasta imagens na sua app OU se a extensao informada e permitida');
    }

    public function testIfWithAndExistingImageButWithWrongExtensionTheProgramWillSetAMessageInImageProperty()
    {
        $img = new Imagem('imagem.exe');
        $this->assertSame('.exe is not permitted as an image extension!', $img->getPathImg());
    }
}
