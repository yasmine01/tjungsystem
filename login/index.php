<?php
 include_once('../script.php');  
 strip_php_extension();  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Form using jQuery Ajax and PHP MySQL</title>
<link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="bootstrap.css" type="text/css" />
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/script.js"></script>
 <!-- <link href="style.css" rel="stylesheet" type="text/css" media="screen">  -->
</head>
<body style="background:#fcf8e3">
    
<div class="signin-form">

 <div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
       
        
        <div id="error">
        <!-- error will be showen here ! -->
        </div>
        <div class="row" style="margin-top:150px">
        <div class="col-lg-4 col-md-8 col-sm-10 col-xs-12 col-lg-offset-4 col-md-offset-2 col-sm-offset-1">
         <div class= "panel"  >
        <div class="panel panel-heading"  style="background:#e91e63; color:white;border-radius:0px">
        <p style="margin-bottom:-1px;font-family:arial; font:16px"><b>Login here
        </b></p></div>
        <div class="panel-body img-thumbnail" style="width:100% ;margin-top:-20px; border-radius:0px" >
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" value="<?php if(isset($_COOKIE["user_name"])) { echo $_COOKIE["user_name"]; } ?>" />
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" />
        </div>

        <div class="form-group" style="margin-bottom:-10px;margin-top:-9px">
        <input type="checkbox" name="rememberme" id="rememberme" value="1"  <?php if(isset($_COOKIE["user_name"])) { ?> checked <?php } ?> > &nbsp; Remember me
        </div>
         <hr />
        
        <div class="form-group" style="margin-top:-9px;margin-bottom:-4px">
            <button type="submit" class="btn btn-default" name="btn-save" id="btn-submit">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Log In
   </button> 
        </div>  
        </div>
        </div>
        </div> 
        </div>
        
        
        

      </form>

    </div>
    
    
</div>

    
      <div class="footer" style="background:#c2185b;color:white">
      copyright@tjungstech 2017
    </div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>