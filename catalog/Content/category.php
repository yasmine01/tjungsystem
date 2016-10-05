<?php
	include_once('manage.category.php');
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
    <style>
        #cat img:hover{
            opacity: .6;
        }
    </style>

</head>


<div class="right_col" role="main" style="min-height: 2093px;">


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" >

            <div class="x_panel">
                <div class="x_title">

                    <h2>Category<small>list</small></h2>

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

                    <div class="row">
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
                      xmlhttp.open("GET","catalog/Content/manage.category.php?search="+str,true);
                      xmlhttp.send();
                    }
                    </script>


                        <?php
                            if($list_category == 0){
                        ?>
                        
                            <h2>No categories added!</h2>
                        
                            <?php
                            }
                        else{
                                foreach ($list_category as $key => $value) {
                            ?>
                             <div class="col-lg-3 col-md-6  col-xs-12 col-ms-1 text-center" style="margin-top:20px">
                             <div id="cat">
                                  <div class="img-thumbnail">
                                   <?php
                                $src = $value['Images'];

                                // Echo out a sample image
                                echo '<img src="'.$src.'" class="img-thumbnail" style="height:200px;width:250px">';
                                ?>
                              <div class="row">
                                  <div class="col-lg-12">
                                      <h3 style="text-size:30px; float:left; color:black" > <?php echo $value['MainCategoriesName']; ?></h3>

                                    <input type="hidden" name="txt_delete" id="txt_delete<?php echo $value['MainCategoriesId']; ?>" value="<?php echo $value['MainCategoriesId']; ?>">
                                    <img src="././images/deleteIcon.png" style="float: right;width: 30px;height: 30px;margin-top: 7px;" id="btn_delete<?php echo $value['MainCategoriesId']; ?>">
                                    
                                    <img src="././images/editIcon.png" style="float: right;width: 30px;height: 30px;margin-top: 9px;" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $value['MainCategoriesId']; ?>">
                                    <?php
                                    include ("editcat.php");
                                    ?>
                                  </div>
                                  
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
$("#btn_delete<?php echo $value['MainCategoriesId']; ?>").click(function(){
    
if (confirm("Do want to Delete <?php echo $value['MainCategoriesName']; ?>?") == true) {

var delcat = $('#txt_delete<?php echo $value['MainCategoriesId']; ?>').val();
 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"delcat":delcat};
 //call your .php script in the background, 
 //when it returns it will call the success function if the request was successful or 
 //the error one if there was an issue (like a 404, 500 or any other error status)
 $.ajax({
    url : "catalog/Content/manage.category.php",
    type: "POST",
    data : myData,
    success: function(data,status,xhr)
     {
        //if success then just output the text to the status div then clear the form inputs to prepare for new data
        $("#status_text").html(data);
        location.reload();
         }

}); 
 
                                    
}
}); 
</script>
                                     
                              
                                      </div>
                              </div>
                                 </div>

                            </div>
                            <?php
                                }
                            }
                            ?>
                            <div class="col-lg-3 col-md-6  col-xs-12 col-ms-1 text-center" style="margin-top:20px">
                                <div class="img-thumbnail">
                                    <img src="././images/add.jpg"  data-toggle="modal" data-target=".bs-example-modal-lg" class="img-thumbnail btn btn-default"  style="height:200px;width:250px">
                                    <h3 style="text-size:30px" >Add Category </h3>
                                    <?php
                            include ("addcategory.php");
                            ?>
      
                                </div>
                        </div>
                        
                         

                    </div>
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

<style>
#pimg
{
height:150px;
width:150px;
float:left;

}
.protext
{
        margin-top:100px;
        width:100%;
        height:20%; 
        border:0px;
        padding:10px 5px 8px 5px;
        color:black;
        background:rgba(0,0,0,0.4);
}
</style>


<style type="text/css">
#style_text{
    left: 50%;
    background-color: rgb(0, 77, 153,0.5);
    height: 100px;
}
</style>
</html>

