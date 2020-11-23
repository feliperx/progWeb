<!DOCTYPE html>
<html>

<head>
    <title>Cadastro Setor</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <form method="post" action="./formSetor.php">
        <fieldset>
            <legend><strong>Cadatro</strong></legend>
            <label for="name">Nome:</label><br>
            <input type="text" id="name" name="name"><br>

            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br>

            <label for="ramal">Ramal:</label><br>
            <input type="text" id="ramal" name="ramal"><br> 

            <label for="idInstituicao">Id da Instituicao:</label><br>
            <input type="text" id="idInstituicao" name="idInstituicao"><br>

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
    $email = $_POST['email'];
    $ramal = $_POST['ramal'];
    $idInstituicao = $_POST['idInstituicao'];

    echo "<br> $name";
    echo "<br> $email";
    echo "<br> $ramal";
    echo "<br> $idInstituicao";
    
    

    if($acao == "salvar"){
            try { 
                $stmt = $pdo->prepare('INSERT INTO setor(nome, email, ramal, intituicao_id) VALUES (:nome, :email, :ramal, :intituicao_id)'); 

                $stmt->execute(array(':nome'=>$name, ':email'=>$email, ':ramal'=>$ramal,':intituicao_id'=>$idInstituicao)); 

                echo "<br><br>"; 
                var_dump($stmt); 
                echo "<br>"; 
                echo "NL: ", $stmt->rowCount();
                
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
    }
       
    
?>

