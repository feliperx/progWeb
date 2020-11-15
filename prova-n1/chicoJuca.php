<?php

/* l) Faça um algoritmo para resolver e mostrar no navegador web a resposta de 
 * quantos anos serão necessários para que Juca seja maior que Chico. Problema: 
 * Chico tem 1,50m e cresce 2 centímetros por ano, enquanto Juca tem 1,10m e 
 * cresce 3 centímetros por ano.
 */

$chico = 1.5;
$juca = 1.1;
$count = 0;

while ($chico >= $juca) {

    $chico += 0.02;
    $juca += 0.03;
    $count++;
}
echo "Serao necessarios $count anos.";
?>

