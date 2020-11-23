<?php

require "./Banco.php"; 

$pdo = Banco::connect(); 

var_dump($pdo);

$query = sprintf("SELECT * FROM pessoa");
$stmt=$pdo->prepare($query);
$ok=$stmt->execute();
echo $ok;
$resultsn = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($resultsn);
exit;