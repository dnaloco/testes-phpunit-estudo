<?php 
namespace Testes\JogoTetris;

use Testes\JogoTetris\MainClasses\Jogador,
    Testes\JogoTetris\MainClasses\Jogo,
    Testes\JogoTetris\MainClasses\PecaFactory,
    Testes\JogoTetris\MainClasses\Tela,
    Testes\JogoTetris\Interfaces\eCommands;

final class JogoFacade
{
    private $jogo, $peca, $tela, $jogador;

    public function iniciarJogo($newPlayer = 'Arthur')
    {
        $this->jogo = new Jogo();
        
        $this->jogador = new Jogador($this->jogo);
        $this->jogador->setNome($newPlayer);

        $this->peca = new PecaFactory($this->jogo);

        $this->tela = new Tela($this->jogo);

        $this->jogo->addColleague($this->jogador)
            ->addColleague($this->peca)
            ->addColleague($this->tela);

        $this->peca->gerarPecas();
    }

    public function pausarJogo()
    {
        $this->jogador->sendCommand(array('action'=>eCommands::PAUSE));
    }

    public function resetarScore()
    {
        $this->jogador->sendCommand(array('action'=>eCommands::RESET));
    }

    public function atualizarTela()
    {
        $this->tela->renderScreen();
    }

    public function terminarJogo()
    {
        $this->jogador->sendCommand(array('action' => eCommands::FINISH));
    }

    public function novoJogo($jogador)
    {
        $this->iniciarJogo($jogador);
    }

    public function descerPeca()
    {
        $this->jogador->sendCommand(
            array(
                'action' => eCommands::CHANGE,
                'direction' => 0
            )
        );
    }

    public function moverPeca($direction)
    {
        $this->jogador->sendCommand(
            array(
                'action' => eCommands::CHANGE,
                'direction' => $direction
            )
        );
    }

}