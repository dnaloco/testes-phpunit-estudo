<?php 
namespace Testes\JogoTetris\Interfaces;

interface eCommands
{
    const PAUSE     = 1;  // From jogador to tela
    const RESET     = 2;  // From jogador to everyone
    const FINISH    = 4;  // From tela to everyone
    const START     = 8;  // From jogador to everyone
    const CHANGE    = 16; // case from jogador to peca; 
                          // case from peca to tela; 
                          // case from tela to everyone
    // real finish = 5
    // real start = 10
}