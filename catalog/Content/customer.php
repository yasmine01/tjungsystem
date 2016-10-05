<?php
    include_once('manage.customer.php');
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
    <!-- Customers thumbnail List -->
                   
                      
                   
                    <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                       
                      </div>

                      <div class="clearfix"></div>

                      <?php
                            if($list_customer == 0){
                            ?>
                            <h2>No Customer added!</h2>
                            <?php
                            }else{
                                foreach ($list_customer as $key => $value) {
                                     if(isset($value['MName']) && $value['MName'] == "")
                                        $customer = $value['FName'].' '.$value['MName'].' '.$value['LName'];
                                    else
                                        $customer = $value['FName'].' '.$value['LName']
                            ?>

                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                       <div class="img-thumbnail">
                           
                          <div class="col-sm-12">
                           <div class="left col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="img-circle img-responsive" style="margin-top:15px">
                            </div>
                            <div class="left col-xs-7">
                              <h2><?php echo $customer; ?></h2>
                              <p><strong>Gender: </strong> <?php echo $value['Gender']; ?> </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Email:<br> <?php echo $value['Email']; ?></li>
                                <li><i class="fa fa-phone"></i> Phone :<br> <?php echo $value['Number']; ?></li>
                              </ul>
                            </div>
                           
                          </div>

                          <div class="col-xs-12 bottom text-center">
                            
                            <div class="col-xs-12 col-sm-6 emphasis">
                                                           <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div></div>
                      </div>
                       <?php } } ?>
                       <!--
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                       <div class="img-thumbnail">
                           
                          <div class="col-sm-12">
                           <div class="left col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="img-circle img-responsive" style="margin-top:15px">
                            </div>
                            <div class="left col-xs-7">
                              <h2>Customer's Name</h2>
                              <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                           
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            
                            <div class="col-xs-12 col-sm-6 emphasis">
                                                           <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div></div>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                       <div class="img-thumbnail">
                           
                          <div class="col-sm-12">
                           <div class="left col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="img-circle img-responsive" style="margin-top:15px">
                            </div>
                            <div class="left col-xs-7">
                              <h2>Customer's Name</h2>
                              <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                           
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            
                            <div class="col-xs-12 col-sm-6 emphasis">
                                                           <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div></div>
                      </div>
                    
 <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                       <div class="img-thumbnail">
                           
                          <div class="col-sm-12">
                           <div class="left col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="img-circle img-responsive" style="margin-top:15px">
                            </div>
                            <div class="left col-xs-7">
                              <h2>Customer's Name</h2>
                              <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                           
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            
                            <div class="col-xs-12 col-sm-6 emphasis">
                                                           <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div></div>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                       <div class="img-thumbnail">
                           
                          <div class="col-sm-12">
                           <div class="left col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="img-circle img-responsive" style="margin-top:15px">
                            </div>
                            <div class="left col-xs-7">
                              <h2>Customer's Name</h2>
                              <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                           
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            
                            <div class="col-xs-12 col-sm-6 emphasis">
                                                           <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div></div>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                       <div class="img-thumbnail">
                           
                          <div class="col-sm-12">
                           <div class="left col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="img-circle img-responsive" style="margin-top:15px">
                            </div>
                            <div class="left col-xs-7">
                              <h2>Customer's Name</h2>
                              <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                           
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            
                            <div class="col-xs-12 col-sm-6 emphasis">
                                                           <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

    <!-- /top tiles -->


                     

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
$("#btn_delete<?php echo $value['Id']; ?>").click(function(){
var x;
if (confirm("Do want to Delete Customer ( <?php echo $cutomer; ?> )  ?") == true) {
    //get the form values
 var delcus = $('#txt_delete<?php echo $value['Id']; ?>').val();
 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"delcus":delcus};
 //call your .php script in the background, 
 //when it returns it will call the success function if the request was successful or 
 //the error one if there was an issue (like a 404, 500 or any other error status)
 $.ajax({
    url : "catalog/Content/manage.customer.php",
    type: "POST",
    data : myData,
    success: function(data,status,xhr)
     {
        //if success then just output the text to the status div then clear the form inputs to prepare for new data
        $("#status_text").html(data);
        location.reload();
         }

}); 
 } else {
    x = "You pressed Cancel!";
}
}); 
</script>
                      
                        <?php
                        include ("editcustomer.php");
                        ?>
                        </td>
                            </tr>
                            <?php
                                {
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