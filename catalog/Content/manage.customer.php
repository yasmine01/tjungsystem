<?php
  include_once('class.manage.customer.php');
  $init = new ManageCustomer();

  if(isset($_GET['cid']))
    {
        $cus = $_GET['cid'];
        $count = $init->countCustomer();
        $list_customer = $init->listIdCustomer($cus);
    }elseif (isset($_POST['searcher'])) {
        $value = $_POST['searcher'];
        $count = $init->countCustomer();
        $list_customer = $init->listSearchCustomer($value);
    }
    else
    {
      $count = $init->countCustomer();
      if($count == 0){
         $list_customer = 0;
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

        $list_customer = $init->listCustomer($limit1,$limit2);

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

   if(isset($_POST['service_name'])){
    $service_name = $_POST['service_name'];
    $subcat_name = $_POST['subcat_name'];
    $cat_name = $_POST['cat_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $photo = $_POST['photo'];
    $location = $_POST['location'];

    $insert = $init->addService($service_name,$subcat_name,$cat_name,$price,$description,$photo,$location);

    if ($insert == 1) {
      echo 'Service ('.$service_name.') added successfully!';
    }
  }

   if(isset($_POST['delcus'])){
    $id = $_POST['delcus'];
    $delete = $init->deleteCustomer($id);
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

  if(isset($_POST['service_id'])){
    $service_id = $_POST['service_id'];
    $service_name = $_POST['edit_service_name'];
    $subcat_name = $_POST['edit_subcat_name'];
    $cat_name = $_POST['edit_cat_name'];
    $price = $_POST['edit_price'];
    $description = $_POST['edit_description'];
    $photo = $_POST['edit_photo'];
    $location = $_POST['edit_location'];

    $insert = $init->editService($service_id,$service_name,$subcat_name,$cat_name,$price,$description,$photo,$location);

    if ($insert == 1) {
      echo 'Service ('.$service_name.') edited successfully!';
    }else{
      echo 'There was an errorz.';
    }
  }

  if (isset($_GET['search'])){
    $search = $_GET['search'];

    $check = $init->searchCustomer($search);
    if (isset($check) && $check != "") {
         foreach ($check as $key => $value) {
          if(isset($value['MName']) && $value['MName'] == "")
                                        $customer = $value['FName'].' '.$value['MName'].' '.$value['LName'];
                                    else
                                        $customer = $value['FName'].' '.$value['LName'];
      echo '
      <a href="?page=customer&cid='.$value['Id'].'">
        '.$customer.'
        <img src="'.$value['Image'].'" style="height:50px;width:50px">
      </a>
      <br>';
    }
    }else{
      echo 0;
    }
 

  }
?>