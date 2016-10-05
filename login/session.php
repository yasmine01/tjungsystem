<?php

 require_once 'dbconfig.php';
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];
   
if (isset($username) && isset($password){
   $stmt = $db_con->query("SELECT * FROM tblcustomersaccount WHERE Username='$username' AND Password='$password'");
   $count = $stmt->rowCount();

    if($count==1) {    
        header('Location: index.php');
    } else {
        echo 'Welcome back ' . $_COOKIE['username'];
    }
    
} else {
    header('Location: index.php');
}

?>