<!--
h) Faça um algoritmo para receber um número qualquer pelo método GET e mostre no
navegador web o fatorial desse número;
-->

<html>
    <head>
        <title>Fatorial</title>
    </head>
    <body> 

        <form action="fatorial.php">

            <label for="n">Informe um numero: </label>
            <input type="text" name="n" size="1"/><br>
            <input type="submit" value="Enviar"/>

        </form>   

    </body>
</html>

<?php
if (isset($_GET['n'])) {
    $n = $_GET['n'];
    echo "<br><strong>Fatorial de $n : </strong>", fatorial($n);
}

function fatorial($n) {
    if ($n == 0) {
        return 1;
    } else {
        return $n * fatorial($n - 1);
    }
}
?>