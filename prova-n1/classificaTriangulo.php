<!--
j) Faça um algoritmo para receber três números que represente os lados de um 
triângulo e mostre no navegador o WEB a classificação de acordo com o tamanho 
dos lados.
-->
<html>
    <head>
        <title>Triangulos</title>
    </head>
    <body> 

        <form action="classificaTriangulo.php">

            <label for="a">Informe o valor do primeiro lado: </label>
            <input type="text" name="a" size="2"/><br>
            <label for="b">Informe o valor do segundo lado: </label>
            <input type="text" name="b" size="2"/><br> 
            <label for="c">Informe o valor do terceiro lado:</label>
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

    if ($a == $b and $a == $c) {
        echo "<br><strong>Triangulo Equilatero.</strong>";
    } elseif ($a == $b or $a == $c or $b == $c) {
        echo "<br><strong>Triangulo Isosceles.</strong>";
    } elseif ($a != $b and $a != $c and $b != $c) {
        echo "<br><strong>Triangulo Escaleno.</strong>";
    } else {
        echo "<br><strong>Informe os 3 numeros inteiros.</strong>";
    }
}
?>