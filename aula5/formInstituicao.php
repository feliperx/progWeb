<!DOCTYPE html>
<html>

<head>
    <title>Cadastro Instituicao</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <form method="post" action="./formInstituicao.php">
        <fieldset>
            <legend><strong>Cadatro</strong></legend>
            <label for="name">Nome:</label><br>
            <input type="text" id="name" name="name"><br>


            <label for="cnpj">CNPJ:</label><br>
            <input type="text" id="cnpj" name="cnpj"><br>

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
    $cnpj = $_POST['cnpj'];

    echo "<br> $name";
    echo "<br> $cnpj";
    
    

    if($acao == "salvar"){
            try { 
                $stmt = $pdo->prepare('INSERT INTO instituicao(nome, cnpj) VALUES (:nome, :cnpj)'); 

                $stmt->execute(array(':nome'=>$name, ':cnpj'=>$cnpj)); 

                echo "<br><br>"; 
                var_dump($stmt); 
                echo "<br>"; 
                echo "NL: ", $stmt->rowCount();
                
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
    }
       
    
?>