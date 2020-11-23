<!DOCTYPE html>
<html>

<head>
    <title>Cadastro Lotacao</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

                echo "<br><br>"; 
                var_dump($stmt); 
                echo "<br>"; 
                echo "NL: ", $stmt->rowCount();
                
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
    }
       
    
?>

