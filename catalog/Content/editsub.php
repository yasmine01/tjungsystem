<!-- SOme declarations -->
<?php
  $id = $value['SubCategoriesId'];
  $name = $value['SubCategoriesName'];
  $cid = $value['MainCategoriesId'];
  $cname = $value['MainCategoriesName'];
  $image = $value['Image'];
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
                <div class="row">
                <div id=  "edit_status_text1<?php echo $id; ?>"  style="margin-bottom: 30px;" > </div>
                    <div class="col-lg-12"  style="margin-top:10px">
                      <label>Category Name</label>
             <select  class="form-control" name="cat_name" id="edit_cat_name<?php echo $id; ?>">
                <option value="<?php echo $cid; ?>"><?php echo $cname;?></option>
                <?php
                $category = new ManageSubCategory;
                $result = $category->getCategory();
                foreach ($result as $key => $value) {
                echo '<option value="'.$value['MainCategoriesId'].'">'.$value['MainCategoriesName'].'</option>';
                }
                ?>
                </select>
                </div>
                 <div class="col-lg-12" style="margin-top:10px">
                       <label>Sub-Category Name</label> <input  class="form-control" type="text" id="edit_subcat_name<?php echo $id; ?>" name="edit_subcat_name" value="<?php echo $name; ?>">
                    </div>
                    <input  class="form-control" type="hidden" id="edit_subcat_id<?php echo $id; ?>" name="edit_subcat_name" value="<?php echo $id; ?>">
                    <div class="col-lg-12" style="margin-top:10px">
                         <label>Select Sub Catagory Image</label>
                    <div class="image-upload">
    <label style="width:250px" for="edit_ppt<?php echo $id; ?>" data-role="button"  data-inline="true" data-mini="true" data-corners="false">
         <img id="edit_uploadPreview<?php echo $id; ?>" src="<?php echo $image; ?>"  style="width:250px; height:200px; margin-top:10px" class="img-thumbnail">
    </label>
</div>
                     <input id="edit_ppt<?php echo $id; ?>" onchange="edit_encodeImageFileAsURL<?php echo $id; ?>();" accept=".png,.jpeg,.jpg" type="file" name="image" multiple data-role="button"  data-inline="true" data-mini="true" data-corners="false" style="opacity: 0;"/>
                   </div>

                 </div>
                        
                          
                        
                </div>
               
                <div class="modal-footer"  style="    margin-top: -28px;">
                <button type="button" id="edit_close<?php echo $id; ?>" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit"  id="edit_submit<?php echo $id; ?>" name="submit" value="Edit" class="btn btn-primary"/>
            </div>
                
                
            </div>
           
            
        </div>
    </div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("edit_ppt<?php echo $id; ?>").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("edit_uploadPreview<?php echo $id; ?>").src = oFREvent.target.result;
        };
    };
</script>  
<script>
var base64img ="";
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
$("#edit_submit<?php echo $id; ?>").click(function(){
    //get the form values
 var subcat_id = $('#edit_subcat_id<?php echo $id; ?>').val();
 var edit_subcat = $('#edit_subcat_name<?php echo $id; ?>').val();
 var edit_cat = $('#edit_cat_name<?php echo $id; ?>').val();
 
 if(base64img == ""){
   var edit_image = <?php echo json_encode($image); ?>;
 }else{
   var edit_image = base64img;
 };
 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"subcat_id":subcat_id,"edit_subcat":edit_subcat,"edit_cat":edit_cat,"edit_image":edit_image};
 //call your .php script in the background, 
 //when it returns it will call the success function if the request was successful or 
 //the error one if there was an issue (like a 404, 500 or any other error status)
 $.ajax({
    url : "catalog/Content/manage.subcategory.php",
    type: "POST",
    data : myData,
    success: function(data,status,xhr)
     {
        //if success then just output the text to the status div then clear the form inputs to prepare for new data
        
        $("#edit_status_text1<?php echo $id; ?>").html(data);
        $('#edit_subcat_name<?php echo $id; ?>').val();
        $('#edit_cat_name<?php echo $id; ?>').val();
    }

}); 
}); 
$("#edit_close<?php echo $id; ?>").click(function(){
    location.reload();
});
</script>