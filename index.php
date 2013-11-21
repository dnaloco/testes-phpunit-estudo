<?php 
require_once "bootstrap.php";

class Teste
{
    private $myInt;
    public function setMyInt(Array $i)
    {
        $this->myInt = $i;
    }
    public function getMyInt()
    {

    }
}

$t = new Teste();
$t->setMyInt(array(4, 5, 6, 7));