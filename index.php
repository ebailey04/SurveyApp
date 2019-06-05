<?php
include('connections/conn.php');
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v2.3.4/dist/mini-default.min.css">
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-touch-events/1.0.5/jquery.mobile-events.js"></script>
        <title>QUB Survey</title>


        <script>

            $(document).ready(function () {
                $("#thankyou").hide();
                $("#yesno").hide();

                $("#thankyou2").hide();
                $("#studentin").val('');
                $("#feedback2").hide();
                $("form").hide();

                $("#smile").on('tapstart', function (e) {
                    
                    $("#smile").prop("disabled", "disabled");

                    e.preventDefault();

                    var number = 1;

                    $.ajax({url: "process2.php",
                        type: "POST",
                        data: {number: number},

                        success: function (data) {
                            console.log(data);

                            $("#sad").fadeOut(500);
                            $("#smile").fadeOut(500);
                            $("#feedback").fadeOut(500);
                            $("#welcome").fadeOut(500);
                            $("#thankyou").hide().delay(500).fadeIn(500);
                            $("#thankyou").hide().delay(400).fadeOut(500);
                            $("#sad").delay(1500).fadeIn(500);
                            $("#smile").delay(1500).fadeIn(500);
                            $("#feedback").delay(1500).fadeIn(500);
                            $("#welcome").delay(1500).fadeIn(500);

                        }

                    });
                });

                $("#sad").on('tapstart', function (e) {
                    
                    e.preventDefault();

                    $("#sad").fadeOut(500);
                    $("#smile").fadeOut(500);
                    $("#feedback").fadeOut(500);
                    $("#welcome").fadeOut(500);



                    var number = 0;


                    $.ajax({url: "process2.php",
                        type: "POST",
                        data: {number: number},

                        success: function (data) {
                            console.log(data);


                        }

                    });
                    
                    $("form").hide().delay(500).fadeIn(500);

                    var timer = setTimeout(function () {
                        window.location = 'index.php';
                    }, 17000);

                    $("#submit").click(function (e) {

                        var studentnum = $("#studentin").val();

                        console.log(studentnum);
                        e.preventDefault();

                        $.ajax({url: "process.php",
                            type: "POST",
                            data: {studentnum: studentnum},

                            success: function (data) {
                                console.log(data);

                                var error = "Error";
                                

                                if (data === error) {
  
                                    
                                    
                                    console.log("here");
                                    $("form").fadeOut(100);

                                    $("#feedback2").html("<br><br><br><br><br><br><h1 class='thankyou2'>You have entered an invalid Student/Staff number</h1>");

                                    $("#feedback2").hide().delay(100).fadeIn(500);
                                    $("#feedback2").hide().delay(600).fadeOut(500);
                                    $("form").hide().delay(1500).fadeIn(500);
                                    $("#studentin").val(''); 
                                  
                                     var timer = setTimeout(function () {
                        window.location = 'index.php';
                    }, 17000);
                                } else {

                                    $("form").fadeOut(100);

                                    $("#thankyou2").hide().delay(100).fadeIn(500);
                                    $("#thankyou2").hide().delay(1900).fadeOut(500);

                                    $("#sad").delay(3100).fadeIn(500);
                                    $("#smile").delay(3100).fadeIn(500);
                                    $("#feedback").delay(3100).fadeIn(500);
                                    $("#welcome").delay(3100).fadeIn(500);
                                    $("#studentin").val('');

                                    clearTimeout(timer);
                                } 
                              
                            }});

                    });
                });
            });




        </script>

    </head>
    <body class="form">

        <br>


        <div class="row" id="welcome">  
            <div class="col-sm-12">
                <img src="images/wifibanner.png">
                <br>
                <br>
            </div>    
        </div>


        <div id="feedback2">
        </div>



        <div class="row">   

            <div class="col-sm-6">  
                <button id="smile"><input type='hidden' name='smile'><img src="images/smile.png"  class="center left"/></button>
            </div>  
            <div class="col-sm-6">
                <button id="sad"><input type='hidden' name='sad'><img src="images/sad.png"  class="center right" width="200px"/></button>  
            </div>

        </div>



        <!--
                <div class="row">
                <div class="col-sm-1">
                </div>
                    <div class="col-sm-10" id="feedback">
        
                        <br>
                        <button type="button" class="center feedbackbutton"><h3>Tap here to provide feedback</h3></button>
                        
                    </div>
                 <div class="col-sm-1">
                </div>
                </div>-->





        <div id="thankyou">

            <br>
            <br>
            <br>
            <br>

            <h1>Thank you for your feedback</h1>

        </div>

        <div id="thankyou2">

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <h1>Thank you for submitting your student/staff number, you will receive an email to submit your feedback</h1>

        </div>


        <form>
            <div class="row studentno center" id="studentno">  
                <div class="col-sm-12">


                    <h1>Thank you for your feedback</h1>
                    <br>

                    <h2>Please provide your staff/student number if wish to be contacted for feedback. (Optional)</h2>

                    <br>
                    <input type="number" maxlength="8" minlength="7" placeholder="Enter your student/staff number here.." id="studentin" name="studentin" class="center" autofocus="autofocus" onfocus="this.select()"/>
                    <br>

                    <div class="hidebutton">
                        <button type="submit" id="submit" class="submit"><img src="images/submit.jpg" width="25%" class="submit"></button>
                    </div>
                </div>
            </div>
        </form>

    </body>
</html>
