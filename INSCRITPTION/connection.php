<?php
try{ 
$pdo = new PDO('mysql:host=localhost;dbname=db_digital101','root','');
}catch(PDOException $e){
    die ("impossible de se connecte a la base de donnee" .$e ->getMessage());
}
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>