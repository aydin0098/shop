<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbName = "shopdb";
$dsn = "mysql:host=$server;dbname=$dbName";

try {
    $connect = new PDO($dsn,$user,$pass);

}catch (PDOException $exception) {
    echo  $exception->getMessage();
}

?>