<?php

$erro = 0;
$msg = "";
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$dataNascimento = $_POST['dataNascimento'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$pai = $_POST['pai'];
$mae = $_POST['mae'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$ibge = $_POST['ibge'];
$uf = $_POST['uf'];
$fone = $_POST['fone'];
$email = $_POST['email'];
$msgv = "";




if (!$nome) {
    $erro++;
    $msgv = $msgv . "Nome obrigatório<br>";
}
if (!$cpf) {
    $erro++;
    $msgv = $msgv . "CPF obrigatório<br>";
}
if ($erro > 0) {
    $msg = "Alerta: $erro encontrados: <br>";
    echo $msg . $msgv;
} else {
    echo "<strong>Dados Cadastrados:</strong><br><br>";
    echo "Nome: ", $nome, "<br>";
    echo "Sexo: ", $sexo, "<br>";
    echo "Data de Nascimento: ", $dataNascimento, "<br>";
    echo "CPF: ", $cpf, "<br>";
    echo "Rg: ", $rg, "<br>";
    echo "Pai: ", $pai, "<br>";
    echo "Mae: ", $mae, "<br>";
    echo "CEP: ", $cep, "<br>";
    echo "Rua: ", $rua, "<br>";
    echo "Numero: ", $numero, "<br>";
    echo "Bairro: ", $bairro, "<br>";
    echo "Cidade: ", $cidade, "<br>";
    echo "IBGE: ", $ibge, "<br>";
    echo "UF: ", $uf, "<br>";
    echo "Telefone: ", $fone, "<br>";
    echo "Email: ", $email, "<br>";
}
?>