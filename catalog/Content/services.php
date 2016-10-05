<?php
    include_once('manage.services.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


    <!-- Bootstrap -->
    <link href="../../css/tjungstech-bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../css/fonts/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../css/tjungstech-nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../css/tjungstech-custom.min.css" rel="stylesheet">

</head>


<div class="right_col" role="main" style="min-height: 2093px;">
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Services</span>
            <div class="count"><?php echo $count; ?></div>
        </div>
    </div>
    <!-- /top tiles -->

<div id="status_text"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">

                    <h2>Services<small>List</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">



                    <button style="background-color: #FF8000; border-color: #FF8000;border-radius:0px" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add services</button>
                    <?php
                    include ("addservices.php");
                    ?>

                    <form method="post" action="#">
                    <input type="text" name="searcher" size="60" onkeyup="showResult(this.value)" placeholder="Search by Name...">
                    <button type="submit"><img src="././images/active-search.png" width="30" height="30"></button>
                    </form>
                    <div id="livesearch" style="width:500px;"></div>
                    

                    <script type="text/javascript">
                    function showResult(str) {
                        var MyDiv1 = document.getElementById('livesearch');
                      if (str.length==0) {
                        document.getElementById("livesearch").innerHTML="";
                        return;
                      }
                      if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                      } else {  // code for IE6, IE5
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                      }
                      xmlhttp.onreadystatechange=function() {
                        if (this.readyState==4 && this.status==200) {
                            if (this.responseText == '0') {
                                return;
                            };
                          document.getElementById("livesearch").innerHTML=this.responseText;
                          document.getElementById("livesearch").style.border="1px solid #A5ACB2";
                        }
                      }
                      xmlhttp.open("GET","catalog/Content/manage.services.php?search="+str,true);
                      xmlhttp.send();
                    }
                    </script>

                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="check-all" class="flat">

                                </th>
                                <th class="column-title">No. </th>
                                <th class="column-title">Name </th>
                                <th class="column-title">Category type</th>
                                <th class="column-title">Sub-Category type</th>
                                <th class="column-title">Price</th>
                                <th class="column-title">Description</th>
                                <th class="column-title">Photo</th>
                                <th class="column-title">Location</th>
                                <th class="column-title no-link last"><span class="nobr">Operate</span>
                                </th>
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                            </thead>

                            <tbody id="livesearch">
                            <?php
                            if($list_services == 0){
                            ?>
                            <tr class="even pointer">
                                <td class=" " colspan="10" align="center">No service added!</td>
                            </tr>
                            <?php
                            }else{
                                foreach ($list_services as $key => $value) {
                            ?>
                            <tr class="even pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                </td>
                                <td class=" "><?php echo $value['ServiceId']; ?></td>
                                <td class=" "><?php echo $value['ServiceName']; ?></td>
                                <td class=" "><?php echo $value['MainCategoriesName']; ?></td>
                                <td class=" "><?php echo $value['SubCategoriesName']; ?></td>
                                <td class=" "><?php echo $value['Price']; ?></td>
                                <td class="a-right a-right "><?php echo $value['Description']; ?></td>
                                <td class=" "><img src="<?php echo $value['Photo']; ?>" style="height:50px;width:50px"></td>
                                <td class=" "><?php echo $value['Location']; ?></td>
                                <td class=" last">


                                <input type="hidden" name="txt_delete" id="txt_delete<?php echo $value['ServiceId']; ?>" value="<?php echo $value['ServiceId']; ?>">
                                <button class="btn btn-primary" id="btn_delete<?php echo $value['ServiceId']; ?>">Delete</button></a>

<script>
<!-- 
//Browser Support Code
 function ajaxFunction(){
 var ajaxRequest;  // The variable that makes Ajax possible!

 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 } }
//on the click of the submit button 
$("#btn_delete<?php echo $value['ServiceId']; ?>").click(function(){
var x;
if (confirm("Do want to Delete <?php echo $value['ServiceName']; ?>?") == true) {
    //get the form values
 var delser = $('#txt_delete<?php echo $value['ServiceId']; ?>').val();
 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"delser":delser};
 //call your .php script in the background, 
 //when it returns it will call the success function if the request was successful or 
 //the error one if there was an issue (like a 404, 500 or any other error status)
 $.ajax({
    url : "catalog/Content/manage.services.php",
    type: "POST",
    data : myData,
    success: function(data,status,xhr)
     {
        //if success then just output the text to the status div then clear the form inputs to prepare for new data
        $("#status_text").html(data);
        window.location.replace("http://localhost/nailsys/dealerdashboardIndex.php?page=services");
         }

}); 
 } else {
    x = "You pressed Cancel!";
}
}); 
</script>
                        <button style="background-color: #FF8000; border-color: #FF8000;border-radius:0px" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $value['ServiceId']; ?>">Edit</button>
                        <?php
                        include ("editser.php");
                        ?>
                        </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>


                            </tbody>
                        </table>
                    </div>
                </div>



                </div>

                </div>

        </div>
    </div>

<!--    end of table-->


<!--end2-->



    <br>






<!-- jQuery -->
<script src="../../js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../js/fastclick.js"></script>
<!-- NProgress -->
<script src="../../js/nprogress.js"></script>
<!-- Custom Theme Scripts -->
<script src="../../js/custom.min.js"></script>
<!-- iCheck -->
<script src="../../js/icheck.min.js"></script>

<style type="text/css">
#style_text{
    left: 50%;
    background-color: rgb(0, 77, 153,0.5);
    height: 100px;
}
</style>
</html>