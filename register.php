<?php
include "connect.php";
if (isset($_POST['btnReg']))
{
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "insert into users (name,pass,email,address,phone) values (:name,:pass,:email,:address,:phone)";
    $result = $connect->prepare($sql);
    $result->bindParam(":name",$name);
    $result->bindParam(":pass",$pass);
    $result->bindParam(":email",$email);
    $result->bindParam(":address",$address);
    $result->bindParam(":phone",$phone);
    $result->execute();

    header("location:index.php");
}
?>