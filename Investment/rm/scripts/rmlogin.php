<?php
session_start();
include '../db_conn.php';
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);
$sql = "SELECT * FROM user WHERE emailid='$uname' AND password='$pass' AND role ='rm'";

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['emailid'] === $uname && $row['password'] === $pass) {
        $_SESSION['emailid'] = $row['emailid'];
        $_SESSION['name'] = $row['fname'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        header("Location: ../dashboard.php");
        exit();
    } else {
//        header("Location: ../clientlogin.php?error=Incorect User name or passwords.$row");
        echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='../index.php'>Login</a> again.</p>
                  </div>";
        exit();
    }
} else {
    $count = mysqli_num_rows($result);
    echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='../index.php'>Login</a> again.</p>
                  </div>";
    exit();
}

function function_alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
    exit();
}