<?php 
namespace Testes\JogoTetris\Builder;

final class Imagem
{
    public $imagem;
    public static $pathimgs = '/../public/images/';
    public static $defaultimg = 'default.jpg';
    public static $filePermExt = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
    );

    public function __construct($imagem) {
        $path = realpath($_SERVER['DOCUMENT_ROOT']) . self::$pathimgs;

        $ext = $this->get_file_extension($imagem);

        $this->imagem = ".$ext is not permitted as an image extension!";

        if(file_exists($path . $imagem)) {
            if(in_array($ext, self::$filePermExt))
                $this->imagem = $path . $imagem;
        } else {
            if(in_array($ext, self::$filePermExt))
                $this->imagem = file_exists($path . self::$defaultimg) ? 
                    $path . self::$defaultimg : 'image not found';
        }
    }

    private function get_file_extension($file_name) {
        return substr(strrchr($file_name,'.'),1);
    }
}