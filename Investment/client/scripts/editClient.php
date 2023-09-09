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
    $emailid    = stripslashes($_REQUEST['emailid']);//removes backslashes
    $emailid    = mysqli_real_escape_string($con, $emailid);
    $phoneno    = stripslashes($_REQUEST['phoneno']);
    $phoneno    = mysqli_real_escape_string($con, $phoneno);

    

    $recommend_ideas =[];

    $gender = mysqli_real_escape_string($con, stripslashes($_REQUEST['gender']));
    $country = mysqli_real_escape_string($con, stripslashes($_REQUEST['country']));
    $dob = mysqli_real_escape_string($con, stripslashes($_REQUEST['dob']));
    $id = $_SESSION['userId'];//stores userid in the variable
        
            $query    = "UPDATE `user` SET fname = '$fname', lname= '$lname', emailid = '$emailid', 
                        phoneno= '$phoneno', dob= '$dob', country= '$country', gender= '$gender' WHERE id='$id'";//updates the data in the user table
        

        $result   = mysqli_query($con, $query);//executes the query and stores in the variable
        if ($result) {
            $role = $_SESSION['role'];//stores role in the variable
            echo "<div class='form'>
                  <h3>Data Updated successfully </h3><br/>";
            if($_SESSION['role'] === 'client'){
                echo "<p class='link'>Click here to <a href='../profile.php??userId=$id'>Go back</a></p>
                  </div>";
            }
            }else{
                echo "<p class='link'>Click here to <a href='../clientpage.php'>Client List</a></p>
                  </div>";
            }
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='../clientpage.php'>Update</a> again.</p>
                  </div>";
        }

?>

