<?php
session_start();
include '../db_conn.php';
function validate($data)
{
    $data = trim($data);//removes blankspaces
    $data = stripslashes($data);//removes backslashes
    $data = htmlspecialchars($data);//converts special characters to corresponding HTML entities
    return $data;
}
$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);
$sql = "SELECT * FROM user WHERE emailid='$uname' AND password='$pass' AND role ='client'";//query to retrieve client data from user table

$result = mysqli_query($con, $sql);//executes the query and stores in variable
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['emailid'] === $uname && $row['password'] === $pass) {
        $_SESSION['emailid'] = $row['emailid'];
        $_SESSION['name'] = $row['fname'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['userId'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        $userId= $row['id'];
        header("Location: ../profile.php?userId=$userId");// Redirect the user to the profile page with the userId  in the URL
        exit();
    } else {

        echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='../index1.php'>Login</a> again.</p>
                  </div>";
        exit();
    }
} else {
    $count = mysqli_num_rows($result);//store number of rows returned by the query in the variable 
    echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='../index1.php'>Login</a> again.</p>
                  </div>";
    exit();
}

