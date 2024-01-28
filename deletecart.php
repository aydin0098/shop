<?php
include "connect.php";
$id = $_GET['id'];
$sql = "delete from basket where id=:id";
$res = $connect->prepare($sql);
$res->bindParam(":id",$id);
$res->execute();
header("location:basket.php");
?>