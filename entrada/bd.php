<?php


$user = "root";
$server = "localhost";
$pass = "";
$db = "globalitium";

try{
    $conexion = new PDO("mysql:host=$server;dbname=$db", $user,$pass);
 }catch(Exception $error){
     echo $error->getMessage();
 
 }
 


?>