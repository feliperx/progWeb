<!doctype html>
<html>
    <head>
        <title>Formulario 02</title>
    </head>
    <body> 
        <?php  
        
        $texto = "Ola";  
        $arrayMulti = array("Volvo","BMW","Toyota", 123, 1.232, true);

        
        var_dump($arrayMulti); // para saber as caracteristicas da variavel
        print "<br>";
        var_dump($texto);
        
        /* Listando os elementos do Array  */ 
        for ($x = 0; $x < count($arrayMulti); $x++) { 
            echo $arrayMulti[$x],"<br>"; 
            
        } 
        
        $arrayIntRandom = array(); 
        
        for ($x = 0; $x < 10; $x++) { 
            
            $arrayIntRandom[$x] = rand(1,20);
            echo $arrayIntRandom[$x],"<br>"; 
            
        } 
        
        
        ?>

    </body>
</html>

