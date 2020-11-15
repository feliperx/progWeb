<?php

/*
 * m) Faça um algoritmo para armazenar 15 números inteiros em um vetor e imprimir 
 * no navegador web cada um dos números do vetor e a mensagem indicando para 
 * cada um dos números se ele é par ou ímpar
 */

$arrayIntRandom = array();

for ($x = 0; $x < 14; $x++) {

    $arrayIntRandom[$x] = rand(1, 20); // gerando numeros randomicos entre 1 - 20
    echo $arrayIntRandom[$x];
    if ($arrayIntRandom[$x] % 2 == 0) {
        echo " -> PAR<br>";
    } else {
        echo " -> IMPAR<br>";
    }
}
?>