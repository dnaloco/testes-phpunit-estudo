<?php
namespace Testes\JogoTetris\MainClasses;

use Testes\JogoTetris\Mediator\AbsColleague,
    Testes\JogoTetris\Mediator\AbsMediator,
    Testes\JogoTetris\Builder\Peca;
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

        $rand = mt_rand(0, count(self::$pecasFlyweight));

        $this->setPecaSeguinte(self::$pecasFlyweight[$rand]);
    }

    public function getId()
    {
        return self::$id;
    }

    public function gerarPecas()
    {
        $rand = mt_rand(0, count(self::$pecasFlyweight));
        $this->setPecaAtual($this->pecaSeguinte);
        $this->setPecaSeguinte(self::$pecasFlyweight[$rand]);
        // TODO - NOTIFY
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

    protected function update(Array $data)
    {
        // TODO
    }
}