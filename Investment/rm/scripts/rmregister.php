<?php

session_start();
include '../db_conn.php';

if (isset($_REQUEST['fname'])) {
    // removes backslashes
    $fname = stripslashes($_REQUEST['fname']);
    $lname = stripslashes($_REQUEST['lname']);
    //escapes special characters in a string
    $fname = mysqli_real_escape_string($con, $fname);
    $lname = mysqli_real_escape_string($con, $lname);
    $emailid    = stripslashes($_REQUEST['emailid']);
    $emailid    = mysqli_real_escape_string($con, $emailid);
    $phoneno    = stripslashes($_REQUEST['phoneno']);
    $phoneno    = mysqli_real_escape_string($con, $phoneno);
    $password = stripslashes($_REQUEST['npassword']);
    $password = mysqli_real_escape_string($con, $password);
    $create_datetime = date("Y-m-d H:i:s");
    $gender = mysqli_real_escape_string($con, stripslashes($_REQUEST['gender']));
    $country = mysqli_real_escape_string($con, stripslashes($_REQUEST['country']));
    $dob = mysqli_real_escape_string($con, stripslashes($_REQUEST['dob']));

    $checkUser  = "SELECT emailid FROM user WHERE emailid='$emailid' AND role = 'rm'";
    $checkUserResult   = mysqli_query($con, $checkUser);
    if ($checkUserResult->num_rows >= 1){
        echo "<div class='form'>
                  <h3>Email id Already Used</h3><br/>
                   <p class='link'>Click here to <a href='../rmregistration.php'>registration</a> again.</p>
                  </div>";
    }else{
        $query    = "INSERT into `user` (fname, lname, password, emailid, phoneno, role, gender, dob, country)
                     VALUES ('$fname', '$lname', '$password', '$emailid', '$phoneno', 'rm', 
                     '$gender', '$dob', '$country')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully</h3><br/>
                  <p class='link'>Click here to <a href='../index.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='../rmregistration.php'>registration</a> again.</p>
                  </div>";
        }
    }

}
?>
