<!-- SOme declarations -->
<?php
  $id = $value['MainCategoriesId'];
  $name = $value['MainCategoriesName'];
  $image = $value['Images'];
?>
<div class="modal fade bs-example-modal-lg<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit <?php echo $name; ?></h4>
            </div>
            <div class="modal-body">
              <!-- <div id="status_text"></div> -->
               <div class="row">
                               <div class="col-lg-12">
                                   <label style="float:left">Category Name</label>
                     <input type="text"  class="form-control" id="edit_cat_name<?php echo $id; ?>" name="edit_cat_name" value="<?php echo $name; ?>">
                     <input type="hidden"  class="form-control" id="edit_cat_id<?php echo $id; ?>" name="edit_cat_id" value="<?php echo $id; ?>">
                       
                       <div class="image-upload">
    <label style="width:250px" for="edit_ppt<?php echo $id; ?>" data-role="button"  data-inline="true" data-mini="true" data-corners="false">
         <img id="edit_uploadPreview<?php echo $id; ?>" src="<?php echo $image; ?>"  style="width:250px; height:200px; margin-top:10px" class="img-thumbnail">
    </label>
</div>
                     <input id="edit_ppt<?php echo $id; ?>" onchange="edit_encodeImageFileAsURL<?php echo $id; ?>();" accept=".png,.jpeg,.jpg" type="file" name="image" multiple data-role="button"  data-inline="true" data-mini="true" data-corners="false" style="opacity: 0;"/>
                   </div>
                   
                  
                               </div>

                 <h5 id="success-id-edit<?php echo $id; ?>" style="margin-bottom:30px; margin-top:-100px;color:green"><?php echo $name; ?> edited successfully</h5>
                <h5 id="error-cat-edit<?php echo $id; ?>" style="margin-bottom:30px; margin-top:-100px;color:Red"></h5>
              
                <img src="././images/loading1.gif" style="margin-bottom:30px; margin-top:-15px" id="loading-edit<?php echo $id; ?>">
            </div>
            
        
           <div class="modal-footer" style="    margin-top: -28px;">
                <button type="button" class="btn btn-default" id="edit_close<?php echo $id; ?>" data-dismiss="modal">Close</button>
                <input type="submit"  id="btn_edit<?php echo $id; ?>" name="submit" value="Edit" class="btn btn-primary"/>
                       </div>
              
        </div>
         
        </div>
    </div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script>
    var base64img ="";
    $(function(){
         $("#success-id-edit<?php echo $id; ?>").hide();
        $("#error-cat-edit<?php echo $id; ?>").hide();
             //$("#uploadPreview").src="../../images/SelectImg.jpg";
        $("#loading-edit<?php echo $id; ?>").hide();
    });
    

    $("#edit_close<?php echo $id; ?>").click(function(){
          $("#success-id-edit<?php echo $id; ?>").hide();
         $("#error-cat-edit<?php echo $id; ?>").hide();
         $("#loading-edit<?php echo $id; ?>").hide();
         location.reload();
    });
    $("input").change(function(e) {

    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

        var file = e.originalEvent.srcElement.files[i];

        var img = document.createElement("selectImg");
        var reader = new FileReader();
        reader.onloadend = function() {
             img.src = reader.result;
        }
        reader.readAsDataURL(file);
        $("input").after(img);
    }
});
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
 //base64 images//
 function edit_encodeImageFileAsURL<?php echo $id; ?>() {

    var filesSelected = document.getElementById("edit_ppt<?php echo $id; ?>").files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];

      var fileReader = new FileReader();

      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64
         base64img=srcData;
       
      }
      fileReader.readAsDataURL(fileToLoad);
    }
    var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("edit_ppt<?php echo $id; ?>").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("edit_uploadPreview<?php echo $id; ?>").src = oFREvent.target.result;
        };
  }
//on the click of the submit button 
    function InputValidation<?php echo $id; ?>()
    {
           $("#loading-edit<?php echo $id; ?>").show();
          $("#error-id-edit<?php echo $id; ?>").hide();
        $("#success-id-edit<?php echo $id; ?>").hide();
         document.getElementById("error-cat-edit<?php echo $id; ?>").innerHTML="";
        var errorList = new Array();
        
       // alert(00);
        var catName= $("#edit_cat_name<?php echo $id; ?>").val();
//                    $("#error-id").show();
//                $("#success-id").hide();
//                 $("#loading").hide();
        if(catName.length==0)
            {
                 errorList.push('Please Enter Catagory Name');
            }
       
        if(catName.length>0){
             
    //get the form values
 var edit_cat = $('#edit_cat_name<?php echo $id; ?>').val();
 var cat_id =  $('#edit_cat_id<?php echo $id; ?>').val();
 if(base64img == ""){
   var form_data = <?php echo json_encode($image); ?>;
 }else{
   var form_data = base64img;
 };

 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"edit_cat":edit_cat,"cat_id":cat_id,"image":form_data};
 //call your .php script in the background, 
 //when it returns it will call the success function if the request was successful or 
 //the error one if there was an issue (like a 404, 500 or any other error status)
 $.ajax({
  //alert(0);
    url : "catalog/Content/manage.category.php",
    type: "POST",
    data : myData,
    success: function(data,status,xhr)
     {
        //if success then just output the text to the status div then clear the form inputs to prepare for new data
     //   $("#status_text").html(data);

       $("#loading-edit<?php echo $id; ?>").hide();
        $("#edit_cat_name<?php echo $id; ?>").val();
         $("#success-id-edit<?php echo $id; ?>").show();
          $("#error-cat-edit<?php echo $id; ?>").hide();
       base64img="";
         
         }

}); 
             
        }
        for(var i = 0 ; i<errorList.length ; i++)
            {
               $("#loading-edit<?php echo $id; ?>").hide();
                 $("#error-cat-edit<?php echo $id; ?>").show();
                
                    document.getElementById("error-cat-edit<?php echo $id; ?>").innerHTML  += errorList[i] +" <br />";
            }
    }
$("#btn_edit<?php echo $id; ?>").click(function(){ 
    
    InputValidation<?php echo $id; ?>();

}); 
// check Category
//$("#cat_name").click(function(){
//    //get the form values  
// var cat_names = $('#cat_name').val();     
// if (cat_names == "") {
//    document.getElementById("txt_names").innerHTML = "";
//        return;
// }else{
//    
// // make the postdata
// // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
// // alert(postData);
// var myData={"cat_names":cat_names};
// //call your .php script in the background, 
// //when it returns it will call the success function if the request was successful or 
// //the error one if there was an issue (like a 404, 500 or any other error status)
// $.ajax({
//    url : "catalog/Content/manage.category.php",
//    type: "POST",
//    data : myData,
//    success: function(data,status,xhr)
//     {
//        //if success then just output the text to the status div then clear the form inputs to prepare for new data
//        $("#txt_names").html(data);
//         
//         }
//
//}); 
// };
//});
</script>