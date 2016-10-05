<!-- SOme declarations -->
<?php
  $id = $value['ServiceId'];
  $name = $value['ServiceName'];
  $cid = $value['MainCategoriesId'];
  $cname = $value['MainCategoriesName'];
  $sid = $value['SubCategoriesId'];
  $sname = $value['SubCategoriesName'];
  $image = $value['Photo'];
  $price = $value['Price'];
  $description = $value['Description'];
  $location = $value['Location'];
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
                <div id="edit_status_text1<?php echo $id; ?>">
                  </div>
                  <input type="hidden" id="edit_service_id<?php echo $id; ?>" name="service_name" value="<?php echo $id; ?>">

                Name: <input type="text" id="edit_service_name<?php echo $id; ?>" name="service_name" value="<?php echo $name; ?>"><br><br>

                Category: <select name="cat_name" id="edit_cat_name<?php echo $id; ?>">
                <option value="<?php echo $cid; ?>"><?php echo $cname; ?></option>
                <?php
                $category = new ManageServices;
                $result = $category->getCategory();
                foreach ($result as $key => $value) {
                echo '<option value="'.$value['MainCategoriesId'].'">'.$value['MainCategoriesName'].'</option>';
                }
                ?>
                </select><br><br>

                Sub-Category: <select name="subcat_name" id="edit_subcat_name<?php echo $id; ?>">
                <option value="<?php echo $sid; ?>"><?php echo $sname; ?></option>
                <?php
                $category = new ManageServices;
                $result = $category->getSubCategory();
                foreach ($result as $key => $value) {
                echo '<option value="'.$value['SubCategoriesId'].'">'.$value['SubCategoriesName'].'</option>';
                }
                ?>
                </select><br><br>

                Price: Rs<input type="text" id="edit_price<?php echo $id; ?>" name="price" value="<?php echo $price; ?>"><br><br>

                Description: <textarea id="edit_description<?php echo $id; ?>" name="description"><?php echo $description; ?>
                </textarea><br><br>
                 <div class="col-lg-12" style="margin-top:10px">
                         <label>Select Service Image</label>
                    <div class="image-upload">
                        <label style="width:250px" for="edit_ppt<?php echo $id; ?>" data-role="button"  data-inline="true" data-mini="true" data-corners="false">
                             <img id="edit_uploadPreview<?php echo $id; ?>" src="<?php echo $image; ?>"  style="width:250px; height:200px; margin-top:10px" class="img-thumbnail">
                        </label>
                    </div>
                     <input id="edit_ppt<?php echo $id; ?>" onchange="edit_encodeImageFileAsURL<?php echo $id; ?>();" accept=".png,.jpeg,.jpg" type="file" name="image" multiple data-role="button"  data-inline="true" data-mini="true" data-corners="false" style="opacity: 0;"/>
                </div>


                Location: <input type="text" id="edit_location<?php echo $id; ?>" name="location" value="<?php echo $location; ?>"><br><br>
                

            </div>
            <div class="modal-footer">
                <button type="button" id="edit_close<?php echo $id; ?>" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit"  id="edit_btn<?php echo $id; ?>" name="submit" value="Save" class="btn btn-primary"/>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("ppt").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("edit_uploadPreview").src = oFREvent.target.result;
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
$("#edit_btn<?php echo $id; ?>").click(function(){
    //get the form values
 var service_id = $('#edit_service_id<?php echo $id; ?>').val();
 var edit_service_name = $('#edit_service_name<?php echo $id; ?>').val();
 var edit_subcat_name = $('#edit_subcat_name<?php echo $id; ?>').val();
 var edit_cat_name = $('#edit_cat_name<?php echo $id; ?>').val();
 var edit_price = $('#edit_price<?php echo $id; ?>').val();
 var edit_description = $('#edit_description<?php echo $id; ?>').val();
  if(base64img == ""){
   var edit_photo = <?php echo json_encode($image); ?>;
 }else{
   var edit_photo = base64img;
 };
 var edit_location = $('#edit_location<?php echo $id; ?>').val();

 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"service_id":service_id,"edit_service_name":edit_service_name,"edit_subcat_name":edit_subcat_name,"edit_cat_name":edit_cat_name,"edit_price":edit_price,"edit_description":edit_description,"edit_photo":edit_photo,"edit_location":edit_location};
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
        $("#edit_status_text1<?php echo $id; ?>").html(data);
        $('#edit_service_name<?php echo $id; ?>').val();
        $('#edit_subcat_name<?php echo $id; ?>').val();
        $('#edit_cat_name<?php echo $id; ?>').val();
        $('#edit_price<?php echo $id; ?>').val();
        $('#edit_description<?php echo $id; ?>').val();
        $('#edit_photo<?php echo $id; ?>').val();
        $('#edit_location<?php echo $id; ?>').val();
         }

}); 
}); 
$("#edit_close<?php echo $id; ?>").click(function(){
  location.reload();
});
</script>