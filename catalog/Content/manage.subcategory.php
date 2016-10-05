<?php
  include_once('class.manage.subcategory.php');
  $init = new ManageSubCategory();

  if(isset($_GET['subcat']))
    {
        $subcat = $_GET['subcat'];
        $count = $init->countSubCategory();
        $list_subcategory = $init->listIdSubCategory($subcat);

    }elseif (isset($_POST['searcher'])) {
        $value = $_POST['searcher'];
        $count = $init->countSubCategory();
        $list_subcategory = $init->listSearchSubCategory($value);
    }else{
      $count = $init->countSubCategory();
        if ($count == 0) {
         $list_subcategory = 0;
        }else{
        if(isset($_GET['pages'])){ // This filter only get variables
          $page = preg_replace("#[^0-9]#","",$_GET['page']);
        }else{
          $page = 1;
        }
        $perPage = 6;
        // Extra error handler
        $test = $count/$perPage;
        $lastPage = round($count/$perPage); //Round off number so we get certains amount per page
        // page error handller
        if($test > $lastPage){
          $lastPage = $lastPage+1;
        }
        if($page < 1){
          $page = 1;
        }
        elseif($page > $lastPage){
          $page = $lastPage;
        }

        $limit1 = ($page-1)*$perPage;
        $limit2 = $perPage;

        $list_subcategory = $init->listSubCategory($limit1,$limit2);

        $pagination = "";
        
        if($lastPage != 1){
          if($page != $lastPage){
          $next = $page+1;
          $pagination.= '<a href="?pages='.$next.'">Next</a>';
          }
          if($page != 1){
          $prev = $page-1;
          $pagination.= '<a href="?pages='.$prev.'">Previous</a>';
          }
        }
      }
  }

  if(isset($_POST['subcat_name'])){
    $subcat_name = $_POST['subcat_name'];
    $cat_name = $_POST['cat_name'];
    $image = $_POST['image'];
    
    $insert = $init->addSubCategory($subcat_name,$cat_name,$image);

    if ($insert == 1) {
      echo 'Sub-category ('.$subcat_name.') added successfully!';
    }else{
      echo 'There was an error.';
    }
  }

  if(isset($_POST['delsub'])){
    $id = $_POST['delsub'];
    $delete = $init->deleteSubCategory($id);
    if($delete == 1)
    {
      echo '<div class="alert alert-danger" style="align:center;">
            <strong>Deleted</strong>'.$id.' successfully!
            </div>';
    }
    else
    {
      echo '<div class="alert alert-danger">
            <strong>Sorry</strong> there was an error!
            </div>';
    }
  }
  if(isset($_POST['subcat_id'])){
    $subcat_id = $_POST['subcat_id'];
    $edit_subcat = $_POST['edit_subcat'];
    $edit_cat = $_POST['edit_cat'];
    $edit_image = $_POST['edit_image'];
    
    $insert = $init->editSubCategory($subcat_id,$edit_subcat,$edit_cat,$edit_image);

    if ($insert == 1) {
      echo 'Sub-Category ('.$edit_subcat.') edited successfully!';
    }else{
      echo 'There was an errorz.';
    }
  }
  
  if (isset($_GET['search'])){
    $search = $_GET['search'];

    $check = $init->searchSubCategory($search);
    if (isset($check) && $check != "") {
         foreach ($check as $key => $value) {
      echo '
      <a href="?page=subcategory&subcat='.$value['SubCategoriesId'].'">
        '.$value["SubCategoriesName"].'
        <img src="'.$value['Image'].'" style="height:50px;width:50px">
      </a>
      <br>';
    }
    }else{
      echo 0;
    }
  }

?>