<?php
    require "./Banco.php"; 
    $pdo = Banco::connect(); 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cadastro Lotacao</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <form method="post" action="./formLotacao.php">
        <fieldset>
            <legend><strong>Cadatro</strong></legend>

            <label for="dataEntrada">Data de Entrada:</label><br>
            <input type="date" id="dataEntrada" name="dataEntrada"><br>

            <label for="dataSaida">Data de Saida:</label><br>
            <input type="date" id="dataSaida" name="dataSaida"><br>

            <label for="situacao">Situacao:</label><br>
            <input type="text" id="situacao" name="situacao"><br> 

            <label for="idPessoa">Id da Pessoa:</label><br>
            <input type="text" id="idPessoa" name="idPessoa"><br>

            <label for="idSetor">Id da Setor:</label><br>
            <input type="text" id="idSetor" name="idSetor"><br>

        </fieldset>

        <input type="hidden" name="acao" value="salvar">
        <input type='submit' value="Salvar" />

    </form> 

    <?php 
    $sql = "SELECT id, data_entrada, data_saida, situacao, pessoa_id, setor_id FROM lotacao ORDER BY id DESC";
    ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Data de Entrada</th>
                <th scope="col">Data de Saida</th>
                <th scope="col">Situacao</th>
                <th scope="col">pessoa_id</th>
                <th scope="col">setor_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($pdo->query($sql) as $row) { //abrindo o block foreach
            ?>
                <tr>
                    <th scope="col"><?= $row['id']?></th>
                    <td scope="col"><?= $row['data_entrada']?></td>
                    <td scope="col"><?= $row['data_saida']?></td>
                    <td hscope="col"><?= $row['situacao']?></td>
                    <td scope="col"><?= $row['pessoa_id']?></td>
                    <td scope="col"><?= $row['setor_id']?></td>
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


    $dataEntrada = $_POST['dataEntrada'];
    $dataSaida = $_POST['dataSaida'];
    $situacao = $_POST['situacao'];
    $idPessoa = $_POST['idPessoa'];
    $idSetor = $_POST['idSetor'];


    echo "<br> $dataEntrada";
    echo "<br> $dataSaida";
    echo "<br> $situacao";
    echo "<br> $idPessoa";
    echo "<br> $idSetor";
    
    

    if($acao == "salvar"){
            try { 
                $stmt = $pdo->prepare('INSERT INTO setor(data_entrada, data_saida, situacao, pessoa_id, setor_id) VALUES (:dataEntrada, :dataSaida, :situacao, :idPessoa, :idSetor)'); 

                $stmt->execute(array(':dataEntrada'=>$dataEntrada, ':dataSaida'=>$dataSaida, ':situacao'=>$situacao,':idPessoa'=>$idPessoa, 'idSetor'=>$idSetor)); 

                // echo "<br><br>"; 
                // var_dump($stmt); 
                // echo "<br>"; 
                // echo "NL: ", $stmt->rowCount();
                
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
    }
       
    
?>

