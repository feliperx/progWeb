<!--
e) Faça um algoritmo para receber um nome e uma data de nascimento pelo método 
GET e mostra no navegador WEB o nome, a data de nascimento e a idade da pessoa. 
Mostre ainda se a pessoa for menor que 15 anos é criança, se tiver entre 15 e 18
anos é adolescente e se for maior que 18 anos e menos que 65 é adulta, mais que 
isso é idoso;
-->
<html>
    <head>
        <title>Data | Idade | Faixa</title>
    </head>
    <body> 

        <form action="dataIdade.php">

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
    $idade =  $interval->format('%Y anos'); // Informando somente a diferenca em anos 
    
    echo "<strong>Nome: </strong>", $name, "<br>"; 
    echo "<strong>Data de Nascimento: </strong>", $date->format('d-m-Y'), "<br>"; 
    echo "<strong>Idade: </strong>", $idade, "<br>"; 
    
    if($idade<15){ 
        echo "<strong>Faixa Etaria: </strong>", "Crianca <br>";     
    }elseif($idade>=15 and $idade<=18){
        echo "<strong>Faixa Etaria: </strong>", "Adolescente <br>";
    }elseif($idade>18 and $idade<65){ 
        echo "<strong>Faixa Etaria: </strong>", "Adulto <br>";
    }elseif($idade>=65){ 
        echo "<strong>Faixa Etaria: </strong>", "Idoso <br>";
    }else{
        echo "Informe uma data valida.";
    }
}
?>