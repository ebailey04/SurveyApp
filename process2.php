<?php
    
    
include('connections/conn.php');

$number = $_POST['number'];  

echo "$number";

if($number == 1){
    
    $date = date("Y-m-d");
    echo $date;

    $today = date('H:i:s');
    $time = date('H:i:s', strtotime($today) + 60 * 60);
    echo $time;
    
    $query="INSERT INTO appdata (date, goodbad, time) VALUES ('$date', '$number', '$time')";

$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

    echo  "added";
    
    
    
//    $insertquery = "INSERT INTO appdata (id, date, goodbad, studentno, time) VALUES (null, ?, ?, null, ?)";
//                        if($stmt = mysqli_prepare($conn, $insertquery)){
//                        //Bind variable to the prepared statement as parameters
//                        mysqli_stmt_bind_param($stmt, "iii", $date, $number, $time);
//
//                        mysqli_execute($stmt);
//             
//                        } else{
//                        echo "ERROR: Could not prepare query: $insertquery. " . mysqli_error($conn);
//
//                        }
//}
} else{
    
    $date = date("Y-m-d");
    echo $date;

    $today = date('H:i:s');
    $time = date('H:i:s', strtotime($today) + 60 * 60);
    echo $time;
    
    $query="INSERT INTO appdata (date, goodbad, time) VALUES ('$date', '$number', '$time')";

$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

    echo  "added";
}
    
 
    
    
    
    
?>
    
