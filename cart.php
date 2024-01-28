<?php session_start() ?>
<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Webmarket HTML Template - Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ProteusThemes">

    <!--  Google Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Pacifico|Open+Sans:400,700,400italic,700italic&amp;subset=latin,latin-ext,greek'
          rel='stylesheet' type='text/css'>

    <!-- Twitter Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!-- Slider Revolution -->
    <!-- jQuery UI -->
    <!-- PrettyPhoto -->

    <!-- main styles -->

    <link href="css/main.css" rel="stylesheet">

    <style>
        .form-group input {
            margin-right: 12px;
            margin-left: 12px;
        }

        .flex {
            display: flex;
        }
    </style>

    <?php include "connect.php" ?>

</head>


<body class="">
<?php
$name = "";
$price =0;
$email = $_SESSION['email'];
$count = 0;



$id = $_GET['id'];
$sql = "select * from products where id=:id";
$result = $connect->prepare($sql);
$result->bindParam(":id",$id);
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
    $name = $row['name'];
    $price = $row['price'];
}

$sql2 = "select * from basket where email=:email and name=:name";
$res2 = $connect->prepare($sql2);
$res2->bindParam(":email",$email);
$res2->bindParam(":name",$name);
$res2->execute();
while ($row = $res2->fetch(PDO::FETCH_ASSOC))
{
    if (!empty($row["count"]))
    {

        $count = $row["count"];

    }else{

        $count = 0;
    }
}


if ($count > 0)
{

    $sql3 = "update basket set count=:count where name=:name";
    $res3 = $connect->prepare($sql3);
    $count++;
    $res3->bindParam(":count",$count);
    $res3->bindParam(":name",$name);
    $res3->execute();

}else{

    $sql4 = "insert into basket (name,email,price,count) values (:name,:email,:price,:count)";
    $res4 = $connect->prepare($sql4);
    $count2 = 1;
    $res4->bindParam(":name",$name);
    $res4->bindParam(":email",$email);
    $res4->bindParam(":price",$price);
    $res4->bindParam(":count",$count2);
    $res4->execute();
}

header("location:basket.php");




?>

<!--  = jQuery - CDN with local fallback =  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<!--  = Bootstrap =  -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>


</body>
</html>


