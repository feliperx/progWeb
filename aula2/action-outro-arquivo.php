<?php 

// metodo GET aparece no URL, logo menos seguro
//$username = $_GET["username"]; 
//$password = $_GET["password"]; 
//$cpf = $_GET["cpf"];


//Metodo POST nao aparece no URL, mais seguro 
$username = $_POST["username"]; 
$password = $_POST["password"]; 
$cpf = $_POST["cpf"];

?>

<html>

    <head>
        <title>Credenciais</title>
    </head>
    <body> 
        <form> 
            <fieldset> <!-- Caixa customizada responsiva --> 
                <legend><strong>Credenciais</strong></legend>
                
                
                
                Login:  <?php echo $username ?><br>
                

                Password:  <?php echo $password ?><br>
               

                CPF:  <?php echo $cpf ?> <br> 

            </fieldset>

            <input type="submit" value="GO"/> 
            
        </form> 

    </body>
</html>


