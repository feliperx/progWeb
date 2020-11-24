<?php
    require "./Banco.php"; 
    $pdo = Banco::connect(); 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro Setor</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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

    <?php 
        $sql = "SELECT id, nome, email, ramal, instituicao_id FROM setor ORDER BY id DESC";
    ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ramal</th>
                <th scope="col">instituicao_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($pdo->query($sql) as $row) { //abrindo o block foreach
            ?>
                <tr>
                    <th scope="col"><?= $row['id']?></th>
                    <td scope="col"><?= $row['nome']?></td>
                    <td scope="col"><?= $row['emal']?></td>
                    <td hscope="col"><?= $row['ramal']?></td>
                    <td scope="col"><?= $row['instituicao_id']?></td>
                </tr>
            <?php } //fechando block foreach
                ?>
        </tbody>
    </table>

</body>

</html>

<?php
    if(isset($_POST['acao'])){
        $acao = $_POST['acao'];
    }else{
        $acao = 'entrar';
    }  


    echo $acao, "<br>";


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

                // echo "<br><br>"; 
                // var_dump($stmt); 
                // echo "<br>"; 
                // echo "NL: ", $stmt->rowCount();
                
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
    }
       
    
?>

