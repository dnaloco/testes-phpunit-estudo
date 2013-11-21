<?php 
namespace Testes\TraitTestes;

trait tTestNormal
{
    use tTestSetReflections;

    public function testIfIsANormalClass()
    {
        $this->assertFalse($this->rClass->isFinal());
        $this->assertTrue($this->rClass->isInstantiable());
    }
}