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
//    $password = stripslashes($_REQUEST['npassword']);
//    $password = mysqli_real_escape_string($con, $password);
    
    

    $recommend_ideas =[];
//    $values = $_POST['ary'];
//    $recommend_ideas = array();
//    foreach ($values as $a){
//        array_push($recommend_ideas, $a);
//    }
//    $recommend_ideas = implode(',', $recommend_ideas);
    $gender = mysqli_real_escape_string($con, stripslashes($_REQUEST['gender']));
    $country = mysqli_real_escape_string($con, stripslashes($_REQUEST['country']));
    $dob = mysqli_real_escape_string($con, stripslashes($_REQUEST['dob']));
    $id = $_SESSION['userId']; // Get the user ID from the session
        if (isset($_REQUEST['assignedRm'])){
            $assigned_rm = mysqli_real_escape_string($con, $_REQUEST['assignedRm']);
            $query    = "UPDATE `user` SET fname = '$fname', lname= '$lname', emailid = '$emailid', 
                        phoneno= '$phoneno', dob= '$dob', country= '$country', gender= '$gender', 
                        assigned_rm='$assigned_rm' WHERE id='$id'";
        }else{
            $query    = "UPDATE `user` SET fname = '$fname', lname= '$lname', emailid = '$emailid', 
                        phoneno= '$phoneno', dob= '$dob', country= '$country', gender= '$gender' WHERE id='$id'";
        }

        $result   = mysqli_query($con, $query); // Execute the query and store the result in $result variable.
        if ($result) {
            $role = $_SESSION['role'];
            echo "<div class='form'>
                  <h3>Data Updated successfully </h3><br/>";
            if($_SESSION['role'] === 'client'){
                echo "<p class='link'>Click here to <a href='../profile.php??userId=$id'>Go back</a></p>
                  </div>";
            }else if($_SESSION['role'] === 'rm'){
                echo "<p class='link'>Click here to <a href='../rmpage.php??userId=$id'>RM list</a></p>
                  </div>";
            }else if($_SESSION['role'] === 'admin'){
                echo "<p class='link'>Click here to <a href='../dashboard.php??userId=$id'>Go Dashboard</a></p>
                  </div>";
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
}
?>

