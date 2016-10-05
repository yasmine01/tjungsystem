<?php

 require_once 'dbconfig.php';

 if($_POST)
 {
  $user_name = $_POST['user_name'];
  $user_password = $_POST['password'];
  $joining_date =date('Y-m-d H:i:s');
  
  try
  { 
  
   $stmt = $db_con->query("SELECT * FROM tblcustomersaccount WHERE Username='$user_name'");
   $count = $stmt->rowCount();
   
   if($count==1){
    
   $stmt = $db_con->query("SELECT * FROM tblcustomersaccount WHERE Username='$user_name' AND Password='$user_password'");
   $counts = $stmt->rowCount();
   
    if($counts==1)
    {
      session_start();
      $_SESSION['username'] = $user_name;

      
      if(!empty($_POST["rememberme"])) {
        setcookie ("user_name",$_POST["user_name"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
      } else {
        if(isset($_COOKIE["user_name"])) {
          setcookie ("user_name","");
        }
        if(isset($_COOKIE["password"])) {
          setcookie ("password","");
        }
      }
      
     echo "registered";
    }
    else
    {
     echo "Password is wrong !"; //Query could not execute
    }
   
   }
   else{
    
    echo "1"; //  not available
   }
    
  }
  catch(PDOException $e){
       echo $e->getMessage();
  }
 }

?>