<?php

/*
 * n) Faça um algoritmo contendo um vetor com 20 elementos inteiros. 
 * Mostre no navegador web o maior e o menor, o percentual de números pares e 
 * ímpares e a média dos elementos do vetor.
 */

$arrayIntRandom = array();
$countPar = 0;
$countImpar = 0;
$media = 0;

for ($x = 0; $x < 20; $x++) {

    $arrayIntRandom[$x] = rand(1, 20); // gerando numeros randomicos entre 1 - 20/
    echo $arrayIntRandom[$x], " ";
    if ($arrayIntRandom[$x] % 2 == 0) {
        $countPar++;
    } else {
        $countImpar++;
    }
    $media += $arrayIntRandom[$x] / 20;
}

$percentPar = ($countPar / 20) * 100;
$percentImpar = ($countImpar / 20) * 100;

$max = max($arrayIntRandom);
$min = min($arrayIntRandom);

echo "<br>";
echo "Maior valor: $max <br>";
echo "Menor valor: $min <br>";
echo "Porcentagem de numeros pares: $percentPar% <br>";
echo "Porcentagem de numeros impares: $percentImpar% <br>";
echo "Media do Array: $media <br>";
?>

