<?php
    require "./Banco.php"; 
    $pdo = Banco::connect(); 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro Instituicao</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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

    <?php 
    $sql = "SELECT id, nome, cnpj FROM instituicao ORDER BY id DESC";
    ?>


    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">CNPJ</th>
            </tr>   
        </thead>
        <tbody>
            <?php
                foreach ($pdo->query($sql) as $row) { //abrindo o block foreach
            ?>
                <tr>
                    <th scope="col"><?= $row['id']?></th>
                    <td scope="col"><?= $row['nome']?></td>
                    <td scope="col"><?= $row['cnpj']?></td>
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


    $name = $_POST['name'];
    $cnpj = $_POST['cnpj'];

    echo "<br> $name";
    echo "<br> $cnpj";
    
    

    if($acao == "salvar"){
            try { 
                $stmt = $pdo->prepare('INSERT INTO instituicao(nome, cnpj) VALUES (:nome, :cnpj)'); 

                $stmt->execute(array(':nome'=>$name, ':cnpj'=>$cnpj)); 

                // echo "<br><br>"; 
                // var_dump($stmt); 
                // echo "<br>"; 
                // echo "NL: ", $stmt->rowCount();
                
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
    }
       
    
?>