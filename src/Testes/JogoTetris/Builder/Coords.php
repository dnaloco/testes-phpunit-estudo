<?php 
namespace Testes\JogoTetris\Builder;

final class Coords
{
    public $ptX = 0;
    public $ptY = 0;

    public function resetCoords()
    {
        $this->ptX = 0;
        $this->ptY = 0;
    }

    public function setCoords($ptX = 0, $ptY = 0)
    {
        if(!is_int($ptX))
            throw new \InvalidArgumentException('ptX(first argument) must be an integer type!');
        $this->ptX += $ptX;

        if(!is_int($ptY))
            throw new \InvalidArgumentException('ptX(first argument) must be an integer type!');
        $this->ptY += $ptY;
    }
}