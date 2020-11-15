<!--
c) Faça um algoritmo para receber o nome de uma pessoa pelo método GET e mostre no
navegador web várias vezes esse nome de acordo com a quantidade de letras ele tem.
-->

<html>
    <head>
        <title>Contagem String</title>
    </head>
    <body> 

        <form action="countString.php">

            <label for="name">Informe um nome: </label>
            <input type="text" name="name" size="1"/><br>
            <input type="submit" value="Enviar"/>

        </form>   

    </body>
</html>

<?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];    
    $count = strlen($name);

    for ($i = 0; $i < $count; $i++) {
        echo $name, "<br>";
    }
}
?>