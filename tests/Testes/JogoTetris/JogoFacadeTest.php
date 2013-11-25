<?php 
namespace Testes\JogoTetris;

class JogoFacadeTest extends \PHPUnit_Framework_TestCase
{
    use \Testes\TraitTestes\tTestFinal;

    private $rClass;

    public function setUp()
    {
        $this->setRClass();
    }

    public function testJogoFacadeMethod()
    {
        $jf = new JogoFacade();
        $jf->iniciarJogo();
        $jf->atualizarTela();
        $jf->moverPeca(2);
        $jf->atualizarTela();
        $jf->descerPeca();
        $jf->atualizarTela();
        $jf->moverPeca(2);
        $jf->atualizarTela();
        $jf->moverPeca(2);
        $jf->atualizarTela();
        $jf->descerPeca();
        $jf->atualizarTela();
        $jf->moverPeca(1);
        $jf->atualizarTela();
        $jf->descerPeca();
        $jf->atualizarTela();
        $jf->moverPeca(3);
        $jf->atualizarTela();
        $jf->moverPeca(14);
        $jf->atualizarTela();
        $jf->descerPeca();
        $jf->atualizarTela();
        $jf->moverPeca(14);
        $jf->atualizarTela();
        $jf->descerPeca();
        $jf->atualizarTela();
        $jf->moverPeca(8);
        $jf->atualizarTela();
        $jf->descerPeca();
        $jf->atualizarTela();
        $jf->moverPeca(8);
        $jf->atualizarTela();
        $jf->moverPeca(8);
        $jf->atualizarTela();
        $jf->moverPeca(6);
        $jf->atualizarTela();
        $jf->descerPeca();
        $jf->atualizarTela();
        $jf->moverPeca(1);
        $jf->atualizarTela();
        $jf->moverPeca(1);
        $jf->atualizarTela();
        $jf->descerPeca();
        $jf->atualizarTela();
        $jf->moverPeca(1);
        $jf->atualizarTela();

        /*---------------------------*/
    }
}