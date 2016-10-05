
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard| Nailsys</title>

    <!-- Bootstrap -->
    <link href="../css/tjungstech-bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/fonts/font-awesome.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../css/tjungstech-nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../css/tjungstech-custom.min.css" rel="stylesheet">
    <link href="../css/fonts/font-awesome.min.css" rel="stylesheet">
    <link href="../css/less/glyphicons.less" rel="stylesheet">
</head>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-anchor"></i> <span>NailSys</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $username; ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3 style="margin-top:10px">GENERAL</h3>
                <ul class="nav side-menu">
                    <li id="workbench_id"><a href="?page=workbench"><i class="fa fa-home"></i> My Workbench </span></a>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Manage <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="?page=category">Category</a></li>
                            <li><a href="?page=subcategory">Sub-Category</a></li>
                            <li><a href="?page=services">Services</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-user"></i> Account <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="?page=customer">Customer</a></li>
                            <li><a href="?page=nailtech">Nail technician</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> Monitor <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a>Dealer 1 <span class="fa fa-chevron-down"></a></span>
                            <ul class="nav child_menu">
                                <li><a href="general_elements.html">1453810207(Online)</a></li>
                                <li><a href="general_elements.html">1453810251(Offline)</a></li>
                            </ul>
                                </li>

                            <li><a href="media_gallery.html">Dealer 2</a>
                                <ul class="nav child_menu">
                                    <li><a href="general_elements.html">1453810207(Online)</a></li>
                                    <li><a href="general_elements.html">1453810251(Offline)</a></li>
                                </ul>

                            </li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Report <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="tables.html">Tables</a></li>
                            <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                        </ul>
                    </li>


                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="fa fa-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="fa fa-arrows-alt" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="fa fa-eye-slash" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="fa fa-power-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
<script>
   $(function () {
       $('workbench_id').click(function () {
           alert(0);
       })
   })
</script>
</html>