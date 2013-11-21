<?php 
namespace Testes\TraitTestes;

trait tTestInterface
{
    use tTestSetReflections;

    public function testIfIsAInterface()
    {
        $this->assertTrue($this->rClass->isInterface());
    }
}