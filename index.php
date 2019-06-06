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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



        <!--        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />-->


        <link href="css/theme.css" rel="stylesheet" type="text/css"/>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v2.3.4/dist/mini-default.min.css">
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>

        <title>QUB Survey</title>
        <style>

            .ui-page { 
                background-image:url('images/background.jpg');
                background-size:     cover;                      
                background-repeat:   no-repeat;        

            }    

        </style>


        <script>

            function triggerCustomEvent(obj, eventType, event, touchData) {
                var originalType = event.type;
                event.type = eventType;

                $.event.dispatch.call(obj, event, touchData);
                event.type = originalType;
            }

            $.attrFn = $.attrFn || {};

            // navigator.userAgent.toLowerCase() isn't reliable for Chrome installs
            // on mobile devices. As such, we will create a boolean isChromeDesktop
            // The reason that we need to do this is because Chrome annoyingly
            // purports support for touch events even if the underlying hardware
            // does not!
            var agent = navigator.userAgent.toLowerCase(),
                    isChromeDesktop = (agent.indexOf('chrome') > -1 && ((agent.indexOf('windows') > -1) || (agent.indexOf('macintosh') > -1) || (agent.indexOf('linux') > -1)) && agent.indexOf('mobile') < 0 && agent.indexOf('android') < 0), // Add Event shortcuts:
                    settings = {
                        tap_pixel_range: 5,
                        swipe_h_threshold: 50,
                        swipe_v_threshold: 50,
                        taphold_threshold: 750,
                        doubletap_int: 500,

                        touch_capable: ('ontouchstart' in window && !isChromeDesktop),
                        orientation_support: ('orientation' in window && 'onorientationchange' in window),

                        startevent: (('ontouchstart' in window && !isChromeDesktop) ? 'touchstart' : 'mousedown'),
                        endevent: (('ontouchstart' in window && !isChromeDesktop) ? 'touchend' : 'mouseup'),
                        moveevent: (('ontouchstart' in window && !isChromeDesktop) ? 'touchmove' : 'mousemove'),
                        tapevent: ('ontouchstart' in window && !isChromeDesktop) ? 'tap' : 'click',
                        scrollevent: ('ontouchstart' in window && !isChromeDesktop) ? 'touchmove' : 'scroll',

                        hold_timer: null,
                        tap_timer: null
                    };

            $.each(['tapstart'], function (i, name) {
                $.fn[name] = function (fn) {
                    return fn ? this.on(name, fn) : this.trigger(name);
                };

                $.attrFn[name] = true;
            });

            // tapstart Event:
            $.event.special.tapstart = {
                setup: function () {

                    var thisObject = this,
                            $this = $(thisObject);

                    $this.on(settings.startevent, function tapStartFunc(e) {

                        $this.data('callee', tapStartFunc);
                        if (e.which && e.which !== 1) {
                            return false;
                        }

                        var origEvent = e.originalEvent,
                                touchData = {
                                    'position': {
                                        'x': ((settings.touch_capable) ? origEvent.touches[0].screenX : e.screenX),
                                        'y': (settings.touch_capable) ? origEvent.touches[0].screenY : e.screenY
                                    },
                                    'offset': {
                                        'x': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageX - $this.offset().left) : Math.round(e.pageX - $this.offset().left),
                                        'y': (settings.touch_capable) ? Math.round(origEvent.changedTouches[0].pageY - $this.offset().top) : Math.round(e.pageY - $this.offset().top)
                                    },
                                    'time': Date.now(),
                                    'target': e.target
                                };

                        triggerCustomEvent(thisObject, 'tapstart', e, touchData);
                        return true;
                    });
                },

                remove: function () {
                    $(this).off(settings.startevent, $(this).data.callee);
                }
            };

            $(document).ready(function () {
                $("#thankyou").hide();
                $("#yesno").hide();

                $("#thankyou2").hide();
                $("#studentin").val('');
                $("#feedback2").hide();
                $("form").hide();

                $("#smile").on('tapstart', function (e) {

                    $('#smile').prop('disabled', true);
                    setTimeout(function () {
                        $('#smile').prop('disabled', false);
                    }, 2350);

                    $('#sad').prop('disabled', true);
                    setTimeout(function () {
                        $('#sad').prop('disabled', false);
                    }, 2350);

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

                    $('#smile').prop('disabled', true);
                    setTimeout(function () {
                        $('#smile').prop('disabled', false);
                    }, 2350);

                    $('#sad').prop('disabled', true);
                    setTimeout(function () {
                        $('#sad').prop('disabled', false);
                    }, 2350);


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
                                    
                                
                                    
                                    var timer 
                    
                                    console.log("here");
                                    $("form").fadeOut(100);

                                    $("#feedback2").html("<br><br><br><br><br><br><h1 class='thankyou2'>You have entered an invalid Student/Staff number</h1>");

                                    $("#feedback2").hide().delay(100).fadeIn(500);
                                    $("#feedback2").hide().delay(600).fadeOut(500);
                                    $("form").hide().delay(1500).fadeIn(500);
                                    $("#studentin").val('');

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
                <button id="smile" ><input type='hidden' name='smile'><img src="images/smile.png"  class="center left"/></button>
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
