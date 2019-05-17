<?php
session_start();
     	
//if already logged IN
if(isset($_SESSION['loggedIN'])){
	header('Location: hidden.php');
	exit();
}

     if(isset($_POST['login'])){
       include 'connectdb.php';

     	$email = $dbcon->real_escape_string($_POST['emailPHP']);
     	$password = md5($dbcon->real_escape_string($_POST['passwordPHP']));

     	$data =  $dbcon->query("SELECT id FROM users WHERE email='$email' AND password ='$password'");
     	if($data->num_rows > 0){//everything ok,Let's Login
     	
        $_SESSION['loggedIN'] ='1';
     	$_SESSION['email'] =$email;
     		exit('<font color="green">Login success....</font>');
     	}else{
     		exit('<font color="red">Please check your input....</font>');
     	}

     	exit($email . " = " . $password);
     }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Query Tutorial -Login Form</title>
</head>
<body>
    <form method="post" action="login.php">
         <input type="text" id="email" placeholder="email..."><br>
         <input type="password" id="password" placeholder="password..."><br>
         <input type="button" value="Log in" id="login">
    </form>
    
 <p id="response"> </p>
 	


    <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
 <script type="text/javascript">
 	$(document).ready(function (){
 		$("#login").on('click', function (){
 			var email = $("#email").val();
 			var password = $("#password").val();



 			if (email == "" || password == "")
 				alert('Please check in your input');
 			else{
 				$.ajax(
 			{
 				url:'login.php',
 				method: 'POST',
 				data: {
 					login:1,
 					emailPHP:email,
 					passwordPHP: password
 				},
 				success: function(response){
 					$("#response").html(response);

 					if(response.indexOf('session') >= 0)
 						window.Location = 'hidden.php';
 						 				},
 				dataType: 'text'

 			}
 			);
 			}
 			

 			
 		});
 	});

 </script>
</body>
</html>