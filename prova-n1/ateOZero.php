<!--
i) Faça um algoritmo para receber um número qualquer pelo método GET e mostre 
uma contagem decrescente desse número até o número (zero), caso receba um número
negativo proceda a contagem até o número zero também...
-->

<html>
    <head>
        <title>Ate o Zero</title>
    </head>
    <body> 

        <form action="ateOZero.php">

            <label for="n">Informe um numero: </label>
            <input type="text" name="n" size="1"/><br>
            <input type="submit" value="Enviar"/>

        </form>   

    </body>
</html>

<?php
if (isset($_GET['n'])) {

    $n = $_GET['n'];
    $i = 0;

    echo "<br><strong>Do $n ate o 0 : </strong>";

    if ($n == 0) {
        echo $n;
    } elseif ($n > 0) {
        for ($i = $n; $i >= 0; $i--) {
            echo $i, " ";
        }
    } else {
        for ($i = $n; $i <= 0; $i++) {
            echo $i, " ";
        }
    }
}
?>