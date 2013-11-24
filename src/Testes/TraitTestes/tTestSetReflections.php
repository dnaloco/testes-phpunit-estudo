<?php 
namespace Testes\TraitTestes;

trait tTestSetReflections
{   
    public function test_dependency()
    {
        if(strstr(get_class(), 'Test')) {
            $len = strlen(get_class());
            $class = substr(get_class(), 0, ($len-4));
            $this->assertTrue(class_exists($class) || interface_exists($class) || trait_exists($class));
        } else {
            trigger_error('SÓ USE EM CLASSES DE TESTES COM O SUFIXO "Test"');
        }
    }

    /**
     * @depends test_dependency
     */
    public function setRClass()
    {
        $len = strlen(get_class());
        $class = substr(get_class(), 0, ($len-4)); 
        $this->rClass = new \ReflectionClass($class);  

    }

    public function setRMethod($method)
    {
        return new \ReflectionMethod($this->rClass->getName(), $method);
    }

    public function setRParam($method, $param)
    {
        return new \ReflectionParameter(array($this->rClass->getName(), $method), $param);
    }

    public function setRProp($prop)
    {
        return new \ReflectionProperty($this->rClass->getName(), $prop);
    }
}