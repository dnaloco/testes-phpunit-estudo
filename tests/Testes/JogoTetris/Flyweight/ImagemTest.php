<?php 
namespace Testes\JogoTetris\Flyweight;

final class ImagemTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function __construct()
    {
        parent::__construct();
        $this->setRClass();
    }
}
