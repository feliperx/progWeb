<?php

/*
 * o) Faça um algoritmo com uma matriz 5x5 preenchendo com números aleatórios e 
 * mostre no navegador WEB os elementos da diagonal principal da matriz gerada.
 */

$matriz = array(array(), array(), array(), array(), array());

//colocando valores na matriz
for ($x = 0; $x < 5; $x++) {
    for ($y = 0; $y < 5; $y++) {
        $matriz[$x][$y] = rand(1, 9);
        echo $matriz[$x][$y], " ";
    }
    echo "<br>";
}

// mostrando a diagonal principal 
echo "<br>Diagonal Principal: ";
for ($x = 0; $x < 5; $x++) {
    for ($y = 0; $y < 5; $y++) {
        if ($x == $y) {
            echo $matriz[$x][$y], " ";
        }
    }
}
?>