<!--
a) Faça um algoritmo para receber dois números qualquer pelo Método GET
e mostre no navegador web uma contagem do menor número até o maior número 
informado.
-->
<html>
    <head>
        <title>Contagem</title>
    </head>
    <body> 
        
        <form action="doAaoBcontagem.php">
            
            <label for="a">Informe o primeiro numero: </label>
            <input type="text" name="a" size="10"/><br>
            <label for="b">Informe o segundo numero: </label>
            <input type="text" name="b" size="10"/><br> 
            <input type="submit" value="Enviar"/>
            
        </form> 

    </body>
</html>

<?php 
    
    if(isset($_GET['a']) and isset($_GET['b'])){
        $a = $_GET['a']; 
        $b = $_GET['b']; 
        
        if($a>$b){ 
            for($i=$b;$i<=$a;$i++){
                echo $i, " "; 
            }
        }elseif($a<$b){
            for($i=$a;$i<=$b;$i++){
                echo $i, " "; 
            }
        }else
            echo "Informe numeros inteiros diferentes!";       
    }
?>