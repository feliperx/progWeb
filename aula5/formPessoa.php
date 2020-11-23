<!DOCTYPE html>
<html>

<head>
    <title>Cadastro Pessoa</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <form method="post" action="./formPessoa.php">
        <fieldset>
            <legend><strong>Cadatro</strong></legend>
            <label for="name">Nome:</label><br>
            <input type="text" id="name" name="name"><br>


            <label for="cpf">CPF:</label><br>
            <input type="text" id="cpf" name="cpf" placeholder="123.021.121-04"
                pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"><br>

            <label for="dataNascimento">Data de Nascimento:</label><br>
            <input type="date" id="dataNascimento" name="dataNascimento"></br>

            <label for="fone">Telefone:</label><br>
            <input type="text" id="fone" name="fone"></br>

            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"></br>

        </fieldset>

        <input type="hidden" name="acao" value="salvar">
        <input type='submit' value="Salvar" />

    </form>

</body>

</html>

<?php
    if(isset($_POST['acao'])){
        $acao = $_POST['acao'];
    }else{
        $acao = 'entrar';
    }  
    
    require "./Banco.php"; 

    echo $acao, "<br>";

    $pdo = Banco::connect(); 
    var_dump($pdo); 

    $name = $_POST['name'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $telefone = $_POST['fone'];
    $email = $_POST['email']; 

    echo "<br> $name";
    echo "<br> $cpf";
    echo "<br> $dataNascimento";
    echo "<br> $email";
    echo "<br> $telefone";
    
    $stmt = $pdo->prepare("INSERT INTO pessoa(nome, cpf, data_de_nascimento, telefone, email) 
    VALUES (:nome, :cpf, :data_de_nascimento, :telefone, :email)"); 

    $stmt->execute(array(":nome"=>$name, ":cpf"=>$cpf, ":data_de_nascimento"=>$dataNascimento, ":telefone"=>$telefone,":email"=>$email));

    if($acao == "salvar"){
            try {
                    
                    echo "<br> DB OK! <br>";
            } catch (Exception $exception) {
                die($exception->getMessage());
            }
    }
       
    
?>