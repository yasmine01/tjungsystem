<?php
	include_once('class.manage.category.php');
	$init = new ManageCategory();

	if(isset($_GET['cat']))
		{
		    $cat = $_GET['cat'];
        $count = $init->countCategory();
		    $list_category = $init->listIdCategory($cat);
		}elseif (isset($_POST['searcher'])) {
        $value = $_POST['searcher'];
        $count = $init->countCategory();
        $list_category = $init->listSearchCategory($value);
    }
    else{
	  	$count = $init->countCategory();
      if ($count == 0) {
         $list_category = 0;
        }else{
        if(isset($_GET['pages'])){ // This filter only get variables
          $page = preg_replace("#[^0-9]#","",$_GET['page']);
        }else{
          $page = 1;
        }
        $perPage = 20;
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

        $list_category = $init->listCategory($limit1,$limit2);

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

  if(isset($_POST['cat_name'])){
    $cat_name = $_POST['cat_name'];

    $errors=array();
  
    $base64 = $_POST['file'];

    if(empty($errors))
    {
        $insert = $init->addCategory($cat_name,$base64);

        if ($insert == 1) {
          echo 'category ('.$cat_name.') added successfully!';
        }
    }
    else
    {
        foreach($errors as $error)
        {
            echo $error , '<br/>'; 
        }
    }

  }
    if(isset($_POST['cat_names'])){
    $cat_names = $_POST['cat_names'];
    $insert = $init->checkCat($cat_names);

    if ($insert != 0) {
      echo 'Sorry! Already exists!';
    }else{
      echo 'Ok <i class="fa fa-check"></i>';
    }
  }
  if(isset($_POST['delcat'])){
    $id = $_POST['delcat'];
    $delete = $init->deleteCategory($id);
    if($delete == 1)
    {
      echo '<div class="alert alert-danger" style="align:center;">
            <strong>Deleted</strong> successfully!
            </div>';
    }
    else
    {
      echo '<div class="alert alert-danger">
            <strong>Sorry</strong> there was an error!
            </div>';
    }
  }
    if(isset($_POST['edit_cat'])){
    $cat_name = $_POST['edit_cat'];
    $image = $_POST['image'];
    $cat_id = $_POST['cat_id'];
    
    $insert = $init->editCategory($cat_name,$cat_id,$image);

    if ($insert == 1) {
      echo 'Category ('.$cat_name.') edited successfully!';
    }else{
      echo 'There was an errorz.';
    }
  }
  if (isset($_GET['search'])){
    $search = $_GET['search'];

    $check = $init->searchCategory($search);
    
    if (isset($check) && $check != "") {
         foreach ($check as $key => $value) {
      echo '
      <a href="?page=category&cat='.$value['MainCategoriesId'].'">
        '.$value["MainCategoriesName"].'
        <img src="'.$value['Images'].'" style="height:50px;width:50px">
      </a>
      <br>';
    }
    }else{
      echo 0;
    }
 

  }
?>