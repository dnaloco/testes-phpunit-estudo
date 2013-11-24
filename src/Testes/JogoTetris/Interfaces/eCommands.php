<?php 
namespace Testes\JogoTetris\Interfaces;

interface eCommands
{
    const PAUSE     = 1;  // pause game . From jogador to tela
    const RESET     = 2;  // reset game . From jogador to everyone
    const FINISH    = 4;  // finish game . From tela to everyone
    const START     = 8;  // start new game . From jogador to everyone
    const CHANGE    = 16; // case from jogador update peca; 
                          // case from peca update tela; 
                          // case from tela update jogador e peca
    // real finish = 5
    // real start = 10
}