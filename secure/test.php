 <?php
 
        session_start();
        
        if(!isset($_SESSION['99999_theuserid'])){
        header("Location:login.php");
    
} 
        $has_session = session_status() == PHP_SESSION_ACTIVE;
        
        echo $has_session;
        ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
    </body>
</html>
