<!--
f) Faça um algoritmo para receber pelo método GET o número de um cpf e mostre se
esse cpf é válido ou invalido. Para calculo do cpf verifique o link na internet:
https://campuscode.com.br/conteudos/o-calculo-do-digito-verificador-do-cpf-e-do-cnpj
-->

<html>
    <head>
        <title>CPF Validate</title>
    </head>
    <body> 

        <form action="cpfValidate.php">

            <label for="cpf">Informe o CPF:</label><br>
            <input type="" id="cpf" name="cpf" placeholder="123.021.121-04" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"><br> 
            <input type='submit' value="Validar"/>
        </form>   

    </body>
</html>

<?php
if (isset($_GET['cpf'])) {

    $text = $_GET['cpf'];

    if (validaCpf($text)) {
        echo "<br><strong>CPF Valido!</strong>";
    } else {
        echo "<br><strong>CPF Invalido!</strong>";
    }
}

function validaCpf($cpf) {

    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    $soma1 = 0;
    $soma2 = 0;

    //verificando primeiro digito
    for ($x = 0, $y = 10; $x < 9; $x++, $y--) {
        $soma1 += $cpf[$x] * $y;
    }

    $resto1 = $soma1 % 11;

    if ((11 - $resto1) >= 10) {
        $verificador1 = 0;
    } else {
        $verificador1 = 11 - $resto1;
    }

    //verificando segundo digito
    for ($x = 0, $y = 11; $x < 10; $x++, $y--) {
        $soma2 += $cpf[$x] * $y;
    }

    $resto2 = $soma2 % 11;

    if ((11 - $resto2) >= 10) {
        $verificador2 = 0;
    } else {
        $verificador2 = 11 - $resto2;
    }


    if (($verificador1 != $cpf[9]) and ($verificador2 != $cpf[10])) {
        return false;
    } else {
        return true;
    }
}
?>