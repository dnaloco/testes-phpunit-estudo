<?php 
namespace Testes\JogoTetris\Builder;

use Testes\JogoTetris\Interfaces\iPeca;

final class Peca implements iPeca
{
    private $imagem;
    private $coords;
    private $rotate = 0;
    private $speed;

    const CMD_UP    = 1;
    const CMD_RIGHT = 2;
    const CMD_DOWN  = 4;
    const CMD_LEFT  = 8;

    public function __construct($imagem)
    {
        $this->imagem = new Imagem($imagem);

        if(!file_exists($this->imagem->getPathImg()))
            throw new \InvalidArgumentException($this->imagem->getPathImg());
        
        $this->coords = new Coords();
    }

    // renderiza a imagem
    public function drawImage()
    {
        return array(   
            'img'   => $this->imagem->getPathImg(),
            'ptX'   => $this->coords->ptX,
            'ptY'   => $this->coords->ptY,
            'rotate'=> $this->rotate,
            'speed' => $this->speed
        );
    }
    
    public function resetPeca()
    {
        $this->coords->resetCoords();
        $this->rotate = 0;
        $this->speed = -1;
    }

    // quando o jogador apertar a seta 
    // para cima a imagem rotaciona em 
    // sentido horário. Mediator Jogo é o responsável
    public function setRotate()
    {
        if($this->rotate < 3)
            ++$this->rotate;
        else 
            $this->rotate = 0;
    }

    // quando o apertar direita ou esquerda. 
    // Mediator Jogo é o responsável
    public function setMove($ptX)
    {
        $this->coords->setCoords($ptX);
    }

    // quando apertar para baixo aumente a velocidade. 
    // Mediator Jogo é o responsável
    public function setSpeed($speed = -1)
    {
        $this->speed = $speed;
    }
    
    // Os comandos são de responsabilidade do Jogo Mediator.
    public function stepDown()
    {
        $this->coords->setCoords(0, $this->speed);
    }

}