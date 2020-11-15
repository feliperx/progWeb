<!--
b) Faça um algoritmo para receber um número qualquer pelo método GET e mostre no
navegador web o conjunto de tabuadas de 1 a 10 para esse número, tabuadas de 
adição, subtração, multiplicação e divisão;
-->

<html>
    <head>
        <title>Tabuada</title>
    </head>
    <body> 

        <form action="tabuada.php">

            <label for="n">Informe um numero: </label>
            <input type="text" name="n" size="1"/><br>
            <input type="submit" value="Enviar"/>

        </form>   

    </body>
</html>

<?php
if (isset($_GET['n'])) {
    $n = $_GET['n'];

    for ($i = 1; $i <= 10; $i++) {
        echo $n, " + ", $i, " = ", $n + $i, "<br>";
        echo $n, " - ", $i, " = ", $n - $i, "<br>";
        echo $n, " * ", $i, " = ", $n * $i, "<br>";
        echo $n, " / ", $i, " = ", $n / $i, "<br><br>";
    }
}
?>