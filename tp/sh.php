

  
  <?php
 global $erreur;
     $erreur= array(); $erreur=null;
  if($_SERVER['REQUEST_METHOD']=="POST"){
     require 'sarah.php.php' ; 
     $fname=check($_POST['fname']);
     $lname=check($_POST['lname']);
     $uname=check($_POST['uname']);
     $pass=check($_POST['pass']);
     $phone=check($_POST['phone']);
    // $gendr = $_POST['gendre'];
	// if($_POST['gendre']) $erreur['gendre']="invalide gendre";
     $email=check($_POST['email']);
     $linke="http://".check($_POST['linke']);
   $comment=check($_POST['comment']);

       if(!$fname || !ctype_alpha($fname) || strlen($fname)>15)
         $erreur['fname']="invalide first name ";
       if(!$lname || !ctype_alpha($lname) || strlen($lname)>15)
         $erreur['lname']="invalide last name ";
       if(!$uname || !ctype_alnum($uname) || strlen($uname)>15)
         $erreur['uname']="invalide user name ";
       if(!$pass || !ctype_alnum($pass) || strlen($pass)<6)
         $erreur['pass']="invalide password ";
	  // if(!$erreur['pass']) 
		  $pass= md5($_POST['pass']);
       if(!$phone || !ctype_alnum($phone) || strlen($phone)!=10)
         $erreur['phone']="invalide phone ";
       if(!$email || !filter_var($email,FILTER_VALIDATE_EMAIL))
        $erreur['email']="invalide email";
      if(!$linke || !filter_var($linke,FILTER_VALIDATE_URL))
        $erreur['linke']="invalide linke"; 
	  if(!empty($_FILES['image'])){
         $img_name=$_FILES['image']['name'];
         $img_size=$_FILES['image']['size'];
         $img_tmp=$_FILES['image']['tmp_name'];
	     $img_type=$_FILES['image']['type'];
		 $b = explode('.', $img_name);
		 $a = end($b);
		 $img_ext = strtolower($a); 
		 $avl_ext= array('jpg','png');
		 
	  if(!in_array($img_ext,$avl_ext)) $erreur['image']="invalide extention " ;else $erreur['image']="image uploaded" ;
	   if(empty($erreur['image'])){
		   move_uploaded_file($img_tmp,$img_name);
	  }}
	
   
 	 
    if(!empty($erreur)) {
		$loc=$img_name ;
		echo "<img sec='$loc' width=50 hight=50 >";
	
	}else echo "no err";
	}
   

   { // /* 
  // $fname= check($_POST['fname']);   
	 // echo $fname; }
  
    // $fname=$_POST['fname'];   
    // $phone = $_POST['phone'];
    // $uname = $_POST['uname'];

  // if(ctype_alpha($fname))
  // {
  	// echo "<br> valide <br>";

  // } 
	// else echo "non first name <br>";

  // if(ctype_digit($phone)){
		// echo "valide <br>";
	// }
	 // else echo "non phone <br>" 	;

  // if(ctype_alnum($uname)){
  	// echo "valide <br>";
  // }
   // else echo "non user name <br>";// FILTERS AND SYNTIES // php.net 


     

  // if(isset($_FILES['image'])){
    // print_r($_FILES['image']);
    // $file_name=$_FILES['image']['name'];
    // $file_size=$_FILES['image']['size'];
    // $file_tmp=$_FILES['image']['tmp_name'];
    // $file_type=$_FILES['image']['type'];

    // $availiable_ext= array('jpg','png');
    
    // $ext = strtolower(end(explode('.', $file_name)));     //converse into lower after "." 

    // if(!(in_array($ext,$availiable_ext))) $erreur= "invalide extention ";
    

     // if(!$erreur){
       
       // move_uploaded_file($file_tmp, "images/".$file_name)  ;
       // echo "done";

       // }

       // else echo $erreur ;
     


  
  // }*/
  }

 ?>
 <!DOCTYPE html>
<html>
 
<form  method="POST" enctype="multipart/form-data" >
<table>
<tr>
<td>First Name :</td> <td><input type="text" name="fname"   /> <?php echo $erreur['fname']; ?> </td></tr>

<tr>
<td>Last  Name :</td> <td><input type="text" name="lname" value="" /> <?php    echo $erreur['lname']; ?>  </td></tr>

<tr>
<td>User Name :</td> <td><input type="text" name="uname" value=""  /><?php    echo $erreur['uname']; ?> </td></tr>

<tr>
<td>Passwors   :</td> <td><input type="password" name="pass"  /> <?php  echo $erreur['pass']; ?> </td></tr>

<tr>
<td>Email      :</td> <td><input type="Email" name="email" /><?php   echo $erreur['email']; ?>  </td></tr>

<tr>
<td>Gendre     :</td> <td><input type="radio" name="gendre" value="Male"> Male
               <input type="radio" name="gendre" value="Female"> Female <--! <?php   echo $erreur['gendre'] ; ?> --!></td></tr> 
                                
                
<td>Phone :</td> <td><input type="text" name="phone" value="" /><?php   echo $erreur['phone']; ?>  </td></tr>

<tr>
<td>Comment    :</td> <td><textarea cols="30" rows="15" name="comment">  </textarea>  </td></tr>        
<tr>
<td>Image      :</td> <td><input type="file" name="image" >  <?php     echo $erreur['image']; ?>  </td></tr>

<tr>
<td>Link        :</td> <td><input type="text" name="linke" value=""  /><?php    echo $erreur['linke']; ?>  </td></tr>    

<tr> 
<td>            <input type="submit"  value="show" /></td></tr> 
<tr>
<td>            <input type="reset" value="effacer"/></td></tr> 

</table>
</form></html>




