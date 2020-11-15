<!--
k) Faça um algoritmo para receber o nome e a data de nascimento pelo método GET 
e mostre no navegador web o nome, a data de nascimento e a quantidade de dias, 
meses e anos a pessoa tem de acordo com sua data de nascimento;
-->
<html>
    <head>
        <title>Data | Idade | Dias</title>
    </head>
    <body> 

        <form action="dataIdade_v2.php">

            <label for="name">Nome: </label>
            <input type="text" name="name" size="10"/><br>
            <label for="dateBirth">Data de Nascimento: </label>
            <input type="date" name="dateBirth" /><br> 
            <input type="submit" value="Enviar"/>

        </form> 

    </body>
</html>

<?php
if (isset($_GET['name']) and isset($_GET['dateBirth'])) {
    $name = $_GET['name'];
    $dateBirth = $_GET['dateBirth'];

    $date = new DateTime($dateBirth); // instanciando um novo objeto do tipo Datetime com a data informada
    $interval = $date->diff(new DateTime(date('d-m-Y'))); // diff(): mostra a diferenca entre duas datas
    $idade =  $interval->format('%Y anos %m meses e %d dias');  
    
    echo "<strong>Nome: </strong>", $name, "<br>"; 
    echo "<strong>Data de Nascimento: </strong>", $date->format('d-m-Y'), "<br>"; 
    echo "<strong>Idade: </strong>", $idade, "<br>"; 
}   
    
?>