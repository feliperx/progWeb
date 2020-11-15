<!--
d) Faça um algoritmo para receber três números quaisquer pelo método GET e 
mostre no navegador web a sequência do maior para o menor e outra sequência do 
menor para o maior.
-->
<html>
    <head>
        <title>Crescente e Decrescente</title>
    </head>
    <body> 

        <form action="crescenteEDecres.php">

            <label for="a">Informe o primeiro numero: </label>
            <input type="text" name="a" size="2"/><br>
            <label for="b">Informe o segundo numero: </label>
            <input type="text" name="b" size="2"/><br> 
            <label for="c">Informe o terceiro numero: </label>
            <input type="text" name="c" size="2"/><br> 
            <input type="submit" value="Enviar"/>

        </form> 

    </body>
</html>

<?php
if (isset($_GET['a']) and isset($_GET['b']) and isset($_GET['c'])) {
    $a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];

    $array = array($a, $b, $c);

    sort($array); // ordena o array em ordem crescente 
    echo "Ordem crescente: ";
    for ($x = 0; $x < count($array); $x++) {
        echo $array[$x], " ";
    }
    echo "<br><br>";
    
    rsort($array); // ordena o array em ordem decrescente 
    echo "Ordem decrescente: ";
    for ($x = 0; $x < count($array); $x++) {
        echo $array[$x], " ";
    }
}
?>