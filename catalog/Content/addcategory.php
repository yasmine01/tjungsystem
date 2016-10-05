<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add category</h4>
            </div>
            <div class="modal-body">
               
               <div class="row">
                               
                               <div class="col-lg-12">
                                   <label style="float:left">Category Name</label>
                     <input type="text"  class="form-control" id="cat_name" name="cat_name">
                       
                       <div class="image-upload">
    <label style="width:250px" for="ppt" data-role="button"  data-inline="true" data-mini="true" data-corners="false">
         <img id="uploadPreview" src="././images/SelectImg.jpg"  style="width:250px; height:200px; margin-top:10px" class="img-thumbnail">
    </label>
</div>
                     <input id="ppt" onchange="encodeImageFileAsURL();" accept=".png,.jpeg,.jpg" type="file" name="image" multiple data-role="button"  data-inline="true" data-mini="true" data-corners="false" style="opacity: 0;"/>
                   </div>
                   
                  
                               </div>
                 <h5 id="success-id" style="margin-bottom:30px; margin-top:-100px;color:green">New Catagory added successfully</h5>
                <h5 id="error-cat" style="margin-bottom:30px; margin-top:-100px;color:Red"></h5>
              
                <img src="././images/loading1.gif" style="margin-bottom:30px; margin-top:-15px" id="loading">
            </div>
            
        
           <div class="modal-footer" style="    margin-top: -28px;">
                <button type="button" class="btn btn-default" id="btn_close" data-dismiss="modal">Close</button>
                <input type="submit"  id="btn_submit" name="submit" value="Save" class="btn btn-primary"/>
                       </div>
              
        </div>
         
        </div>
    </div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script>
    var base64img ="";
    $(function(){
         $("#success-id").hide();
        $("#error-cat").hide();
             //$("#uploadPreview").src="../../images/SelectImg.jpg";
        $("#loading").hide();
    });
    

    $("#btn_close").click(function(){
          $("#success-id").hide();
         $("#error-cat").hide();
         $("#loading").hide();
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
 function encodeImageFileAsURL() {

    var filesSelected = document.getElementById("ppt").files;
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
        oFReader.readAsDataURL(document.getElementById("ppt").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
  }
//on the click of the submit button 
    function InputValidation()
    {
           $("#loading").show();
          $("#error-id").hide();
        $("#success-id").hide();
         document.getElementById("error-cat").innerHTML="";
        var errorList = new Array();
        
       // alert(00);
        var catName= $("#cat_name").val();
//                    $("#error-id").show();
//                $("#success-id").hide();
//                 $("#loading").hide();
        if(catName.length==0)
            {
                 errorList.push('Please Enter Catagory Name');
            }
        if(base64img.length==0)
            {
                 errorList.push('Please select 250px X 200px image');
                  
            }
       
        if(catName.length>0 && base64img.length>0){
             
    //get the form values
 var cat_name = $('#cat_name').val(); 
 var form_data = base64img;
 //alert(form_data);

 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"cat_name":cat_name,"file":form_data};
//alert(0);
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
       $("#loading").hide();
        $("#cat_name").val(" ");
         $("#success-id").show();
          $("#error-cat").hide();
       base64img="";
         
         }

}); 
             
        }
        for(var i = 0 ; i<errorList.length ; i++)
            {
               $("#loading").hide();
                 $("#error-cat").show();
                
                    document.getElementById("error-cat").innerHTML  += errorList[i] +" <br />";
            }
    }
$("#btn_submit").click(function(){ 
    
    
    InputValidation();

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
