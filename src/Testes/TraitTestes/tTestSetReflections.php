<?php 
namespace Testes\TraitTestes;

trait tTestSetReflections
{   
    public function setRClass()
    {
        if(strstr(get_class(), 'Test')) {
            $len = strlen(get_class());
            $class = substr(get_class(), 0, ($len-4));
            $this->rClass = new \ReflectionClass($class);
        }
    }

    public function setRMethod($method)
    {
        return new \ReflectionMethod($this->rClass->getName(), $method);
    }

    public function setRParam($method, $param)
    {
        return new \ReflectionParameter(array($this->rClass->getName(), $method), $param);
    }
}