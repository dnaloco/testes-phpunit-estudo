<?php 
namespace Testes\JogoTetris\MyTraitHelpers;

trait tFileHelper
{
    private function get_file_extension($file_name) {
        return substr(strrchr($file_name,'.'),1);
    }
}