<?php 
session_start();//create session To run
unset($_SESSION['loggedIN']);//unset valiable loggedIN
session_destroy(); //Destroy all data
header('Location:home.php');//redirect to index.php page
exit();
?>