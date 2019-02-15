<?php
 session_start();
 if(empty($_SESSION['user']))
 {
	 header('location:login.php?err=please login first');
 }
 echo "helow ".$_SESSION['user'];
 
   if($_SERVER['REQUEST_METHOD']=="POST"){
	   session_destroy();
	   header('location:login.php');
   }
?> 

<html>
<form  method="POST"  >
<button>Log Out  </button>
</form>
</html>





 
 
 

 