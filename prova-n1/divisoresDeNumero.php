<!--
g) Faça um algoritmos para receber um número qualquer pelo método GET e mostra 
no navegador web todos os divisores reais desse número.
-->

<html>
    <head>
        <title>Divisores Reais</title>
    </head>
    <body> 

        <form action="divisoresDeNumero.php">

            <label for="n">Informe um numero: </label>
            <input type="text" name="n" size="1"/><br>
            <input type="submit" value="Enviar"/>

        </form>   

    </body>
</html>

<?php
if (isset($_GET['n'])) {
    $n = $_GET['n'];

    echo "<strong>Divisores de ", $n, ": </strong>";
    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i == 0) {
            echo $i, ", ";
        }
    }
}
?>