<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Mediator\AbsMediator,
    Testes\JogoTetris\Builder\Peca,
    Testes\JogoTetris\Interfaces\eCommands;
/*
Esta classe usa o padrão Flyweight.
 */
final class PecaFactory extends AbsColleague
{
    private static $id = parent::ID_PECA;

    private static $pecasFlyweight;
    private $pecaAtual;
    private $pecaSeguinte;

    public function __construct(AbsMediator $mediator)
    {
        parent::__construct($mediator);

        self::$pecasFlyweight = array();

        $images = array(
            'a.png',
            'b.png',
            'c.png',
            'd.png',
            'e.png',
            'f.png',
            'g.png'
        );

        foreach($images as $img) {
            array_push(self::$pecasFlyweight, new Peca($img));
        }

        $rand = mt_rand(0, count(self::$pecasFlyweight)-1);

        $this->setPecaSeguinte(self::$pecasFlyweight[$rand]);
    }

    public function getId()
    {
        return self::$id;
    }

    public function gerarPecas()
    {
        $rand = mt_rand(0, count(self::$pecasFlyweight)-1);

        $this->setPecaAtual($this->pecaSeguinte);
        $this->setPecaSeguinte(self::$pecasFlyweight[$rand]);

        $data = array(
            'action' => eCommands::CHANGE,
            'msg' => array(
                'pecaAtual' => $this->pecaAtual,
                'pecaSeguinte' => $this->pecaSeguinte
            )
        );

        $this->notify($data);
    }

    public function setPecaAtual(Peca $peca)
    {
        $peca->resetPeca();
        $this->pecaAtual = $peca;
    }

    public function setPecaSeguinte(Peca $peca)
    {
        $peca->resetPeca();
        $this->pecaSeguinte = $peca;
    }

    public function movePiece($direction)
    {
        switch($direction) {
            case 10:
                // nothing happens...
                return false;
            case  1:
                // will rotate pieace
                $this->pecaAtual->setRotate();
                break;
            case 2:
                // will move to the right;
                $this->pecaAtual->setMove(1);
                break;
            case 3:
                // will rotate and move to the right;
                $this->pecaAtual->setRotate();
                $this->pecaAtual->setMove(1);
                break;
            case 4:
                // will increase the speed;
                $this->pecaAtual->setSpeed(-2);
                break;
            case 6:
                // will increase the speed and move to the right one time;
                $this->pecaAtual->setSpeed(-2);
                $this->pecaAtual->setMove(1);
                break;
            case 8:
                // will move to the left;
                $this->pecaAtual->setMove(-1);
                break;
            case 12:
                // will move to the left and increase the speed;
                $this->pecaAtual->setSpeed(-2);
                $this->pecaAtual->setMove(-1);
                break;
            case 9:
                // will move to the left and rotate too;
                $this->pecaAtual->setRotate();
                $this->pecaAtual->setMove(-1);
                break;
            case 14:
                // in this particular case it will allow anything but bit 0004;
                // will decrease the speed;
                // TO IMPLEMENT
                $this->pecaAtual->setSpeed(-1);
                break;
            case 0:
                // stepDown
                $this->pecaAtual->stepDown();
                break;
        }
    }

    public function update(Array $data)
    {
        $teste = 2;
        print "\nPECA FACTORY RECEBE\n";
        if(!array_key_exists('action', $data))
            throw new \InvalidArgumentException('Array data must have action key!');

        switch($data['action']) {
            case eCommands::CHANGE:
                $this->movePiece($data['msg']);
                break;
        }
    }
}