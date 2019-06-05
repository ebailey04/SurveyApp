<?php

include "../connections/conn.php";




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
        
        <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
        <link rel="stylesheet" href="../css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <script>
        
        $(document).ready(function(){
           
            console.log("jQuery loaded");
            $("#loginbutton").click(function(e){
                      
                    e.preventDefault();
                    console.log("Login query sent");

                    $.ajax({url: "logincheck.php",
                        type: "POST",
                        data: $("#loginform").serialize(), //serializes the form's elements.
                            
                        success: function(data){
                                console.log("Login query sent");
                                var dataa = data;
                                console.log(dataa);
                                var error1 = "<div class='col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3'><div class='card fluid'><div class='row'><div class=''><h4>Please enter your login details.</h4></div></div></div>";
                                var error2 = "<div class='col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3'><div class='card fluid'><div class='row'><div class=''><h4>No user with those details found. Please try again.</h4></div></div></div>";
                                var error3 = "<div class='col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3'><div class='card fluid'><div class='row'><div class=''><h4>Your Username/Password is incorrect. Please try again.</h4></div></div></div>";
                               
                                if(dataa === "nodata"){
                                   $("#feedback").html(error1); 
                                } else if(dataa === "noresult"){
                                    $("#feedback").html(error2); 
                                } else if(dataa === "incorrect"){
                                    $("#feedback").html(error3);
                                    
                                } else {
                                
                                $("#feedback").html(dataa); 
                                window.location = "test.php";
                            }
                            }
                        });   
            });
           
                });
    </script>
        <title></title>
    </head>
 
    <body class="image">
       
        <div class="feedback"></div>
            
  <div class="container">
  <div class="row">
      
    <div class="col-sm">
    </div>
    <!-- Adding some flex properties to center the form and some height to the page, these can be omitted -->
    <div class="col-sm-12 col-md-8 col-lg-6" style="height: calc(100vh - 10.25rem); display: flex; align-items: center; flex: 0 1 auto;">
      <div id='loginform' class='loginform'>
        <fieldset>
          <legend>Please Login</legend>
            <div class="input-group fluid">
              <label for="username" style="width: 80px;">Username</label>
              <input type="text" id="username" placeholder="username" name="username">
            </div>
            <div class="input-group fluid">
              <label for="pwd" style="width: 80px;">Password</label>
              <input type="password" id="pwd" placeholder="password" name="password">
            </div>
            <div class="input-group fluid">
              <button class="secondary" id="loginbutton">Login</button>
            
            </div>
        </fieldset>
      </div>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>
         
        
 
    </body>
</html>
