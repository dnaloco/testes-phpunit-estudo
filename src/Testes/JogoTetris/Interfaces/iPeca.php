<?php 
namespace Testes\JogoTetris\Interfaces;

use Testes\JogoTetris\Builder\Coords;

interface iPeca
{
    public function __construct($image);
    public function drawImage();
    public function setRotate();
    public function setSpeed($speed);
    public function setMove($x);
    public function stepDown();
}