<?php 
namespace Testes\JogoTetris\Flyweight;

class PontoTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function __construct()
    {
        parent::__construct();
        $this->setRClass();
    }
}
