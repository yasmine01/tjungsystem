// JavaScript Document

$('document').ready(function()
{ 
     /* validation */
  $("#login-form").validate({
      rules:
   {
   user_name: {
      required: true,
   minlength: 3
   },
   password: {
   required: true,
   minlength: 3,
   maxlength: 15
   },
    },
       messages:
    {
            user_name: "please enter user name",
            password:{
                      required: "please provide a password",
                      minlength: "password at least have 3 characters"
                     }
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* form submit */
    function submitForm()
    {  
    var data = $("#login-form").serialize();
    
    $.ajax({
    
    type : 'POST',
    url  : 'login.php',
    data : data,
    beforeSend: function()
    { 
     $("#error").fadeOut();
     $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
    },
    success :  function(data)
         {      
        if(data==1){
         
         $("#error").fadeIn(1000, function(){
           
           
           $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry username is wrong !</div>');
           
           $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Log In');
          
         });
                    
        }
        else if(data=="registered")
        {
         
         $("#btn-submit").html('<img src="btn-ajax-loader.gif" /> &nbsp; Loging In ...');
         setTimeout('$(".form-signin").fadeOut(500, function(){ window.location.href = "../index.php"; }); ',5000);
         
        }
        else{
          
         $("#error").fadeIn(1000, function(){
           
      $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');
           
         $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Log In');
          
         });
           
        }
         }
    });
    return false;
  }
    /* form submit */ 

});