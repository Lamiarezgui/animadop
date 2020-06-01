<?php

include 'config.php';

if(isset($_POST['mail'])){
    $mail = $_POST['mail'];

    $query = "select count(*) as cntUser from utilisateur where mail='".$mail."'";
    
    $result = mysqli_query($con,$query);
    $response = "<span style='color: green;'>Available.</span>";
    if(mysqli_num_rows($result)){
        $row = mysqli_fetch_array($result);
    
        $count = $row['cntUser'];
        
        if($count > 0){
            $response = "<span style='color: red;'>Not Available.</span>";
        }
       
    }
    
    echo $response;
    die;
}
