<?php 
namespace Testes\JogoTetris\Builder;

use Testes\JogoTetris\Interfaces\iPeca;

final class Peca implements iPeca
{
    private static $imagem;
    private static $coords;
    private static $rotate = 0;
    private static $speed;

    public function __construct($imagem)
    {
        self::$imagem = new Imagem($imagem);

        if(!file_exists(self::$imagem->imagem))
            throw new \InvalidArgumentException(self::$imagem->imagem);
        
        self::$coords = new Coords();
    }

    // renderiza a imagem
    public function drawImage()
    {
        return array(   
            'img'   => self::$imagem->imagem,
            'ptX'   => self::$coords->ptX,
            'ptY'   => self::$coords->ptY,
            'rotate'=> self::$rotate,
            'speed' => self::$speed
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
        if(self::$rotate < 3)
            ++self::$rotate;
        else 
            self::$rotate = 0;
    }

    // quando o apertar direita ou esquerda. 
    // Mediator Jogo é o responsável
    public function setMove($ptX)
    {
        self::$coords->setCoords($ptX);
    }

    // quando apertar para baixo aumente a velocidade. 
    // Mediator Jogo é o responsável
    public function setSpeed($speed = -1)
    {
        self::$speed = $speed;
    }
    
    // Os comandos são de responsabilidade do Jogo Mediator.
    public function stepDown()
    {
        self::$coords->setCoords(0, self::$speed);
    }

}