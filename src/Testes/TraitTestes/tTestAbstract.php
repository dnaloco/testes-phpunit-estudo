<?php 
namespace Testes\TraitTestes;

trait tTestAbstract
{
    use tTestSetReflections;

    public function testIfIsAnAbstractClass()
    {
        $this->assertTrue($this->rClass->isAbstract());
    }
}