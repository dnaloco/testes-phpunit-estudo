<?php 
namespace Testes\JogoTetris\Interfaces;

class iJogadorTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestInterface;

    private $rClass;

    public function __construct()
    {
        parent::__construct();
        $this->setRClass();
    }
}
