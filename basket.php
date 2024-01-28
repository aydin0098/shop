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

<div class="master-wrapper">

    <!--  ==========  -->
    <!--  = Header =  -->
    <!--  ==========  -->
    <header id="header">
        <div class="container">
            <div class="row">

                <!--  ==========  -->
                <!--  = Logo =  -->
                <!--  ==========  -->
                <div class="span7">

                    <a class="brand" href="index.html">
                        <img src="images/logo.png" alt="Webmarket Logo" width="48" height="48"/>
                        <span class="pacifico">Webmarket</span>

                        <span class="tagline">قالب فروشگاهی HTML قدرتمند</span>
                    </a>

                    <?php
                    if (isset($_SESSION['email']))
                    {
                        ?>
                        <span class="tagline"><?="کاربر ".$_SESSION['email']." خوش آمدید"?></span>
                    <?php }else{ ?>
                        <form action="login.php" method="post">
                            <div class="row flex">
                                <div class="form-group flex">
                                    <label for="name">نام کاربری</label>
                                    <input name="name" id="name" class="form-control" placeholder="نام کاربری...">
                                </div>
                                <div class="form-group flex">
                                    <label for="name">رمز عبور</label>
                                    <input name="pass" id="name" class="form-control" placeholder="رمز عبور...">
                                </div>
                                <button class="btn btn-success" type="submit">ورود</button>
                            </div>

                        </form>
                    <?php } ?>

                </div>
            </div>
        </div>
    </header>


    <!--  ==========  -->
    <!--  = Main container =  -->

    <!--  ==========  -->
    <!--  = New Products =  -->
    <!--  ==========  -->
    <div class="boxed-area blocks-spacer">
        <div class="container">

            <!--  ==========  -->
            <!--  = Title =  -->
            <!--  ==========  -->
            <div class="row">
                <div class="span12">
                    <div class="main-titles lined">
                        <h2 class="title"><span class="light">محصولات</span> جدید فروشگاه</h2>
                    </div>
                </div>
            </div> <!-- /title -->

            <table class="table table-bordered">
                <tr>
                    <th>ردیف</th>
                    <th>نام محصول</th>
                    <th>خریدار</th>
                    <th>قیمت</th>
                    <th>تعداد</th>
                    <th>عملیات</th>
                </tr>
                <tbody>
                <?php
                $email = $_SESSION['email'];
                $sql = "select * from basket where email=:email";
                $result = $connect->prepare($sql);
                $result->bindParam(":email",$email);
                $result->execute();
                while ($row = $result->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['price']?></td>
                    <td><?=$row['count']?></td>
                    <td><a href="deletecart.php?id=<?=$row['id']?>">حذف از سبد خرید</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div> <!-- /new products -->


</div> <!-- end of master-wrapper -->


<!--  = jQuery - CDN with local fallback =  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<!--  = Bootstrap =  -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>


</body>
</html>


