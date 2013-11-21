<?php 
namespace Testes\JogoTetris\Flyweight;

abstract class PecaFlyweight
{
    abstract public function drawImage();
    abstract public function rotateImage();
    abstract public function setCoords(Ponto $ponto);
    abstract public function getCoords();
}