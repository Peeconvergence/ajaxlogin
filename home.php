
<?php
session_start();
        
//if already logged IN
if(isset($_SESSION['loggedIN'])){
    header('Location: hidden.php');
    exit();
}

     if(isset($_POST['login'])){
      require'connectdb.php';

        $email = $dbcon->real_escape_string($_POST['emailPHP']);
        $password = md5($dbcon->real_escape_string($_POST['passwordPHP']));

        $data =  $dbcon->query("SELECT id FROM users WHERE email='$email' AND password ='$password'");
        if($data->num_rows > 0){//everything ok,Let's Login
       

        $_SESSION['loggedIN'] ='1';//create varible resuesd anather page.
        $_SESSION['email'] = $email;
        header('Location:index.php');

           exit('<font color="red">Login seccess....</font>');
        }else{
            exit('<font color="red">Please check your input....</font>');
        }

        exit($email . " = " . $password);//exit email and password
     }
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Login with Background Color - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin Dashboard</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 1-column  bg-cyan bg-lighten-2 blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                      <!--You can input in This-->
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span><h3 font="color:Blue">Form login BY .ajax</h3></span></h6>
                                </div>
                   <div class="card-content">
                                   
                                  
                                    <div class="card-body pt-0">
                                        <form class="form-horizontal" action="home.php">
                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="user-name">Your Email</label>
                                                <input type="text" class="form-control" id="email" placeholder="first@domain.com">
                                            </fieldset>
                                            <fieldset class="form-group floating-label-form-group mb-1">
                                                <label for="user-password">Enter Password</label>
                                                <input type="password" class="form-control" id="password" placeholder="Enter Password">
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-12 text-center text-sm-left">
                                                   <p id="response"></p>
                                                </div>
                                                
                                            </div>
                                            <button type="button" class="btn btn-outline-info btn-block" id="login"><i class="ft-unlock"></i>Login</button>
                                        </form>
                                    </div>
                                    
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    

      
    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
    <script src="app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->
 
    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
    <script src="app-assets/js/scripts/forms/form-login-register.js"></script>
    <!-- END: Page JS-->
    
        
 
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
<!-- END: Body-->

</html>