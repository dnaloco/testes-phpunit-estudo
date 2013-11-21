<?php 
namespace Testes\JogoTetris;

class JogoFacadetest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function __construct()
    {
        parent::__construct();
        $this->setRClass();
    }
}