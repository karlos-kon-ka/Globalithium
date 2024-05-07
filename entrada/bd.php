<?php


$user = "bc2c1db494df24";
$server = "eu-cluster-west-01.k8s.cleardb.net";
$pass = "49fb7073";
$db = "heroku_c1410abf8b1e30c";

try{
    $conexion = new PDO("mysql:host=$server;dbname=$db", $user,$pass);
 }catch(Exception $error){
     echo $error->getMessage();
 
 }
 


?>