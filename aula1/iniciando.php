<!-- 

HTML - Executa no lado Cliente 
PHP - Executa no lado Servidor
-->

<html>
    <head>
        <title>Titulo da page</title>
    </head>
    <body> 
        <h1>Teste pagina WEB</h1>
        Teste de modificacao do arquivo 'iniciando.php'  
        <?php // abrindo tag php 
        
        echo "<br>"; // pulando uma linha 
        
        echo date('d/m/y'); // funcao para data atual
        
        echo "<br>";
        
        $name = "Felipe"; // declarando variaveis 
        echo $name; 
        
        $name = 25; //variaveis php sao mutaveis (n sao fortemente tipadas) 
        echo "<br>"; 
        echo $name;
        
        echo 2+2; 
        echo '<br>teste em php</br>';
        ?> <!<!-- fechando tag php - comentario html --> 
        
        <select id="teste"> 
            <option value="first"> Number 1</option>
            <option value="second">Number 2</option>
            <option value="third"><?php echo 'Number 3'?></option> <!<!-- usando php -->
        </select>  
        
        <form action="iniciando.php">
            
            <input type="text" name="y" size="10"/> 
            <input type="submit" value="Enviar"/>
            
        </form>
        
        <?php 
        
        if(isset($_GET['y'])){
            $y = $_GET['y'];
        } else {
            $y= 1;
        }
        
        for($x=1;$x<=10;$x++){ 
            
            echo "<br>";
            echo $x, " + ", $y," = ", $x + $y; 
            
            
        }
        
        ?>


    </body>
</html>


