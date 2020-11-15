<?php


if (isset($_GET['acao'])) {

    $acao = $_GET['acao'];
    
} else {
    $acao = 'entrar';
}

echo $acao;

if ($acao == "entrar") { 

// html dentro do php
$html = '  
 
<html>

    <head>
        <title>Formulario</title>
    </head>
    <body> 
        <form action="action-outro-arquivo.php" method=post> 
            <fieldset> <!-- Caixa customizada responsiva --> 
                <legend><strong>Cadatro</strong></legend>
                <label for="username">Login:</label><br>
                <input type="text" id="username" name="username" value="Aroldo" placeholder="Your username"><br> 

                <!-- value = valor padrao -->

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" placeholder="Password"><br>

                <label for="cpf">CPF:</label><br>
                <input type="text" id="cpf" name="cpf" placeholder="123.021.121-04" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"><br> 

            </fieldset>

            <input type="submit" value="GO"/> 
            <input type="hidden" name="acao" value="mostrar"/>

        </form> 

    </body>
</html>

'; 

}

if ($acao == "mostrar") { 

$html = '  
 
<html>

    <head>
        <title>Formulario</title>
    </head>
    <body> 
        <form> 
            <fieldset> <!-- Caixa customizada responsiva --> 
                <legend><strong>Credenciais</strong></legend>
                
                Login: '.$_GET["username"].'<br>
                

                Password: '.$_GET["password"].'<br> <!-- intercalando caracteres -->
               

                CPF: '.$_GET["cpf"].' 
                <br> 

            </fieldset>

            <input type="submit" value="GO"/> 
            
        </form> 

    </body>
</html>

';
   
}

echo $html;


?>
