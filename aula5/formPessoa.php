<?php
    require "./Banco.php"; 
    $pdo = Banco::connect(); 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cadastro Pessoa</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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

    <?php 
    $sql = "SELECT id, nome, cpf, data_de_nascimento, telefone, email FROM pessoa ORDER BY id DESC";
    ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($pdo->query($sql) as $row) { //abrindo o block foreach
            ?>
                <tr>
                    <th scope="col"><?= $row['id']?></th>
                    <td scope="col"><?= $row['nome']?></td>
                    <td scope="col"><?= $row['cpf']?></td>
                    <td hscope="col"><?= $row['data_de_nascimento']?></td>
                    <td scope="col"><?= $row['telefone']?></td>
                    <td scope="col"><?= $row['email']?></td>
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
    var_dump($pdo); 

    $name = $_POST['name'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $telefone = $_POST['fone'];
    $email = $_POST['email']; 

    echo "<br> $name";
    echo "<br> $cpf";
    echo "<br> $dataNascimento";
    echo "<br> $telefone";
    echo "<br> $email";
    
    
    if($acao == "salvar"){
        try {
            $stmt = $pdo->prepare("INSERT INTO pessoa(nome, cpf, data_de_nascimento, telefone, email) 
            VALUES (:nome, :cpf, :data_de_nascimento, :telefone, :email)"); 
        
            $stmt->execute(array(':nome'=>$name, ':cpf'=>$cpf, ':data_de_nascimento'=>$dataNascimento, ':telefone'=>$telefone,':email'=>$email));
            
            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
    }
       
    
?>