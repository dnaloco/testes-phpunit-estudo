<?php 
namespace Testes\JogoTetris;

use Testes\JogoTetris\MainClasses\Jogador,
    Testes\JogoTetris\MainClasses\Jogo,
    Testes\JogoTetris\MainClasses\PecaFactory,
    Testes\JogoTetris\MainClasses\Tela;

final class JogoFacade
{
    public function startGame()
    {
        $jogo = new Jogo();
        
        $jogador = new Jogador($jogo);
        $jogador->setNome('Arthur');

        $peca = new PecaFactory($jogo);

        $tela = new Tela($jogo);

        $jogo->addColleague($jogador)
            ->addColleague($peca)
            ->addColleague($tela);

        $peca->gerarPecas();
    }

    public function resetGame()
    {

    }
}