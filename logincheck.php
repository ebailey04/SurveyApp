<?php


include ("connections/connect.php");

if(((!isset($_POST['username'])) || (!isset($_POST['password']))) || ((!isset($_POST['username'])) && (!isset($_POST['password']))) ){
    
    echo 'nodata';
    
} else {
    
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
     //$encryptedpassword = hash("sha256", "$password");
     
     $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
            
     $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
     
     if(mysqli_num_rows($result) > 0){
         while($row = mysqli_fetch_assoc($result)){
        
          $getuser = $row["username"];
          $_SESSION["99999_theuser"] = $getuser;
         
          header("Location:test.php");
         }
     } else {
         echo "noresult";
     }
}

