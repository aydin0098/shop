<?php
session_start();
include "connect.php";
$name = $_POST['email'];
$pass= $_POST['pass'];
$user = "";
$type = "";
$sql = "select * from users where email=:name and pass=:pass";
$result = $connect->prepare($sql);
$result->bindParam(":name",$name);
$result->bindParam(":pass",$pass);
$result->execute();

while ($row=$result->fetch(PDO::FETCH_ASSOC)){

    $user = $row["email"];
    $type = $row["type"];
}

if ($user && $type=="user")
{
    $_SESSION["email"] = $user;
    header("location:index.php");
}else
{
    $error = "اطلاعات کاربری نادرست است ";

    header("location:index.php?error=1020");

}

?>