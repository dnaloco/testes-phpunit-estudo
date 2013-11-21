<?php 
// só fiz essa besteirinha pois vi num wallpaper que tinha apenas 'while (awake()) {code();}'
// ai resolvi implementar só por distração, pois já está mó tarde e estou super cansado.
// vou ver uns episódios de samurai x e talvez assista Elysium...Good night and keep coding.
$frase = 'eu continuo acordado e codando. Vou tomar um café para dar um gás, mas já volto...';
/* Globais -> */ $arr = explode(' ', $frase); $count = 0; $val = ''; /* Para as duas funções */
function awake()
{
    global $count, $arr, $val;
    if($count < count($arr))
        $val = $arr[$count];
    else
        return false;
    ++$count; return true;
} // retorna true e se ainda se pode iterar com o elemento ou false se não.
function code() {
    global $val; echo $val, "<br/>\n";
} // imprime a variavel val que guardou um valor do indice do array. Setada na função awake.
// e eis que vemos um exemplo de programa de alto nível, garbo e elegância...
while (awake()) {code();} // só que não!