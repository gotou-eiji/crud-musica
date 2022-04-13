<?php
    $posicao = $_GET['pos'];
    $posicao2 = $posicao+1;
    $posicao3 = $posicao+2;
    $arquivo = fopen("registro.txt", "r");
    while(!feof($arquivo)){
        $linha = fgets($arquivo);
    }
    $dados = explode(";", $linha);
    fclose($arquivo);
    unset($dados[$posicao]);
    unset($dados[$posicao2]);
    unset($dados[$posicao3]);
    $array = array_filter($dados);
    $file = 'registro.txt';
    unlink($file);
    $arq = fopen("registro.txt", "w");
    if($arq == false) die('Não foi possível criar o arquivo');
    foreach($array as $item){
        $arquivo = 'registro.txt';
        $texto = $item.";";
        $file = fopen($arquivo, 'a');
        fwrite($file, $texto);
    }
    fclose($arq);
    header("location: index.php");
?>