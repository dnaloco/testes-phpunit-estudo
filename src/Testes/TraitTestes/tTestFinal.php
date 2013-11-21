<?php 
namespace Testes\TraitTestes;

trait tTestFinal
{
    use tTestSetReflections;

    public function testIfIsAFinalClass()
    {
        $this->assertTrue($this->rClass->isFinal());
    }
}