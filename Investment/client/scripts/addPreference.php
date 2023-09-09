<?php

session_start();
include '../db_conn.php';
if (isset($_POST['asset_type'])) {
    $asset_type =  mysqli_real_escape_string($con,stripslashes($_POST['asset_type']));//Escapes special characters and removes backslashes 
    $industry_sector =  mysqli_real_escape_string($con,stripslashes($_POST['industry_sector_l1']));
    $closing_price =  mysqli_real_escape_string($con,stripslashes($_POST['closing_price']));
    $risk_rating =  mysqli_real_escape_string($con,stripslashes($_POST['risk_rating']));
    $clientId = $_SESSION['userId'];//stores data from userid in the variable
    $sql = "SELECT * FROM `preference` WHERE client_id='$clientId'";// query to select preferences for the current user
    $resultData   = mysqli_query($con, $sql);// Execute the  query and store the result in variable
    if($resultData){
        if($resultData->num_rows >0){
        $query  = "UPDATE `preference` SET asset_type='$asset_type', 
                       industry_sector='$industry_sector',closing_price='$closing_price',
                       risk_rating='$risk_rating',
                       client_id='$clientId'
                        WHERE client_id='$clientId'";//query to update the preference 
    }else{
        $query  = "INSERT into `preference` (asset_type, industry_sector, closing_price, risk_rating, client_id)
                     VALUES ('$asset_type', '$industry_sector', '$closing_price', '$risk_rating', '$clientId')";//query to insert the preference
    }
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
                  <h3>Preference Updated successfully</h3><br/>
                  <p class='link'>Back to <a href='../mypreference.php?userId=$clientId'>Preference List</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Required fields are missing.$query</h3><br/>
                  <p class='link'>Click here to <a href='../addPreference.php'>Add</a> again.</p>
                  </div>";
    }

    }
}
?>

