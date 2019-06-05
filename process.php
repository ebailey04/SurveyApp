<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    
include('connections/conn.php');

$studentnumber = $_POST['studentnum'];  
$studentlength = strlen($studentnumber);

$date = date("Y-m-d");
    

    $today = date('H:i:s');
    $time = date('H:i:s', strtotime($today) + 60 * 60);
    
    
    if($studentlength <= 6 || $studentlength >= 9) {
        echo "Error";
    } else {
    
    
    $query="INSERT INTO feedback (studentno, date, time) VALUES ('$studentnumber', '$date', '$time')";

$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

echo "added";
    }

