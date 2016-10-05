<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Sub-category</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                <div id=  "status_text1"  style="margin-bottom: 30px;" > </div>
                    <div class="col-lg-12"  style="margin-top:10px">
                      <label>Category Name</label>
             <select  class="form-control" name="cat_name" id="cat_name">
                <option value="">Select</option>
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
                       <label>Sub-Category Name</label> <input  class="form-control" type="text" id="subcat_name" name="subcat_name">
                    </div>
                    
                    <div class="col-lg-12" style="margin-top:10px">
                         <label>Select Sub Catagory Image</label>
                    <div class="image-upload">
    <label style="width:250px" for="ppt" data-role="button"  data-inline="true" data-mini="true" data-corners="false">
         <img id="uploadPreview" src="././images/SelectImg.jpg"  style="width:250px; height:200px; margin-top:10px" class="img-thumbnail">
    </label>
</div>
                     <input id="ppt" onchange="encodeImageFileAsURL();" accept=".png,.jpeg,.jpg" type="file" name="image" multiple data-role="button"  data-inline="true" data-mini="true" data-corners="false" style="opacity: 0;"/>
                   </div>

                 </div>
                        
                          
                        
                </div>
               
                <div class="modal-footer"  style="    margin-top: -28px;">
                <button type="button" id="btn_close" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit"  id="btn_submit" name="submit" value="Save" class="btn btn-primary"/>
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
            document.getElementById("uploadPreview").src = oFREvent.target.result;
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
$("#btn_submit").click(function(){
    //get the form values
 var subcat_name = $('#subcat_name').val();
 var cat_name = $('#cat_name').val(); 
 var image = base64img;
 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"subcat_name":subcat_name,"cat_name":cat_name,"image":image};
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
        
        $("#status_text1").html(data);
        $('#subcat_name').val();
        $('#cat_name').val();
    }

}); 
}); 
$("#btn_close").click(function(){
  location.reload();
});
</script>