<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TracSec | Tjungstech</title>
    <link rel="shortcut icon" href="fa fa-facebook" />
    <!-- Bootstrap -->
    <link href="css/tjungstech-bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/tjungstech-font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/tjungstech-nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/tjungstech-custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
       <!--side navigation-->
        <?php
        include_once ('catalog/sidemenu.php');
        ?>
        <!--side navigation -->
        <!-- top navigation -->
        <?php
        include_once ('catalog/topmenu.php');
        ?>
        <!-- /top navigation -->
        <!-- page content -->
        <?php
        include_once ('catalog/content.php');
        ?>
        <!-- /page content -->
        <!-- footer content -->
        <?php
        include_once('catalog/footer.php');
        ?>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- NProgress -->
<script src="js/nprogress.js"></script>
<!-- Custom Theme Scripts -->
<script src="js/custom.min.js"></script>


</body>
</html>